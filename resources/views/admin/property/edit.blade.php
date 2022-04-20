@extends('layouts.admin')	
@section('title','Edit Property')
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
	<h1>Property<small>edit</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Property</a></li>
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
<form method="post" action="{{route('property.update',$detail->id)}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="PUT">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Edit Property</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Purpose</label>
						<select class="form-control" name="purpose_id">
							@foreach($purposes as $purpose)
							<option value="{{$purpose->id}}" {{$purpose->id==$detail->purpose_id?'selected':''}}>{{$purpose->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control property_category" name="propertycategory_id">
							@foreach($categories as $category)
							<option value="{{$category->id}}" {{$category->id==$detail->propertycategory_id?'selected':''}}>{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group property_type">
						<label>Property Types	</label>
						<select class="form-control" name="propertytype_id" id="property_type">
							@foreach($property_types as $ptype)
							<option value="{{$ptype->id}}" {{$ptype->id==$detail->propertytype_id?'selected':''}}>{{$ptype->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>name(required)</label>
						<input type="text" name="name" class="form-control" value="{{$detail->name}}">
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
					
					
					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Image</h3>
				</div>
				<div class="box-body">
					
					<div class="form-group">
					   <label>Upload Image</label>
					   <input type="file" name="image" class="form-control">
					   
					</div>
				</div>
			</div>
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Publish</h3>
				</div>
				<div class="box-body">
							<div class="form-group">
								<label for="publish"><input type="checkbox" id="publish" name="publish" checked> Publish</label>
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
  	$(".js-example-basic-multiple").select2().val({!! json_encode($detail->facilities()->pluck('facility_id')) !!}).trigger('change');


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
		          	console.log(data.length)
		          	if(data.length>0){
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
    </script>
@endpush