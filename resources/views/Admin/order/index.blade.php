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
    <div class="col-xl-6">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">The Orders</h4>
                {{-- <div class="col-md-6 mb-3">
                    <a href="{{ route('products.create') }}"  class="btn btn-primary"><i class="fa fa-user-circle"></i> {{__('Add New Product') }}</a>
                </div> --}}
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>price</th>
                        <th>create at</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index=>$order)
                          <tr>
                              <th scope="row">{{ $index +1 }}</th>
                              <td>{{ $order->client->name }}</td>
                              <td>{{ number_format($order->total,2 )}}</td>
                              <td>{{ $order->created_at->toFormattedDateString() }}</td>
                              <td>
                                  <form action="{{ route('theorders.destroy', $order->id) }}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-warning btn-sm order-product" title="show"
                                              data-url="{{ route('theorders.show', $order->id) }}"
                                              data-method = "get" >
                                          <i class="fa fa-list"></i>
                                      </button>
                                      <a href="{{ route('theorders.edit', $order->id) }}" class="btn btn-info btn-sm" title="edit"><i class="fa fa-edit"></i></a>
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

    <div class="col-xl-6 mb-30">
        <div class="card card-statistics h-100">
                <div class="card-body">
                    <h5 class="card-title border-0 pb-0">show products</h5>
                    @if ($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-1 table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Product </th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="order-list">

                                </tbody>
                            </table>
                        </div>
                    @else
                      <div>
                          <h3>there is no record</h3>
                      </div>
                    @endif
                </div>
                {{-- <h4 style="text-align: center;"> Total : <span class="total-price">{{  number_format($order->total, 2) }}</span> </h4> --}}
                {{-- <button  class="btn btn-primary btn-block disabled" id="add-order-form-btn" >
                     <i class="fa fa-plus"></i> Order Now
                </button> --}}

       </div>
    </div>
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
<script>
     $(document).ready(function(){
       $('.order-product').on('click',function(e){
        e.preventDefault();
         var url = $(this).data('url');
         var method = $(this).data('method');
            $.ajax({
                url:url,
                method:method,
                success: function(data) {
                   console.log(data);
                   $('.order-list').empty(data);
                   $('.order-list').append(data);
                },
            });
       })
    });

</script>


@endsection
