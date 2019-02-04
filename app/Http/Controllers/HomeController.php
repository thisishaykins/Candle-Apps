<?php

namespace App\Http\Controllers;

use App\Account;
use App\Locations;
use App\Networks;
use App\Pins;
use App\Sponsors;
use App\SportNews;
use App\Status;
use App\Weather;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Pages Details & SEO
        $pages  = array(
            'name'          => 'Dashboard',
            'title'         => 'Dashboard',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        // Counts Models
        $count_accounts     = Account::count();
        $count_locations    = Locations::count();
        $count_networks     = Networks::count();
        $count_pins         = Pins::count();
        $count_sponsors     = Sponsors::count();
        $count_sportnews    = SportNews::count();
        $count_status       = Status::count();
        $count_weather      = Weather::count();

        // Recent Data
        $recent_accounts    = Account::latest()->paginate(5);
        $recent_locations   = Locations::latest()->paginate(5);
        $recent_networks    = Networks::all();
        $recent_pins        = Pins::latest()->paginate(5);
        $recent_sponsors    = Sponsors::latest()->paginate(5);
        $recent_sportnews   = SportNews::latest()->paginate(4);
        $recent_status      = Status::latest()->paginate(5);
        $recent_weather     = Weather::latest()->paginate(5);

        return view('home', compact('pages', 'count_accounts', 'count_locations', 'count_networks', 'count_pins', 'count_sponsors', 'count_sportnews', 'count_status', 'count_weather', 'recent_accounts', 'recent_locations', 'recent_networks', 'recent_pins', 'recent_sponsors', 'recent_sportnews', 'recent_status', 'recent_weather'));
    }
}
