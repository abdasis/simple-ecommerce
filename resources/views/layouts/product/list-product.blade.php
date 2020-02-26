@extends('layouts.app')
@section('title-header')
    List Registered products
@endsection
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>List All product</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Registered</td>
                    <th>Updated</td>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>                                 
                @foreach ($products as $key =>  $product)
                <tr>
                    <td  class="align-middle">{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <div class="dropdown d-inline">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Option
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                              <a class="dropdown-item has-icon" href="{{ route('product.edit', $product->id) }}"><i class="fa fa-edit"></i> Edit</a>
                              <a class="dropdown-item has-icon text-danger" id="btn-delete" href="{{ route('product.delete', $product->id) }}"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                          </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('plugin-css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
@endsection

@section('plugin-js')
    <script src="{{ url('/') }}/assets/modules/datatables/datatables.min.js"></script>
    <script src="{{ url('/') }}/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{ url('/') }}/assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ url('/') }}/assets/js/page/modules-datatables.js"></script>
    <script>
        $('#btn-delete').click(function (event) {
            event.preventDefault()
            return confirm('Apakah yakin ingin menghapus data ini?')
        })
    </script>
@endsection