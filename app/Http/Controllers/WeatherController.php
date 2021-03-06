<?php

namespace App\Http\Controllers;

use App\Weather;
use App\Locations;
use Illuminate\Http\Request;

class WeatherController extends Controller
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
            'name'          => 'Weather Data Status',
            'title'         => 'Weather Data Status',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $weathers = Weather::latest()->paginate(50);
  
        return view('weathers.index',compact('weathers', 'pages'))
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
            'name'          => 'Weather Data Status',
            'title'         => 'Weather Data Status',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $locations = Locations::all();

        return view('weathers.create',compact('pages', 'locations'));

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
            'name'              => 'required', 'string', 'max:190',
            'description'       => 'required', 'string', 'max:5000',
            'bg_img'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);

        if ($request->hasFile('bg_img')) {

            $imageName = str_slug($request->name.time(), '-');
            $imageName = $imageName.'.'.request()->bg_img->getClientOriginalExtension();
            request()->bg_img->move(public_path('images'), $imageName);

            Weather::create([
                'location_id'   => $request->location_id,
                'name'          => $request->name,
                'node'          => str_slug($request->name, '_'),
                'description'   => $request->description,
                'bg_image'     => 'images/'.$imageName,
            ]);

            return redirect()->route('weather.index')
                        ->with('success','Weather Status created successfully.');

        } elseif (!$request->hasFile('bg_img')) {

            Weather::create([
                'location_id'   => $request->location_id,
                'name'          => $request->name,
                'node'          => str_slug($request->name, '_'),
                'description'   => $request->description,
            ]);

            return redirect()->route('weather.index')
                        ->with('success','Weather Status created successfully without Background.');

        } else {

            return redirect()->route('weather.create')
                        ->with('error','Unable to upload Weather Status Background');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function show(Weather $weather)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function edit(Weather $weather)
    {

        $pages  = array(
            'name'          => 'Weather Data Status',
            'title'         => 'Weather Data Status',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $locations = Locations::all();

        return view('weathers.edit',compact('weather', 'pages', 'locations'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weather $weather)
    {

        $request->validate([
            'location_id'       => 'required', 'string', 'max:10',
            'name'              => 'required', 'string', 'max:190',
            'description'       => 'required', 'string', 'max:5000',
            'bg_img'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);
  

        if ($request->hasFile('bg_img')) {

            $imageName = str_slug($request->name.time(), '-');
            $imageName = $imageName.'.'.request()->bg_img->getClientOriginalExtension();
            request()->bg_img->move(public_path('images'), $imageName);

            $weather->update([
                'location_id'   => $request->location_id,
                'name'          => $request->name,
                'node'          => str_slug($request->name, '_'),
                'description'   => $request->description,
                'bg_image'     => 'images/'.$imageName,
            ]);

            // $sponsor->update($request->all());
            return redirect()->route('weather.index')
                        ->with('success','Weather Status updated successfully.');

        } else {

            $weather->update([
                'location_id'   => $request->location_id,
                'name'          => $request->name,
                'node'          => str_slug($request->name, '_'),
                'description'   => $request->description,
            ]);

            return redirect()->route('weather.index')
                        ->with('success','Weather Status updated successfully without Background.');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weather $weather)
    {

        $weather->delete();
  
        return redirect()->route('weather.index')
                        ->with('success','Weather Data deleted successfully');

    }
}
