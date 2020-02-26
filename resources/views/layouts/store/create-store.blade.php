@extends('layouts.app')

@section('title-header')
    Add Store
@endsection

@section('content')
<div class="row">
        <div class="col-md-6">
            <form action=" {{ route('store.add') }} " method="post">  
            <div class="card">
                <div class="card-header">
                  <h4>Add Store</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group ">
                        <label>Name</label>
                        <div class="input-group  {{ $errors->has('name') ? ' is-invalid' : '' }}">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" name="name" class="form-control" required value=" {{ old('name') }} ">
                        </div>
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" cols="30" rows="30" class="form-control  {{ $errors->has('address') ? ' is-invalid' : '' }}"></textarea>
                    <small class="text-danger">{{ $errors->first('address') }}</small>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Save Store</button>
                  </div>
              </div>
        </div>    
    </form>
</div>
@endsection


@section('plugin-js')
    <!-- JS Libraies -->
  <script src="{{url('/')}}/assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="{{url('/')}}/assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="{{url('/')}}/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="{{url('/')}}/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="{{url('/')}}/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="{{url('/')}}/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="{{url('/')}}/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="{{url('/')}}/assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="{{url('/')}}/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{url('/')}}/assets/js/page/forms-advanced-forms.js"></script>
@endsection

@section('plugin-css')
<link rel="stylesheet" href="{{url('/')}}assets/modules/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="{{url('/')}}assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="{{url('/')}}assets/modules/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{url('/')}}assets/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="{{url('/')}}assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="{{url('/')}}assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
@endsection