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
                      <small><a class="btn btn-success float-right" href="{{ route('businessnews.create') }}">Add New</a> </small> 
                    </h4>
                  </div>

                  <div class="single-table">
                      <div class="table-responsive">
                          <table class="table table-hover progress-table text-center-none">
                              <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Sponsor</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Body</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($businessnews as $news)
                                  <tr>
                                    <th scope="row">--</th>
                                    <?php $sponsor  = DB::table('sponsors')->where('id', '=', $news->sponsor_id)->first(); ?>
                                    <td>{{ $sponsor->name }}</td>
                                    <td>{{ $news->business_post_title }}</td>
                                    <td>{{ $news->business_post_content }}</td>
                                    <td>{{ $news->show_at }}</td>
                                    
                                    <td>
                                      <?php if ($news->is_active == 1): ?>
                                        <span class="status-p bg-success">Active</span>
                                      <?php else: ?> 
                                        <span class="status-p bg-danger">Inactive</span>
                                      <?php endif ?>
                                    </td>
                                    <td>
                                      <form class="d-flex" action="{{ route('businessnews.destroy',$news->id) }}" method="POST">
                                        <ul class="d-flex justify-content-center">
                                          <li class="mr-3">
                                            <a href="{{ route('businessnews.edit',$news->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a>
                                          </li>
                                          <!-- <li> -->
                                            <button type="submit" class="text-danger" onclick="confirm('Are you sure you want to delete: {{ $news->name }}')" ><i class="ti-trash"></i></button>
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
