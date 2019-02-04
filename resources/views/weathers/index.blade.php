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
                      <small><a class="btn float-right" href="{{ route('weather.create') }}">Add New</a> </small> 
                    </h4>
                  </div>

                  <div class="single-table">
                      <div class="table-responsive">
                          <table class="table table-hover progress-table text-center-none">
                              <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Weather Title</th>
                                    <th scope="col">Node ID</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Has BG</th>
                                    <th scope="col">action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($weathers as $weather)
                                  <tr>
                                    <th scope="row">--</th>
                                    <td>{{ $weather->name }}</td>
                                    <td>{{ $weather->node }}</td>
                                    <td>{{ $weather->description }}</td>
                                    <?php $location  = DB::table('locations')->where('id', '=', $weather->location_id)->first(); ?>
                                    <td>{{ $location->name }} ({{ $location->node }})</td>
                                    <td>
                                      <?php if (!empty($weather->bg_image)): ?>
                                        <span class="status-p bg-success">True</span>
                                      <?php else: ?>
                                        <span class="status-p bg-danger">False</span>
                                      <?php endif ?>
                                    </td>
                                    <td>
                                      <form class="d-flex" action="{{ route('weather.destroy',$weather->id) }}" method="POST">
                                        <ul class="d-flex justify-content-center">
                                          <li class="mr-3">
                                            <a href="{{ route('weather.edit',$weather->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a>
                                          </li>
                                          <!-- <li> -->
                                            <button type="submit" class="text-danger" onclick="confirm('Are you sure you want to delete: {{ $weather->name }}')" ><i class="ti-trash"></i></button>
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
