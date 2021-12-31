@extends('Admin.dashlayout.master')
@section('title') mora soft dashboard @endsection
@section('css')

@endsection
@section('content')

<div class="row">
    <div class="col-lg-9">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('site.add_section') }}</h4>
                <a class="btn btn-primary btn-sm" style="margin: 10px;" href="{{ route('products.index') }}">{{ __('site.back') }}</a>
                <form class="" action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-group">
                        <label>{{ __('site.section_name') }}</label>
                        <select class="form-control" name="section_id" >
                            <option value="{{ $product->section->id}}" selected>{{ $product->section->section_name }}</option>
                            @foreach ( $sections as $section)
                                 <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.product_name') }}</label>
                        <input type="text" class="form-control" required  name="product_name" value="{{ $product->product_name }}" />
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.slug') }}</label>
                        <input type="text" class="form-control"  name="slug" value="{{ $product->slug }}"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.description') }}</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="desc">{{ $product->desc }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.small_description') }}</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="small_desc">{{ $product->small_desc }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.original_Price') }}</label>
                        <input type="text" class="form-control"  name="original_price" value="{{ $product->original_price }}"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.selling_Price') }}</label>
                        <input type="text" class="form-control"  name="selling_price" value="{{ $product->selling_price }}"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.qty') }}</label>
                        <input type="text" class="form-control"  name="qty" value="{{ $product->qty }}"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.tax') }}</label>
                        <input type="text" class="form-control"  name="tax" value="{{ $product->tax }}"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.status') }}</label>
                        <input type="checkbox"  name="status" {{ $product->status == 1?'checked':'' }}>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.trending') }}</label>
                        <input type="checkbox"  name="trending" {{ $product->trending == 1?'checked':'' }}>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.add-image') }} :</label>
                        <div>
                            <input class="form-control img" name="image"  type="file" accept="image/*">
                            <img src="{{ asset('uploads/product/'. $product->image) }}" class="img-thumbnail img-preview" width="100" alt="no photo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                {{ __('site.Save') }}
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                {{ __('site.Close') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- end col -->
@endsection
@section('js')

@endsection
