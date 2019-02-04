<?php

namespace App\Http\Controllers;

use App\BoardAnalytics;
use Illuminate\Http\Request;

class BoardAnalyticsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Pages Details & SEO
        $pages  = array(
            'name'          => 'Board Analytics Stats',
            'title'         => 'Board Analytics Stats',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $analytics_stats = BoardAnalytics::latest()->paginate(50);
  
        return view('analytics.index',compact('analytics_stats', 'pages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pages  = array(
            'name'          => 'Board Analytics Stats',
            'title'         => 'Board Analytics Stats',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );
        return view('analytics.create',compact('pages'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BoardAnalytics  $boardAnalytics
     * @return \Illuminate\Http\Response
     */
    public function show(BoardAnalytics $boardAnalytics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BoardAnalytics  $boardAnalytics
     * @return \Illuminate\Http\Response
     */
    public function edit(BoardAnalytics $boardAnalytics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BoardAnalytics  $boardAnalytics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoardAnalytics $boardAnalytics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BoardAnalytics  $boardAnalytics
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoardAnalytics $boardAnalytics)
    {
        //
    }
}
