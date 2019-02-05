@extends('layouts.dashboard.app')

@section('content')
  <!-- page title area end -->
    <div class="main-content-inner">
        <!-- sales report area start -->
        <div class="sales-report-area mt-0 mb-5">
          <div class="row">
            <div class="col-12 mt-5">
                <div class="card">

                    <div class="card-body">
                        <h4 class="header-title">{{ __('Add New') }} {{ $pages['title'] }}</h4>
                        <form method="POST" action="{{ route('weather.store') }}" enctype="multipart/form-data">
                            @csrf

                            @if ($message = Session::get('error'))
                                <div class="alert alert-error">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Select  Location') }}</label>

                                <div class="col-md-6">
                                    <select id="location_id" class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}" name="location_id" value="{{ old('location_id') }}" required>
                                        <option value="">Select</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }} ({{ $location->node }})</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('location_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    <small class="text-info">Sunny, Cloudy, Rainy...</small>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Weather Message') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                           
                           <div class="form-group row">
                                <label for="bg_img" class="col-md-4 col-form-label text-md-right">{{ __('Background Image') }}</label>

                                <div class="col-md-6">
                                    <input id="bg_img" type="file" class="form-control{{ $errors->has('bg_img') ? ' is-invalid' : '' }}" name="bg_img" value="{{ old('bg_img') }}">

                                    @if ($errors->has('bg_img'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bg_img') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Weather Status') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
