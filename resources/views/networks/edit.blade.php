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

                        <h4 class="header-title">{{ __('Edit') }} {{ $pages['name'] }} - {{ $network->name }} <small><a class="btn float-right" href="{{ route('networks.index') }}">Back to All {{ $pages['name'] }} </a></small>  </h4>

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

                        <form method="POST" action="{{ route('networks.update', $network->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $network->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ $network->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                           
                           <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Recharge Code') }}</label>

                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $network->code }}" required placeholder="222">

                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="is_active" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select id="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }}" name="is_active" value="{{ old('is_active') }}" required>
                                        <option selected value="{{ $network->is_active }}">
                                            <?php if ($network->is_active == 1): ?>
                                                Active
                                            <?php else: ?>
                                                Inactive
                                            <?php endif ?>
                                        </option>
                                        <option value="">Select</option>
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
                                        {{ __('Update Network') }}
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
