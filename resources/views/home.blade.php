@extends('layouts.dashboard.app')

@section('content')
<style type="text/css">
    .single-post { float: left;  }
</style>

    <!-- page title area end -->
    <div class="main-content-inner">
        <!-- sales report area start -->
        <div class="sales-report-area mt-5 mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0">Accounts</h4>
                                <p>24 H</p>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2>{{ $count_accounts }}</h2>
                                <span>- Profiles</span>
                            </div>
                        </div>
                        <canvas id="coin_sales1" height="100"></canvas>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon"><i class="fa fa-map"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0">Our Boards/Locations</h4>
                                <p>24 H</p>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2>{{ $count_locations }}</h2>
                                <span>- Locations</span>
                            </div>
                        </div>
                        <canvas id="coin_sales2" height="100"></canvas>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-report">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon"><i class="fa fa-building"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0">Sponsors</h4>
                                <p>24 H</p>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2>{{ $count_sponsors }}</h2>
                                <span>- Our Sponsors</span>
                            </div>
                        </div>
                        <canvas id="coin_sales3" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- sales report area end -->
        <!-- overview area start -->
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">Overview</h4>
                            <select class="custome-select border-0 pr-3">
                                <option selected>Last 24 Hours</option>
                                <option value="0">01 July 2018</option>
                            </select>
                        </div>
                        <div id="verview-shart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 coin-distribution">
                <div class="card h-full">
                    <div class="card-body">
                        <h4 class="header-title mb-0">Data Sets</h4>
                        <div id="coin_distribution"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- overview area end -->
        <!-- market value area start -->
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">Our Locations/Boards</h4>
                            <!-- <select class="custome-select border-0 pr-3">
                                <option selected>Last 24 Hours</option>
                                <option value="0">01 July 2018</option>
                            </select> -->
                        </div>
                        <div class="market-status-table mt-4">
                            <div class="table-responsive">
                                <table class="dbkit-table">
                                    <tr class="heading-td">
                                        <td class="mv-icon">Logo</td>
                                        <td class="coin-name">Name</td>
                                        <td class="buy">Node ID</td>
                                        <td class="sell">Address</td>
                                        <td class="trends">Latitude</td>
                                        <td class="attachments">Longtitude</td>
                                        <td class="stats-chart">Stats</td>
                                    </tr>

                                    @foreach($recent_locations as $location)
                                    <tr>
                                        <td class="mv-icon"><img src="{{ asset($location->location_image) }}" alt="icon">
                                        </td>
                                        <td class="coin-name">{{ $location->name }}</td>
                                        <td class="buy">{{ $location->node }}</td>
                                        <td class="sell">{{ $location->address }}</td>
                                        <td class="trends">{{ $location->latitude }}</td>
                                        <td class="attachments">{{ $location->longtitude }}</td>
                                        <td class="stats-chart">
                                            <canvas id="mvaluechart"></canvas>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- market value area end -->
        <!-- row area start -->
        <div class="row">
            <!-- Live Crypto Price area start -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Freebies - <strong>Networks</strong></h4>
                        <div class="cripto-live mt-5">
                            <ul>
                                @foreach($recent_networks as $network)
                                <li>
                                    <div class="icon b">{{ substr($network->name, 0, 1) }}</div> {{ $network->name }}<span><i class="fa fa-long-arrow-up"></i>{{ $network->code_char }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Live Crypto Price area end -->
            <!-- trading history area start -->
            <div class="col-lg-8 mt-sm-30 mt-xs-30">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="header-title">Freebies - <strong>Recharge Cards</strong></h4>
                        </div>
                        <div class="trad-history mt-0">
                            <div class="table-responsive">
                                <table class="dbkit-table">
                                    <tr class="heading-td" style="text-align: center;">
                                        <td>Recharge PIN</td>
                                        <td>Network</td>
                                        <td>Sponsored Image</td>
                                        <td>Date</td>
                                        <td>Status</td>
                                    </tr>
                                    @foreach($recent_pins as $pin)
                                    <tr style="text-align: center;">
                                        <td>{{ $pin->pin_code }}</td>
                                        <td>4.00 AM</td>
                                        <td><img src="{{ asset($pin->sponsor_promo_image) }}" width="70"></td>
                                        <td>{{ $pin->show_at }}</td>
                                        <td>
                                            <?php if ($pin->is_active == 1): ?>
                                                <span class="status-p bg-success">Active</span>
                                            <?php else: ?> 
                                                <span class="status-p bg-danger">Inactive</span>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- trading history area end -->
        </div>
        <!-- row area end -->
        <div class="row mt-5">
            <!-- latest news area start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Sports News</h4>
                        <div class="letest-news mt-5">
                            @foreach($recent_sportnews as $news_item)
                            <div class="col-md-6 single-post mb-xs-40 mb-sm-40">
                                <div class="lts-thumb">
                                    <img src="{{ asset($news_item->bg_image) }}" alt="post thumb">
                                </div>
                                <div class="lts-content">
                                    <span>Admin Post</span>
                                    <h2><a href="#">{{ $news_item->title }}</a></h2>
                                    <p>{{ $news_item->post_content }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- latest news area end -->
        </div>
        <!-- row area start-->
    </div>

@endsection
