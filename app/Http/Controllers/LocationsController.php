<?php

namespace App\Http\Controllers;

use App\Locations;
use Illuminate\Http\Request;

class LocationsController extends Controller
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
            'name'          => 'Locations',
            'title'         => 'Locations',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $locations = Locations::latest()->paginate(50);
  
        return view('locations.index',compact('locations', 'pages'))
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
            'name'          => 'Locations',
            'title'         => 'Locations',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );
        return view('locations.create',compact('pages'));

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
            'name'              => 'required', 'string', 'max:190',
            'node'              => 'required', 'string', 'max:190', 'unique:locations',
            'description'       => 'required', 'string', 'max:5000',
            'address'           => 'required', 'string', 'max:5000',
            'latitude'          => 'required', 'string', 'min:6',
            'longtitude'        => 'required', 'string', 'min:6',
            'logo'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6048',
        ]);
  
        // Locations::create($request->all());

        if ($request->hasFile('logo')) {

            $imageName = str_slug($request->name.time(), '-');
            $imageName = $imageName.'.'.request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('images'), $imageName);

            Locations::create([
                'name'              => $request->name,
                'node'              => $request->node,
                'description'       => $request->description,
                'address'           => $request->address,
                'latitude'          => $request->latitude,
                'longtitude'        => $request->longtitude,
                'location_image'    => 'images/'.$imageName,
            ]);

            return redirect()->route('locations.index')
                        ->with('success','Location created successfully.');

        } elseif (!$request->hasFile('logo')) {

            Locations::create([
                'name'              => $request->name,
                'node'              => $request->node,
                'description'       => $request->description,
                'address'           => $request->address,
                'latitude'          => $request->latitude,
                'longtitude'        => $request->longtitude,
            ]);

            return redirect()->route('locations.index')
                        ->with('success','Location created successfully without Background.');

        } else {

            return redirect()->route('locations.create')
                        ->with('error','Unable to upload Weather Status Background');

        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function show(Locations $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function edit(Locations $location)
    {

        $pages  = array(
            'name'          => 'Locations',
            'title'         => 'Locations',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        return view('locations.edit',compact('location', 'pages'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locations $location)
    {

        $request->validate([
            'name'              => 'required', 'string', 'max:190',
            'node'              => 'required', 'string', 'max:190', 'unique:locations',
            'description'       => 'required', 'string', 'max:5000',
            'address'           => 'required', 'string', 'max:5000',
            'latitude'          => 'required', 'string', 'min:6',
            'longtitude'        => 'required', 'string', 'min:6',
            'logo'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6048',
        ]);
  
        if ($request->hasFile('logo')) {

            $imageName = str_slug($request->name.time(), '-');
            $imageName = $imageName.'.'.request()->bg_img->getClientOriginalExtension();
            request()->bg_img->move(public_path('images'), $imageName);

            $location->update([
                'name'              => $request->name,
                'node'              => $request->node,
                'description'       => $request->description,
                'address'           => $request->address,
                'latitude'          => $request->latitude,
                'longtitude'        => $request->longtitude,
                'location_image'    => 'images/'.$imageName,
            ]);

            return redirect()->route('weather.index')
                        ->with('success','Location updated successfully.');

        } else {

            $location->update([
                'name'              => $request->name,
                'node'              => $request->node,
                'description'       => $request->description,
                'address'           => $request->address,
                'latitude'          => $request->latitude,
                'longtitude'        => $request->longtitude,
            ]);

            return redirect()->route('weather.index')
                        ->with('success','Location updated successfully without Logo.');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locations $location)
    {

        $location->delete();
  
        return redirect()->route('locations.index')
                        ->with('success','Location deleted successfully');

    }
}
