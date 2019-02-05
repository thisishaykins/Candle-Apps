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

                        <h4 class="header-title">{{ __('Edit') }} {{ $pages['name'] }} - {{ $businessnews->name }} <small><a class="btn float-right" href="{{ route('businessnews.index') }}">Back to All {{ $pages['name'] }} </a></small>  </h4>

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

                        <form method="POST" action="{{ route('businessnews.update', $businessnews->id) }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group row">
                                <label for="sponsor_id" class="col-md-4 col-form-label text-md-right">{{ __('Select  Sponsor') }}</label>

                                <div class="col-md-6">
                                    <select id="sponsor_id" class="form-control{{ $errors->has('sponsor_id') ? ' is-invalid' : '' }}" name="sponsor_id" required>
                                        <option>Select</option>
                                        @foreach($sponsors as $sponsor)
                                            <option value="{{ $sponsor->id }}" <?php if ($sponsor->id == $businessnews->sponsor_id) { echo 'selected'; }?> >
                                                {{ $sponsor->name }} 
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('sponsor_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sponsor_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $businessnews->business_post_title }}" required autofocus>
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
                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ $businessnews->business_post_content }}</textarea>

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
                                    <input id="bg_img" type="file" class="form-control{{ $errors->has('bg_img') ? ' is-invalid' : '' }}" name="bg_img" value="{{ $businessnews->business_post_image }}">

                                    <?php if ($businessnews->business_post_image): ?>
                                        <img src="{{ asset($businessnews->business_post_image) }}">
                                    <?php endif ?>

                                    @if ($errors->has('bg_img'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bg_img') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="show_at" class="col-md-4 col-form-label text-md-right">{{ __('Schedule Date') }}</label>

                                <div class="col-md-6">
                                    <input id="show_at" type="date" class="form-control{{ $errors->has('show_at') ? ' is-invalid' : '' }}" name="show_at" value="{{ $businessnews->show_at }}" required autofocus>

                                    @if ($errors->has('show_at'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('show_at') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="is_active" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select id="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }}" name="is_active" value="{{ $businessnews->is_active }}" required>
                                        <option>Select</option>
                                        <option value="1" <?php if ($businessnews->is_active == 1): ?> selected <?php endif ?> >Active</option>
                                        <option value="0"  <?php if ($businessnews->is_active == 0): ?> selected <?php endif ?> >Inactive</option>
                                    </select>

                                    @if ($errors->has('is_active'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('is_active') }}</strong>
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
