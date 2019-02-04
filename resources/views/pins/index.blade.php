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
                                    <th scope="col">Recharge PIN</th>
                                    <th scope="col">Network</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Sponsor (Sponsored Image)</th>
                                    <th scope="col">Scheduled Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($pins as $pin)
                                  <?php 
                                    $network    = DB::table('at_networks')->where('id', '=', $pin->network_id)->first();
                                    $location   = DB::table('locations')->where('id', '=', $pin->location_id)->first(); 
                                    $sponsor    = DB::table('sponsors')->where('id', '=', $pin->sponsor_id)->first(); 
                                    $sponsor    = DB::table('sponsors')->where('id', '=', $pin->sponsor_id)->first();
                                  ?>
                                  <tr>
                                    <th scope="row">--</th>
                                    <td>{{ $pin->pin_code }}</td>
                                    <td>{{ $network->name }}</td>
                                    <td>{{ $location->name }}</td>
                                    <td>
                                      {{ $sponsor->name }} <br/>
                                      <img src="{{ asset($pin->sponsor_promo_image) }}" width="250" >
                                    </td>
                                    <td>{{ $pin->show_at }}</td>
                                    <td> 
                                      <?php if ($pin->is_active == 1): ?>
                                        <span class="status-p bg-success">Active</span>
                                      <?php else: ?> 
                                        <span class="status-p bg-danger">Inactive</span>
                                      <?php endif ?>
                                    </td>
                                    <td>
                                      <form class="d-flex" action="{{ route('pins.destroy',$pin->id) }}" method="POST">
                                        <ul class="d-flex justify-content-center">
                                          <li class="mr-3">
                                            <a href="{{ route('pins.edit',$pin->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a>
                                          </li>
                                          <!-- <li> -->
                                            <button type="submit" class="text-danger" onclick="confirm('Are you sure you want to delete: {{ $pin->name }}')" ><i class="ti-trash"></i></button>
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
