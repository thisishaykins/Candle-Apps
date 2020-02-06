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
                      <small><a class="btn btn-success float-right" href="{{ route('canalytics_indoor.create') }}">Add New Indoor</a> </small> 
                    </h4>
                  </div>

                  <div class="single-table">
                      <div class="table-responsive">
                          <table class="table table-hover progress-table text-center-none">
                              <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Board/Locations</th>
                                    <th scope="col">Time (Data Time)</th>
                                    <th scope="col">Average Persons</th>
                                    <th scope="col">Date Uploaded For</th>
                                    <th scope="col">action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($canalytics as $analytic)
                                  <tr>
                                    <th scope="row">--</th>
                                    <?php $location  = DB::table('locations')->where('id', '=', $analytic->an_location_id)->first(); ?>
                                    <td>{{ $location->name }} ({{ $location->node }})</td>
                                    <?php $time  = DB::table('candle_analytics_time')->where('id', '=', $analytic->an_time_id)->first(); ?>
                                    <td>{{ $time->time_hrs }} ({{ $time->time }})</td>
                                    <td>{{ $analytic->an_number_persons }}</td>
                                    <td>{{ $analytic->an_date_added }}</td>
                                    
                                    <td>
                                      <form class="d-flex" action="{{ route('canalytics_indoor.destroy',$analytic->id) }}" method="POST">
                                        <ul class="d-flex justify-content-center">
                                          <li class="mr-3">
                                            <a href="{{ route('canalytics_indoor.edit',$analytic->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a>
                                          </li>
                                          <!-- <li> -->
                                            <button type="submit" class="text-danger" onclick="confirm('Are you sure you want to delete analytic stats data for: {{ $location->name }} on {{ $analytic->an_date_added }}')" ><i class="ti-trash"></i></button>
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

                  <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                      {{ $canalytics->links() }}
                    </nav>
                  </div>

                </div>
              </div>
            </div>

      </div>
  </div>
@endsection
