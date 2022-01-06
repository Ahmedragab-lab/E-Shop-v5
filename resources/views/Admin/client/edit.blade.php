@extends('Admin.dashlayout.master')
@section('title') mora soft dashboard @endsection
@section('css')

@endsection
@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('site.add_client') }}</h4>
                <a class="btn btn-primary btn-sm" style="margin: 10px;" href="{{ route('clients.index') }}">{{ __('site.back') }}</a>
                <form class="" action="{{route('clients.update',$client->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-group">
                        <label>{{ __('site.name') }}</label>
                        <input type="text" class="form-control" required placeholder="{{ __('Enter client name') }}" name="name" value="{{ $client->name }}" />
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.add-image') }} :</label>
                        <div>
                            <input class="form-control img" name="image"  type="file" accept="image/*">
                            <img src="{{ asset('uploads/client/'.$client->image) }}" class="img-thumbnail img-preview" width="100" alt="no photo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.phone') }}</label>
                        <input type="text" class="form-control"  name="phone" value="{{ $client->phone }}"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('site.address') }}</label>
                        <input type="text" class="form-control"  name="address" value="{{ $client->address }}"/>
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
