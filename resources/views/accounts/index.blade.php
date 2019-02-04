@extends('layouts.dashboard.app')

@section('content')
  <!-- page title area end -->
    <div class="main-content-inner">
        <!-- sales report area start -->
        <div class="sales-report-area mt-0 mb-5">
          <div class="row">
            
            <div class="col-12 mt-5">

              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
              @endif

              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title">
                        {{ __('All Accounts') }} 
                        <small><a class="btn float-right" href="{{ route('accounts.create') }}">Add New</a> </small> 
                      </h4>

                        <form action="{{ route('accounts.import') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="file" class="form-control">
                          <br>
                          <button class="btn btn-success">Import User Data</button>
                          <a class="btn btn-warning" href="{{ route('accounts.export') }}">Export User Data</a>
                        </form>
                      </div>

                      <div class="single-table">
                          <div class="table-responsive">
                              <table class="table table-hover progress-table text-center-none">
                                  <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">status</th>
                                        <th scope="col">action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($accounts as $account)
                                      <tr>
                                        <th scope="row">--</th>
                                        <td>{{ $account->name }}</td>
                                        <td>{{ $account->email }}</td>
                                        <td>{{ $account->phone }}</td>
                                        <td><span class="status-p bg-success">active</span></td>
                                        <td>
                                          <form class="d-flex" action="{{ route('accounts.destroy',$account->id) }}" method="POST">
                                            <ul class="d-flex justify-content-center">
                                              <li class="mr-3">
                                                <a href="{{ route('accounts.edit',$account->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a>
                                              </li>
                                              <li>
                                                <button type="submit" class="text-danger"><i class="ti-trash"></i></button>
                                              </li>
                                            </ul>
                                            @csrf
                                            @method('DELETE')
                                          </form>
                                          
                                        </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>

                  </div>
              </div>
            </div>

      </div>
  </div>
@endsection
