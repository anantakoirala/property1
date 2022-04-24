@extends('layouts.admin')	
@section('title','Edit Land')
@push('styles')
<style type="text/css">
 
	</style>
@endpush
@section('content')
<section class="content-header">
	<h1>Land<small>edit</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Land</a></li>
		<li><a href="">Edit</a></li>
	</ol>
</section>

<div class="content">
	
	
	@if (count($errors) > 0)
	<div class="alert alert-danger message">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
    	</button>
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
<form method="post" action="{{route('property.update',$detail->id)}}" enctype="multipart/form-data" id="form">
	
	{{csrf_field()}}
	<input type="hidden" name="_method" value="PUT">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Basic Details</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>Property name(required)</label>
							<input type="text" name="name" class="form-control" value="{{$detail->name}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Property Type</label>
							<select class="form-control " name="propertytype_id">
								<option disabled selected="true">Select Property Type</option>
								@foreach($property_types as $property_type)
								<option value="{{$property_type->id}}" {{$detail->propertytype_id==$property_type->id?'selected':''}}>{{$property_type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Class Types</label>
							<select class="form-control property_category" name="class_type">
								<option disabled selected="true">Select Class Type</option>
								@foreach($class_types as $class_type)
								<option value="{{$class_type->id}}" {{$detail->class_type==$class_type->id?'selected':''}}>{{$class_type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Advertisement & Types</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>Advertisement Types</label>
							<select class="form-control property_category" name="advertisement_type">
								<option disabled selected="true">Select Advertisement Types</option>
								@foreach($advertisement_types as $ad_type)
								<option value="{{$ad_type->id}}" {{$detail->advertisement_type==$ad_type->id?'selected':''}}>{{$ad_type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Advertisement Purpose</label>
							<select class="form-control property_category" name="purpose_id">
								<option disabled selected="true">Select Advertisement Purpose</option>
								@foreach($purposes as $purpose)
								<option value="{{$purpose->id}}" {{$detail->purpose_id==$purpose->id?'selected':''}}>{{$purpose->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Commision Type</label>
							<select class="form-control property_category" name="commission">
								<option disabled selected="true">Select Commission Type</option>
								@foreach($commission_types as $com_type)
								<option value="{{$com_type->id}}" {{$detail->commission==$com_type->id?'selected':''}}>{{$com_type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Owner Info</label>
							<select class="form-control property_category" name="owner_info">
								<option disabled selected="true">Select Owner type</option>
								@foreach($owner_types as $owner_type)
								<option value="{{$owner_type->id}}" {{$detail->owner_info==$owner_type->id?'selected':''}}>{{$owner_type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Document & Details</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>Property Status</label>
							<select class="form-control property_category" name="property_status">
								<option disabled selected="true">Select Property Status</option>
								@foreach($property_statuses as $pro_stat)
								<option value="{{$pro_stat->id}}" {{$detail->property_status==$pro_stat->id?'selected':''}}>{{$pro_stat->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>URL</label>
							<input type="text" name="url" value="{{$detail->url}}" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Availability</label>
							<input type="date" name="availability_from" class="form-control" value="{{$detail->availability_from}}">
						</div>
					</div>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Address</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>Property location</label>
							<input type="text" name="property_location" class="form-control" value="{{$detail->property_location}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Country</label>
							<input type="text" name="country" class="form-control" value="{{$detail->country}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Zone</label>
							<input type="text" name="zone" class="form-control" value="{{$detail->zone}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>District</label>
							<input type="text" name="district" class="form-control" value="{{$detail->district}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Town</label>
							<input type="text" name="town" class="form-control" value="{{$detail->town}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Place</label>
							<input type="text" name="place" class="form-control" value="{{$detail->place}}">
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>VDC/NP/MNP</label>
							<input type="text" name="vdc_np_mnp" class="form-control" value="{{$detail->vdc_np_mnp}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Ward No</label>
							<input type="text" name="ward_no" class="form-control" value="{{$detail->ward_no}}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Map</label>
							<input type="text" name="" class="form-control" id="searchInput" value="{{$detail->location}}">
							<div id="map" style="width: 750px; height: 500px;"></div>
							<input type="text" hidden=""   name="lat" id="lat" value="28.004831">
							<input type="text" hidden=""  name="lng" id="lng" value="85.369528">
							<input type="text" hidden=""  name="location" id="location" Value="Nepal">
						</div>
					</div>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Expected Price</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>Total Price (NRS)</label>
							<input type="number" name="total_price" value="{{$detail->total_price}}" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Unit Price Per Anna</label>
							<input type="number" name="anna_price" value="{{$detail->anna_price}}" class="form-control">
						</div>
					</div>
					
					
					
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Sales Details</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>Urgency Type</label>
							<select class="form-control property_category" name="urgency_id">
								<option disabled selected="true">Select Urgency Type</option>
								@foreach($urgency_types as $urgency_type)
								<option value="{{$urgency_type->id}}" {{$detail->urgency_id==$urgency_type->id?'selected':''}}>{{$pro_stat->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Bahina/Advance</label>
							<input type="number" name="advance" value="{{$detail->advance}}" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Negotiability(Min Amount)</label>
							<input type="text" name="min_amount" class="form-control" value="{{$detail->min_amount}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Negotiability(Max Amount)</label>
							<input type="text" name="max_amount" class="form-control" value="{{$detail->max_amount}}">
						</div>
					</div>
					<div class="col-md-12">
						<label>Rent</label>
					</div>
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="rent_per_month" class="form-control" placeholder="Rent Per Month" value="{{$detail->rent_per_month}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="min_lease" class="form-control" placeholder="Min Lease Amount" value="{{$detail->min_lease}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="min_deposit" class="form-control" placeholder="Min deposit amount" value="{{$detail->min_deposit}}">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-form-label">Broker's Response</label>
							<input type="radio" checked name="broker_response" value="yes">Yes
							<input  type="radio" name="broker_response" value="no">No
						</div>
					</div>

					
					
					
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Road Access</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-3">
						<div class="form-group">
							<label>Main Road Width</label>
							<input type="text" name="main_road_width" value="{{$detail->main_road_width}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Side Road Width</label>
							<input type="text" name="side_road_width" value="{{$detail->side_road_width}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Road Wide Facing The Land</label>
							<input type="text" name="road_wide_facing_the_land" value="{{$detail->road_wide_facing_the_land}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Mohoda Facing The Land</label>
							<input type="text" name="mohoda_facing_the_land" value="{{$detail->mohoda_facing_the_land}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Status Of Road</label>
							<input type="text" name="status_of_road" value="{{$detail->status_of_road}}" class="form-control">
						</div>
					</div>
					<!-- <div class="col-md-3">
						<div class="form-group">
							<label>Land Perimeter</label>
							<input type="text" name="land_perimeter" value="{{old('land_perimeter')}}" class="form-control">
						</div>
					</div> -->
					
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Land Area According To Lal Purja</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-3">
						<div class="form-group">
							<label>Land Area In Ropani</label>
							<input type="text" name="land_area_in_ropani_lal" value="{{$detail->land_area_in_ropani_lal}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Land Area In Sqft</label>
							<input type="text" name="land_area_in_sqft" value="{{$detail->land_area_in_sqft_lal}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Land Area In Meters</label>
							<input type="text" name="land_area_in_meters" value="{{$detail->land_area_in_meters_lal}}" class="form-control">
						</div>
					</div>
					
					
					
					
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Land Area According To Measurements</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-3">
						<div class="form-group">
							<label>Land Area In Ropani</label>
							<input type="text" name="land_area_in_ropani_mes" value="{{$detail->land_area_in_ropani_mes}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Land Area In Sqft</label>
							<input type="text" name="land_area_in_sqft_mes" value="{{$detail->land_area_in_sqft_mes}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Land Area In Meters</label>
							<input type="text" name="land_area_in_meters_mes" value="{{$detail->land_area_in_meters_mes}}" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Geometry Of Land</label>
							<select class="form-control" name="geometry_of_land">
								<option value="Rectangle" {{$detail->geometry_of_land=='Rectangle'?'selected':''}}>Rectangle</option>
								<option value="Corner Type" {{$detail->geometry_of_land=='Corner Type'?'selected':''}}>Corner Type</option>
								<option value="Others" {{$detail->geometry_of_land=='Others'?'selected':''}}>Others</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Elevation</label>
							<select class="form-control" name="elevation">
								@foreach($elevations as $elevation)
								<option value="{{$elevation->name}}" {{$detail->elvation==$elevation->name?'selected':''}}>{{$elevation->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>About Property</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>Property Highlights</label>
							<input type="number" name="property_highlights" value="{{$detail->property_highlights}}" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Property Detail Description</label>
							<textarea class="form-control" name="property_description">{{$detail->property_description}}</textarea>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Other Description</label>
							<input type="text" name="other_description" value="{{$detail->other_description}}" class="form-control">
						</div>
					</div>
					
					
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Property Designs</b></h3>
				</div>
				<div class="box-body">
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Environments</label>
							<select multiple="multiple" class="js-example-basic-multiple form-control environments" name="environments[]">
								@foreach($environments as $environment)
								<option value="{{$environment->id}}">{{$environment->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Facilities</label>
							<select multiple="multiple" class="js-example-basic-multiple form-control facilities" name="facilities_id[]">
								@foreach($facilities as $facility)
								<option value="{{$facility->id}}">{{$facility->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Nearby Facilities</label>
							<select multiple="multiple" class="js-example-basic-multiple form-control nearbyfacilities" name="nearby_facilities[]">
								@foreach($nearby_facilities as $nearby_facility)
								<option value="{{$nearby_facility->id}}">{{$nearby_facility->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Elevation</label>
							<select class="form-control" name="elevation" >
								@foreach($elevations as $elevation)
								<option value="{{$elevation->name}}">{{$elevation->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					
					
				</div>
			</div>
			
			
			
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Finance</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-4">
						<div class="form-group">
							<label>Finance/Bank Name</label>
							<input type="text" name="finance_bank_name" value="{{$detail->finance_bank_name}}" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Loan Amount</label>
							<input type="text" name="loan_amount" value="{{$detail->loan_amount}}" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>SEO</label>
							<input type="text" name="seo" value="{{$detail->seo}}" class="form-control">
						</div>
					</div>
					
					
					
					
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Image Section</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-4">
						<div class="form-group">
							<label>Feature Image</label>
							<input type="file" name="feature_image" class="form-control" id="fileUpload">
					   	<div id="wrapper">
                			<div id="image-holder"></div>
              			</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Gallery Images</label>
							<input type="file" id="upload_file" name="gallery_images[]" multiple class="form-control" />
							<div id="image_preview" class="row">
								@php($i=0)
	     						@php($j=0)
	     						@foreach($detail->images as $image)
	     						<div class="col-md-6 well well-sm img-block form-group" id="photo_{{$i++}}">
	     							<div class="img-holder">
	     								<img src="{{asset('images/property/thumbnail')}}/{{$image->filename}}" class="img-thumbnail head-img img-responsive">
	     							</div>
	     							
	     							<input type="hidden" name="filename[]" value="{{$image->filename}}">
	     							<br>
	     							<div class="row">
	     								
	     								<div class="col-md-12 col-xs-12">
	     									<button type="button" id="" data-image="{{$image->filename}}" class="btn del-btn btn-danger btn-block"><i class="fa fa-trash"></i></button>
	     								</div>
	     							</div>
	     						</div>
	    						@endforeach      
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Documents</label>
							<input type="file" name="documents" multiple class="form-control">
						</div>
					</div>
					
					
					
					
				
				</div>
			</div>
			<div class="form-group">
			    <input type="submit" name="save" value="save" class="btn btn-success">
			</div>
		</div>
		
	</div>
</form>
</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjQbpLmWtP5SBJQ6RWzplfIg0Sd0rpDYg&libraries=places&sensor=true"></script>
  <!-- datepicker -->
  <script>
  	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
  	
  	$('.message').delay(5000).fadeOut(400);

  	$(".facilities").select2().val({!! json_encode($detail->facilities()->pluck('facility_id')) !!}).trigger('change');
  	$(".nearbyfacilities").select2().val({!! json_encode($detail->nearbyfacilities()->pluck('nearbyfacility_id')) !!}).trigger('change');
  	$(".exteriorlooks").select2().val({!! json_encode($detail->exterior_looks()->pluck('exteriorlook_id')) !!}).trigger('change');
  	$(".interiorlooks").select2().val({!! json_encode($detail->interior_looks()->pluck('interiorlook_id')) !!}).trigger('change');
  	$(".environments").select2().val({!! json_encode($detail->environments()->pluck('environment_id')) !!}).trigger('change');


	$("#fileUpload").on('change', function () {

      if (typeof (FileReader) != "undefined") {

          var image_holder = $("#image-holder");
          image_holder.empty();

          var reader = new FileReader();
          reader.onload = function (e) {
              $("<img />", {
                  "src": e.target.result,
                  "class": "thumb-image",
                  "width" : '50%'
              }).appendTo(image_holder);

          }
          image_holder.show();
          reader.readAsDataURL($(this)[0].files[0]);
      } else {
          alert("This browser does not support FileReader.");
      }
  	});

  	//image gallery
  	$(document).ready(function(){
  		$('#upload_file').change(function(){
  			var formData = new FormData($('#form')[0]);
  			formData.delete('_method');
  			$.ajax({
  				url:"{{route('galleryImage')}}",
  				type:"POST",
  				data: formData,
  				async: true,
  				cache: false,
  				contentType: false,
  				processData: false,
  				success:function(returndata){
  					var step;
  					for (step = 0; step < returndata.length; step++) {
  					    addblock(returndata[step], step);
  					    
  					}
  				}

  			});
  		});
  	});

  	function addblock(photo,i){
  		var block = '<div class="col-md-6 well well-sm img-block form-group"id="photo_' + i + '">';
  		block += '<div class="img-holder">';
  		block += '<img src="' + photo.thumb_path + '/' + photo.name + '" class="img-thumbnail" />';
  		block += '</div>';
  		block += '<input type="hidden" name="filename[]" value="' + photo.name + '">';
  		block += '<br/>';
  		block += '<div class="row">';
  		
  		block += '<div class="col-md-12 col-xs-12">';
  		block += '<button type="button" data-image="' + photo.name + '" id="delete_' + i + '" class="del-btn btn btn-danger btn-block">';
  		block += '<i class="fa fa-trash"></i>';
  		block += '</button>';
  		block += ' </div>';
  		block += '</div>';
  		block += ' </div>';
  		block += '</div>';
  		$("#image_preview").append(block);
  	}


  	//deleting image block
  	$(document).on("click", "button.del-btn", function() {
  	  	var name = $(this).data('image');
  	  	var delConfirm = confirm('Are you sure you want to delete?');
  	  	var _this = this;
  	  	if (delConfirm) {
  	      	$.ajax({
  	          	method: 'post',
  	          	url: "{{route('removeImage')}}",
  	          	data: { name: name },
  	          	success: function(data) {
  	              $(_this).closest('.img-block').remove();
  	          }
  	      });
  	}
  	return false;
  	});

  	

  	




  	

  	

  	$(document).ready(function() {
  	  $(window).keydown(function(event){
  	    if(event.keyCode == 13) {
  	      event.preventDefault();
  	      return false;
  	    }
  	  });
  	});


  	 function initialize() {
  	   var latlng = new google.maps.LatLng(<?php echo ($detail->lat); ?>,<?php echo ($detail->lng); ?>);
  	    var map = new google.maps.Map(document.getElementById('map'), {
  	      center: latlng,
  	      zoom: 13
  	    });
  	    var marker = new google.maps.Marker({
  	      map: map,
  	      position: latlng,
  	      draggable: true,
  	      anchorPoint: new google.maps.Point(0, -29)
  	   });
  	    var input = document.getElementById('searchInput');
  	    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  	    var geocoder = new google.maps.Geocoder();
  	    var autocomplete = new google.maps.places.Autocomplete(input);
  	    autocomplete.bindTo('bounds', map);
  	    var infowindow = new google.maps.InfoWindow();   
  	    autocomplete.addListener('place_changed', function() {
  	        infowindow.close();
  	        marker.setVisible(false);
  	        var place = autocomplete.getPlace();
  	        if (!place.geometry) {
  	            window.alert("Autocomplete's returned place contains no geometry");
  	            return;
  	        }
  	  
  	        // If the place has a geometry, then present it on a map.
  	        if (place.geometry.viewport) {
  	            map.fitBounds(place.geometry.viewport);
  	        } else {
  	            map.setCenter(place.geometry.location);
  	            map.setZoom(17);
  	        }
  	       
  	        marker.setPosition(place.geometry.location);
  	        marker.setVisible(true);          
  	    
  	        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
  	        infowindow.setContent(place.formatted_address);
  	        infowindow.open(map, marker);
  	       
  	    });
  	    google.maps.event.addListener(marker, 'dragend', function (event) {
  	        /*cument.getElementById("latbox").value = this.getPosition().lat();
  	        document.getElementById("lngbox").value = this.getPosition().lng();*/
  	        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
  	            
  	             if (status == google.maps.GeocoderStatus.OK) {
  	                 if (results[0]) { 
  	                    var loc=results[0].formatted_address;
  	                    document.getElementById('searchInput').setAttribute('value',loc);
  	                    document.getElementById('location').setAttribute('value',loc);
  	                    document.getElementById('lat').setAttribute('value',marker.getPosition().lat());
  	                    document.getElementById('lng').setAttribute('value',marker.getPosition().lng());
  	                 }
  	             }
  	        });
  	     
  	       
  	    });
  	}
  	function bindDataToForm(address,lat,lng){
  	   document.getElementById('location').value = address;
  	   document.getElementById('lat').value = lat;
  	   document.getElementById('lng').value = lng;
  	   
  	}
  	google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endpush