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
                <form class="" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>{{ __('site.section_name') }}</label>
                        <select class="form-control" name="section_id" >
                            <option value="" > ---- {{ __('site.select_section') }} ----</option>
                            @foreach ( $sections as $section)
                                 <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('product_name') }}</label>
                        <input type="text" class="form-control" required placeholder="{{ __('enter_product_name') }}" name="product_name" />
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.slug') }}</label>
                        <input type="text" class="form-control"  name="slug" />
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.description') }}</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="desc"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.small_description') }}</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="small_desc"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.original_Price') }}</label>
                        <input type="text" class="form-control"  name="original_price" />
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.selling_Price') }}</label>
                        <input type="text" class="form-control"  name="selling_price" />
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.qty') }}</label>
                        <input type="text" class="form-control"  name="qty" />
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.tax') }}</label>
                        <input type="text" class="form-control"  name="tax" />
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.status') }}</label>
                        <input type="checkbox"  name="status" >
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.trending') }}</label>
                        <input type="checkbox"  name="trending" >
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.add-image') }} :</label>
                        <div>
                            <input class="form-control img" name="image"  type="file" accept="image/*">
                            <img src="{{ asset('uploads/product/default.jpg') }}" class="img-thumbnail img-preview" width="100" alt="no photo">
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
