@extends('Admin.dashlayout.master')
@section('title') mora soft dashboard @endsection
@section('css')
   <!-- DataTables -->
   <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assers/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- Responsive datatable examples -->
   <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">The Sections</h4>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('products.create') }}"  class="btn btn-primary"><i class="fa fa-user-circle"></i> {{__('Add New Product') }}</a>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>section name</th>
                        <th>product name</th>
                        <th>image</th>
                        <th>original_Price</th>
                        <th>selling_Price</th>
                        <th>qty</th>
                        <th>tax</th>
                        <th>status</th>
                        <th>description</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index=>$product)
                          <tr>
                              <th scope="row">{{ $index +1 }}</th>
                              <td>{{ $product->section->section_name }}</td>
                              <td>{{ $product->product_name }}</td>
                              <td>
                                  <img src="{{ asset('uploads/product/'.$product->image) }}" class="img-thumbnail" width="50" alt="">
                              </td>
                              <td>{{ $product->original_price }}</td>
                              <td>{{ $product->selling_price }}</td>
                              <td>{{ $product->qty }}</td>
                              <td>{{ $product->tax }}</td>
                              <td>
                                  {{ $product->status ==1 ?  __('Avilable'): __('Unavilable') }}
                              </td>
                              <td>{{ $product->desc }}</td>
                              <td>
                                  <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                      @csrf
                                      @method('delete')
                                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm" title="edit"><i class="fa fa-edit"></i></a>
                                      <button type="button" class="btn btn-danger btn-sm" title="delete"
                                      onclick="confirm('{{ __('Are you sure to delete this product') }}') ? this.parentElement.submit() : ''">
                                      <i class="fa fa-trash"></i>
                                      </button>
                                  </form>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection
@section('js')
 <!-- Required datatable js -->
 <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
 <!-- Buttons examples -->
 <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
 <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
 <script src="{{ asset('assets/plugins/datatables/jszip.min.js')}}"></script>
 <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
 <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
 <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
 <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
 <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
 <!-- Responsive examples -->
 <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
 <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

 <!-- Datatable init js -->
 <script src="{{ asset('assets/en/pages/datatables.init.js') }}"></script>



@endsection
