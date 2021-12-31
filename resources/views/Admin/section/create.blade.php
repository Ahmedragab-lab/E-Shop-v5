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
                <a class="btn btn-primary btn-sm" style="margin: 10px;" href="{{ route('sections.index') }}">{{ __('site.back') }}</a>
                <form class="" action="{{route('sections.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>{{ __('site.section_name_en') }}</label>
                        <input type="text" class="form-control" required placeholder="{{ __('Enter section name') }}" name="section_name" />
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
                        <label>{{ __('site.status') }}</label>
                        <input type="checkbox"  name="status" >
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.popular') }}</label>
                        <input type="checkbox"  name="popular" >
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.add-image') }} :</label>
                        <div>
                            <input class="form-control img" name="image"  type="file" accept="image/*">
                            <img src="{{ asset('uploads/section/default.jpg') }}" class="img-thumbnail img-preview" width="100" alt="no photo">
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
