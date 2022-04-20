<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $fillable =['name'];

    protected $table = 'purposes';

    public function properties(){
        return $this->hasMany('App\Models\Property','purpose_id');
    }
}
