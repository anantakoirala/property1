@extends('layouts.admin')	
@section('title','Add Property')
@push('admin.styles')
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
@endpush
@section('content')
<section class="content-header">
	<h1>Property<small>add</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Property</a></li>
		<li><a href="">Add</a></li>
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
<form method="post" action="{{route('property.store')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Add Property</b></h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Purpose</label>
						<select class="form-control" name="purpose_id">
							@foreach($purposes as $purpose)
							<option value="{{$purpose->id}}" >{{$purpose->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control property_category" name="propertycategory_id">
							<option disabled selected="true">Select Category</option>
							@foreach($categories as $category)
							<option value="{{$category->id}}" >{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group property_type hidden">
						<label>Property Types	</label>
						<select class="form-control" name="propertytype_id" id="property_type"></select>
					</div>
					
					<div class="form-group">
							<label>Select Facilities</label>
							<select multiple="multiple" class="js-example-basic-multiple form-control" name="facilities[]">
								@foreach($facilities as $facility)
								<option value="{{$facility->id}}">{{$facility->name}}</option>
								@endforeach
							</select>
						</div>
					
					<!-- <div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" value="{{old('title')}}">
					</div> -->
					
					
					<!-- <div class="form-group">
						<label>Description(required)</label>
						<textarea id="my-editor" name="description" class="form-control">{{old('description')}}</textarea>
					</div> -->
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title"><b>Basic Details</b></h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>name(required)</label>
							<input type="text" name="name" class="form-control" value="{{old('name')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group property_type hidden">
							<label>Property Types	</label>
							<select class="form-control" name="propertytype_id" id="property_type"></select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Class Types</label>
							<select class="form-control property_category" name="propertycategory_id">
								<option disabled selected="true">Select Category</option>
								@foreach($class_types as $class_type)
								<option value="{{$class_type->id}}" >{{$class_type->name}}</option>
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
							<select class="form-control property_category" name="propertycategory_id">
								<option disabled selected="true">Select Advertisement Types</option>
								@foreach($advertisement_types as $ad_type)
								<option value="{{$ad_type->id}}" >{{$ad_type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Commision Type</label>
							<select class="form-control property_category" name="propertycategory_id">
								<option disabled selected="true">Select Commission Type</option>
								@foreach($commission_types as $com_type)
								<option value="{{$com_type->id}}" >{{$com_type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Class Types</label>
							<select class="form-control property_category" name="propertycategory_id">
								<option disabled selected="true">Select Category</option>
								@foreach($class_types as $class_type)
								<option value="{{$class_type->id}}" >{{$class_type->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					
					
					
					
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Address</h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>Property location</label>
							<input type="text" name="property_location" class="form-control" value="{{old('property_location')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Country</label>
							<input type="text" name="country" class="form-control" value="{{old('country')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Zone</label>
							<input type="text" name="zone" class="form-control" value="{{old('zone')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>District</label>
							<input type="text" name="district" class="form-control" value="{{old('district')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Town</label>
							<input type="text" name="town" class="form-control" value="{{old('town')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Place</label>
							<input type="text" name="place" class="form-control" value="{{old('place')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Street</label>
							<input type="text" name="street" class="form-control" value="{{old('street')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>VDC/NP/MNP</label>
							<input type="text" name="vdc_np_mnp" class="form-control" value="{{old('vdc_np_mnp')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Ward No</label>
							<input type="text" name="ward_no" class="form-control" value="{{old('ward_no')}}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Map</label>
							<input type="text" name="" class="form-control" id="searchInput">
							<div id="map" style="width: 750px; height: 500px;"></div>
							<input type="text" hidden=""   name="lat" id="lat" value="28.004831">
							<input type="text" hidden=""  name="lng" id="lng" value="85.369528">
							<input type="text" hidden=""  name="location" id="location" Value="Nepal">
						</div>
					</div>
					
					<div class="form-group">
				    	<input type="submit" name="save" value="save" class="btn btn-success">
				    </div>
					
				</div>
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
  <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjQbpLmWtP5SBJQ6RWzplfIg0Sd0rpDYg&libraries=places&sensor=true"></script>
  <!-- datepicker -->
  <script>
  	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
  	var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  	$('#timepicker1').timepicker();
  	$('.message').delay(5000).fadeOut(400);
  	$(".js-example-basic-multiple").select2();

  	$(document).ready(function() {
  	  $(window).keydown(function(event){
  	    if(event.keyCode == 13) {
  	      event.preventDefault();
  	      return false;
  	    }
  	  });
  	});
  	$(document).ready(function(){

  		$(".property_category").on('change',function(e){
  			e.preventDefault();
  			var property_categoryid = $(this).val();
  			if(property_categoryid){
  				$.ajax({
  					url: "{{route('getPropertyTypes')}}",
	          type: "POST",
	          data:{id:property_categoryid},
	          success:function(data){
	          	if(data){
	          		$('.property_type').removeClass('hidden');
	          		$('#property_type').empty();
	          		$('#property_type').append('<option hidden>Choose Property Types</option>');
	          		$.each(data,function(key,ptype){
	          			 $('select[name="propertytype_id"]').append('<option value="'+ key +'">' + ptype.name+ '</option>');
	          		});
	          	}
	          }
  				});
  			}

  		});
  	});

  	 function initialize() {
  	   var latlng = new google.maps.LatLng(27.732323, 85.326601);
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