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

                        <h4 class="header-title">{{ __('Edit') }} {{ $pages['name'] }} - {{ $weather->name }} <small><a class="btn float-right" href="{{ route('weather.index') }}">Back to All {{ $pages['name'] }} </a></small>  </h4>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('weather.update', $weather->id) }}">
                            @csrf
                            @method('PUT')



                            <div class="form-group row">
                                <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Select  Location') }}</label>

                                <div class="col-md-6">
                                    <select id="location_id" class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}" name="location_id" required>
                                        <option>Select</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" <?php if ($location->id == $weather->location_id) { echo 'selected'; }?> >
                                                {{ $location->name }} ({{ $location->node }})
                                            </option>
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
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $weather->name }}" required autofocus>
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
                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ $weather->description }}</textarea>

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
                                    <input id="bg_img" type="file" class="form-control{{ $errors->has('bg_img') ? ' is-invalid' : '' }}" name="bg_img" value="{{ $weather->bg_image }}">

                                    <?php if ($weather->bg_image): ?>
                                        <img src="{{ asset($weather->bg_image) }}">
                                    <?php endif ?>

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
                                        {{ __('Update Weather Status') }}
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
