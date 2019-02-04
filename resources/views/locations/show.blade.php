@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('View Account: ') }} {{ $account->name }} <a class="btn float-right" href="{{ route('accounts.index') }}">All Accounts </a> </div>

                <div class="table-responsive">

                    <h2>{{ $account->name }}</h2>
                    <h2>{{ $account->email }}</h2>
                    <h2>{{ $account->phone }}</h2>
                    <h2>{{ $account->created_at }}</h2>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
