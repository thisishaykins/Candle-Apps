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
                        <form method="POST" action="{{ route('pins.store') }}" enctype="multipart/form-data">
                            @csrf

                            @if ($message = Session::get('error'))
                                <div class="alert alert-error">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="pin_code" class="col-md-4 col-form-label text-md-right">{{ __('Recharge PIN') }}</label>

                                <div class="col-md-6">
                                    <input id="pin_code" type="text" class="form-control{{ $errors->has('pin_code') ? ' is-invalid' : '' }}" name="pin_code" value="{{ old('pin_code') }}" required autofocus>

                                    @if ($errors->has('pin_code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pin_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Select  Location') }}</label>

                                <div class="col-md-6">
                                    <select id="location_id" class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}" name="location_id" value="{{ old('location_id') }}" required>
                                        <option>Select</option>
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
                                <label for="network_id" class="col-md-4 col-form-label text-md-right">{{ __('Select  Network') }}</label>

                                <div class="col-md-6">
                                    <select id="network_id" class="form-control{{ $errors->has('network_id') ? ' is-invalid' : '' }}" name="network_id" value="{{ old('network_id') }}" required>
                                        <option>Select</option>
                                        @foreach($networks as $network)
                                            <option value="{{ $network->id }}">{{ $network->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('network_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('network_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sponsor" class="col-md-4 col-form-label text-md-right">{{ __('Select  Sponsor') }}</label>

                                <div class="col-md-6">
                                    <select id="sponsor" class="form-control{{ $errors->has('sponsor') ? ' is-invalid' : '' }}" name="sponsor" value="{{ old('sponsor') }}" required>
                                        <option>Select</option>
                                        @foreach($sponsors as $sponsor)
                                            <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('sponsor'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sponsor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                           
                           <div class="form-group row">
                                <label for="sponsorimage" class="col-md-4 col-form-label text-md-right">{{ __('Sponsored Image') }}</label>

                                <div class="col-md-6">
                                    <input id="sponsorimage" type="file" class="form-control{{ $errors->has('sponsorimage') ? ' is-invalid' : '' }}" name="sponsorimage" value="{{ old('sponsorimage') }}">

                                    @if ($errors->has('sponsorimage'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sponsorimage') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="show_at" class="col-md-4 col-form-label text-md-right">{{ __('Schedule Date') }}</label>

                                <div class="col-md-6">
                                    <input id="show_at" type="date" class="form-control{{ $errors->has('show_at') ? ' is-invalid' : '' }}" name="show_at" value="{{ old('show_at') }}" required autofocus>

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
                                    <select id="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }}" name="is_active" value="{{ old('is_active') }}" required>
                                        <option>Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
                                        {{ __('Add Recharge PIN') }}
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
