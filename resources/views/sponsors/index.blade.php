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
                      {{ __('All') }} {{ $pages['title'] }} 
                      <small><a class="btn float-right" href="{{ route('sponsors.create') }}">Add New</a> </small> 
                    </h4>
                  </div>

                  <div class="single-table">
                      <div class="table-responsive">
                          <table class="table table-hover progress-table text-center-none">
                              <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($sponsors as $sponsor)
                                  <tr>
                                    <th scope="row">--</th>
                                    <td>{{ $sponsor->name }}</td>
                                    <td><img src="{{ asset($sponsor->logo_path) }}" width="100" ></td>
                                    <td> 
                                      <?php if ($sponsor->is_active == 1): ?>
                                        <span class="status-p bg-success">Active</span>
                                      <?php else: ?> 
                                        <span class="status-p bg-danger">Inactive</span>
                                      <?php endif ?>
                                    </td>
                                    <td>
                                      <form class="d-flex" action="{{ route('sponsors.destroy',$sponsor->id) }}" method="POST">
                                        <ul class="d-flex justify-content-center">
                                          <li class="mr-3">
                                            <a href="{{ route('sponsors.edit',$sponsor->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a>
                                          </li>
                                          <!-- <li> -->
                                            <button type="submit" class="text-danger" onclick="confirm('Are you sure you want to delete: {{ $sponsor->name }}')" ><i class="ti-trash"></i></button>
                                          <!-- </li> -->
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
