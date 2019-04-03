<?php

namespace App\Http\Controllers;

use App\CandleAnalytics;
use App\Locations;
use Illuminate\Http\Request;

class CandleAnalyticsController extends Controller
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
            'name'          => 'Candle Analytics Stats',
            'title'         => 'Candle Analytics Stats',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $canalytics = CandleAnalytics::latest()->paginate(50);
  
        return view('canalytics.index',compact('canalytics', 'pages'))
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
            'name'          => 'Candle Analytics Stats',
            'title'         => 'Candle Analytics Stats',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $locations   = Locations::all();

        return view('canalytics.create',compact('pages', 'locations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'location_id'       => 'required', 'string', 'max:10',
            'num_cars'          => 'required', 'string', 'max:3',
            'avg_num_person'    => 'required', 'string', 'max:3',
            'soe_a'             => 'required', 'string', 'max:3',
            'soe_b'             => 'required', 'string', 'max:3',
            'soe_c'             => 'required', 'string', 'max:3',
            'soe_d'             => 'required', 'string', 'max:3',
            'soe_e'             => 'required', 'string', 'max:3',
            'soe_f'             => 'required', 'string', 'max:3',
            'gender_male'       => 'required', 'string', 'max:3',
            'gender_female'     => 'required', 'string', 'max:3',
            'show_at'           => 'required', 'string', 'max:15',
        ]);

        CandleAnalytics::create([
            'an_location_id'        => $request->location_id,
            'an_number_cars'        => $request->num_cars,
            'an_number_persons_car' => $request->avg_num_person,
            'an_soe_a'              => $request->soe_a,
            'an_soe_b'              => $request->soe_b,
            'an_soe_c'              => $request->soe_c,
            'an_soe_d'              => $request->soe_d,
            'an_soe_e'              => $request->soe_e,
            'an_soe_f'              => $request->soe_f,
            'an_gender_male'        => $request->gender_male,
            'an_gender_female'      => $request->gender_female,
            'an_date_added'         => $request->show_at,
        ]);

        return redirect()->route('canalytics.index')
                    ->with('success','Candle Analytic stat created successfully.');

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CandleAnalytics $canalytic)
    {

        $pages  = array(
            'name'          => 'Candle Analytics Stats',
            'title'         => 'Candle Analytics Stats',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $locations   = Locations::all();

        return view('canalytics.edit',compact('canalytic', 'pages', 'locations'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CandleAnalytics $canalytic)
    {

        $request->validate([
            'location_id'       => 'required', 'string', 'max:10',
            'num_cars'          => 'required', 'string', 'max:3',
            'avg_num_person'    => 'required', 'string', 'max:3',
            'soe_a'             => 'required', 'string', 'max:3',
            'soe_b'             => 'required', 'string', 'max:3',
            'soe_c'             => 'required', 'string', 'max:3',
            'soe_d'             => 'required', 'string', 'max:3',
            'soe_e'             => 'required', 'string', 'max:3',
            'soe_f'             => 'required', 'string', 'max:3',
            'gender_male'       => 'required', 'string', 'max:3',
            'gender_female'     => 'required', 'string', 'max:3',
            'show_at'           => 'required', 'string', 'max:15',
        ]);

        $canalytic->update([
            'an_location_id'        => $request->location_id,
            'an_number_cars'        => $request->num_cars,
            'an_number_persons_car' => $request->avg_num_person,
            'an_soe_a'              => $request->soe_a,
            'an_soe_b'              => $request->soe_b,
            'an_soe_c'              => $request->soe_c,
            'an_soe_d'              => $request->soe_d,
            'an_soe_e'              => $request->soe_e,
            'an_soe_f'              => $request->soe_f,
            'an_gender_male'        => $request->gender_male,
            'an_gender_female'      => $request->gender_female,
            'an_date_added'         => $request->show_at,
        ]);

        return redirect()->route('canalytics.index')
                    ->with('success','Candle Analytic stats updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CandleAnalytics $canalytic)
    {

        $canalytic->delete();
  
        return redirect()->route('canalytics.index')
                        ->with('success','Selected Candle Analytic stats successfully deleted');

    }
}
