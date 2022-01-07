@extends('Admin.dashlayout.master')
@section('title') mora soft dashboard @endsection
@section('css')

@endsection
@section('content')
<div class="row">
    <div class="col-xl-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Sections</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    @foreach (\App\Models\Section::where('status','1')->where('popular','1')->orderByDesc('id')->limit(10)->get() as $key => $section)
                        <li class="nav-item">
                            <a class="nav-link {{ $key==0 ? 'active' : ''}}" data-toggle="tab" href="#tab{{ $section->id }}" role="tab">
                                <span class="d-none d-md-block">{!! $section->section_name !!}</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    @foreach (\App\Models\Section::where('status','1')->where('popular','1')->orderByDesc('id')->limit(10)->get() as $key => $section)
                        <div class="tab-pane p-3 {{ $key==0 ? 'active' : ''}} " id="tab{{ $section->id }}" role="tabpanel">
                            <p class="mb-0">
                                <div class="table-responsive">
                                    @if($section->products->count()>0)
                                        <table  class="table table-striped table-bordered p-0 text-center table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>product name</th>
                                                <th>product image</th>
                                                <th>price</th>
                                                <th>stock</th>
                                                <th>Add</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($section->products as $product)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$product->product_name}}</td>
                                                    <td>
                                                        <img src="{{ asset('uploads/product/'.$product->image) }}" class="img-thumbnail" width="50" alt="">
                                                    </td>
                                                    <td>{{$product->selling_price}}</td>
                                                    <td>{{$product->qty}}</td>
                                                    <td><a href="#"
                                                         id="product-{{ $product->id }}"
                                                         data-name="{{ $product->product_name }}"
                                                         data-id="{{ $product->id }}"
                                                         data-price="{{ $product->selling_price }}"
                                                         data-qty="{{ $product->qty }}"
                                                         class="btn btn-success btn-sm add-product-btn" >
                                                         <i class="fa fa-plus"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                      <h5> {{ __('there is no record') }}</h5>
                                    @endif
                                </div>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

     <div class="col-xl-6 mb-30">
        <div class="card card-statistics h-100">
            <form action="{{ route('order', $client) }}" method="POST">
                @csrf
                <div class="card-body">
                    <h5 class="card-title border-0 pb-0">Orders</h5>
                    <div class="table-responsive">
                        <table class="table table-1 table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Product </th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="order-list">

                            </tbody>
                        </table>
                    </div>
                </div>
                <h4 style="text-align: center;"> Total : <span class="total-price">0</span> </h4>
                <button  class="btn btn-primary btn-block disabled" id="add-order-form-btn" >
                     <i class="fa fa-plus"></i> Order Now
                </button>
            </form>
       </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $('.add-product-btn').on('click',function(){
           var id = $(this).data('id');
           var name = $(this).data('name');
           var price = $(this).data('price');
           var qty = $(this).data('qty');
           $(this).removeClass('btn-success').addClass('btn-default disabled');
           var html = `<tr>
                         <input type="hidden" name="products[]" value="${id}">
                         <td> ${name} </td>
                         <td><input type="number" name="q[]"  data-price="${price}" class="form-control input-small product-q" min="1" max="${qty}" value="1"></td>
                         <td class="product-price"> ${price} </td>
                         <td> <button class="btn btn-danger btn-sm remove" data-id="${id}"><i class="fa fa-trash"></i></button></td>
                      </tr>`;
            $('.order-list').append(html);
            calc_total();
         });

         $('body').on('click','.remove',function(e){
             e.preventDefault();
             var id = $(this).data('id');

            $(this).closest('tr').remove();
            $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');
            calc_total();
         });

         $('body').on('change','.product-q',function(){
             var q = parseInt($(this).val());
            //  var productPrice = parseInt($(this).closest('tr').find('.product-price').html());
            var unitPrice = $(this).data('price');
            $(this).closest('tr').find('.product-price').html(q * unitPrice);
            calc_total();
            //  var totalPrice = q * productPrice ;
            //  $('.total-price').html(totalPrice);
            //   console.log(unitPrice);
         });


    function calc_total(){
       var price = 0;
        $('.order-list .product-price').each(function(){
           price += parseInt($(this).html());
        });
        $('.total-price').html(price);
        //  console.log(price);
        if(price > 0){
          $('#add-order-form-btn').removeClass('disabled').addClass('btn-default ');
        }else{
          $('#add-order-form-btn').addClass('btn-warning disabled');
        }
    }

});
</script>
@endsection
