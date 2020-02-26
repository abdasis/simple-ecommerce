@extends('layouts.app')

@section('title-header')
    Add Product
@endsection

@section('content')
<div class="row">
        <div class="col-md-6">
            <form action=" {{ route('product.update', $product->id) }} " method="post">  
            <div class="card">
                <div class="card-header">
                  <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label>Select Store</label>
                        <select class="form-control select2 {{ $errors->has('store_id') ? 'is-invalid' : '' }}" name="store_id">
                            <option value="">Pilih Store</option>
                            @foreach ($stores as $store)
                            <option {{ $store->id == $store->id ? 'selected' : '' }} value="{{ $store->id }}" >{{ $store->id  }} | {{ $store->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Product</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Masukan Nama Product" name="name" value="{{ $product->name }}">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              IDR
                            </div>
                          </div>
                          <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}" value="{{ $product->price }}" placeholder="Masukan Harga Barang">
                        </div>
                        <small class="text-danger">{{ $errors->first('price') }}</small>
                      </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Update Product</button>
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
<link rel="stylesheet" href="{{url('/')}}/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="{{url('/')}}/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/modules/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="{{url('/')}}/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
@endsection