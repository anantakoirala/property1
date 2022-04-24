<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Property\PropertyRepository;
use App\Http\Resources\RentPropertyCollection;
use App\Http\Resources\PropertyCollection;
use App\Http\Resources\FeaturedCollection;
use App\Http\Resources\PropertyResource;
use Illuminate\Support\Facades\Validator;
use App\Repositories\User\UserRepository;
use App\Repositories\Purpose\PurposeRepository;

class ApiController extends Controller
{
    public function __construct(PropertyRepository $property,UserRepository $user,PurposeRepository $purpose){
        $this->property = $property;
        $this->user = $user;
        $this->purpose = $purpose;
    }
    public function home(Request $request){
        
        $properties = $this->property->where('advertisement_type','featured')->orderBy('created_at','desc')->take(10)->get();
        $featured_property_data = (new FeaturedCollection($properties));
        return response()->json(['featured_properties'=>$featured_property_data],200);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:150',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);
        if($validator->fails()){
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        try{
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = \Hash::make($request->password);
            $this->user->create($data);
            return response()->json(['status' => 200, 'message' => 'success'],200);

        }catch(\Exception $e){
            \Log::error('User Registration',[
                'message'=>$e->getMessage(),
            ]);
            return response()->json([
                'status' =>'500',
                'message'=>'Something went wrong.'
            ],500);
        }
    }
    public function propertyOnRent(Request $request){
        $purpose  = $this->purpose->where('name','Rent')->with('properties')->first();
        $properties = $purpose->properties()->orderBy('created_at','desc')->paginate(10);
        $data = (new PropertyCollection($properties))->response()->setStatusCode(200);
        return $data;


    }
    public function propertyOnSale(Request $request){
        $purpose = $this->purpose->where('name','Sale')->with('properties')->first();
        $properties = $purpose->properties()->orderBy('created_at','desc')->paginate(10);
        $data = (new PropertyCollection($properties));
        return $data;

    }
    public function invest(Request $request){
        $purpose = $this->purpose->where('name','Invest')->with('properties')->first();
        $properties = $purpose-->properties()->orderBy('created_at','desc')->paginate(10);
        $data = (new PropertyCollection($properties))->response()->setStatusCode(200);
        return $data;
    }
    public function propertyDetail(Request $request,$id){
        
        $property = $this->property->with(['facilities','nearbyfacilities','environments','images'])->find($id);
        if($property){
            $data = new PropertyResource($property);
            return response()->json(['status'=>200,'message'=>'success','data'=>$data],200);
        }else{
            return response()->json(['status'=>404,'message'=>'not found'],404);
        }
    }
}
