<?php

namespace App\Http\Controllers;

use App\Pins;
use App\Locations;
use App\Networks;
use App\Sponsors;
use Illuminate\Http\Request;

class PINSController extends Controller
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
            'name'          => 'Recharge PINS',
            'title'         => 'Recharge PINS',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $pins = PINS::latest()->paginate(50);
        // $pins = DB::table('at_pins')
        //                 ->join('locations', 'locations.id', '=', 'at_pin.location_id')
        //                 ->join('at_networks', 'at_networks.id', '=', 'at_pin.network_id')
        //                 ->join('sponsors', 'sponsors.id', '=', 'at_pin.sponsor_id')
        //                 // ->where('starting_date', $today_d)
        //                 ->latest()->paginate(50);
  
        return view('pins.index',compact('pins', 'pages'))
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
            'name'          => 'Recharge PINS',
            'title'         => 'Recharge PINS',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $locations  = Locations::all();
        $networks   = Networks::all();
        $sponsors   = Sponsors::all();

        return view('pins.create',compact('pages', 'locations', 'networks', 'sponsors'));

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
            'location_id'               => 'required', 'string', 'max:15',
            'network_id'                => 'required', 'string', 'max:15',
            'sponsor'                   => 'required', 'string', 'max:15',
            'sponsorimage'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'pin_code'                  => 'required', 'string', 'max:100',
            'show_at'                   => 'required', 'string', 'max:15',
            'is_active'                 => 'required',
        ]);


        // GET NETWORK DETAILS // Recharge CODE
        $network = Networks::where('id', '=', $request->network_id)->first();


        if ($request->hasFile('sponsorimage')) {

            $imageName = str_slug('sponsored-'.$request->pin_code.time(), '-');
            $imageName = $imageName.'.'.request()->sponsorimage->getClientOriginalExtension();
            request()->sponsorimage->move(public_path('images'), $imageName);

            Pins::create([
                'location_id'           => $request->location_id,
                'network_id'            => $request->network_id,
                'sponsor_id'            => $request->sponsor,
                'sponsor_promo_image'   => 'images/'.$imageName,
                'pin_code'              => $request->pin_code,
                'pin_code_char'         => '*'.$network->code.'*'.$request->pin_code.'#',
                'is_active'             => $request->is_active,
                'show_at'               => $request->show_at,
            ]);

            return redirect()->route('pins.index')
                    ->with('success','Recharge PIN created successfully with Sponsored Image.');

        } elseif (!$request->hasFile('sponsorimage')) {

            Pins::create([
                'location_id'           => $request->location_id,
                'network_id'            => $request->network_id,
                'sponsor_id'            => $request->sponsor,
                'pin_code'              => $request->pin_code,
                'pin_code_char'         => '*'.$network->code.'*'.$request->pin_code.'#',
                'is_active'             => $request->is_active,
                'show_at'               => $request->show_at,
            ]);

            return redirect()->route('pins.index')
                    ->with('success','Recharge PIN created successfully without Sponsored Image.');

        } else {
            
            return redirect()->route('pins.create')
                    ->with('error','Unable to Process form upload with sponsor image.');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pins  $pins
     * @return \Illuminate\Http\Response
     */
    public function show(Pins $pin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pins  $pins
     * @return \Illuminate\Http\Response
     */
    public function edit(Pins $pin)
    {

        $pages  = array(
            'name'          => 'Recharge PIN',
            'title'         => 'Recharge PIN',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $locations  = Locations::all();
        $networks   = Networks::all();
        $sponsors   = Sponsors::all();

        return view('pins.edit',compact('pin', 'pages', 'locations', 'networks', 'sponsors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pins  $pins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pins $pin)
    {

        $request->validate([
            'location_id'               => 'required', 'string', 'max:15',
            'network_id'                => 'required', 'string', 'max:15',
            'sponsor'                   => 'required', 'string', 'max:15',
            'sponsorimage'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'pin_code'                  => 'required', 'string', 'max:100',
            'show_at'                   => 'required', 'string', 'max:15',
            'is_active'                 => 'required',
        ]);


        // GET NETWORK DETAILS // Recharge CODE
        $network = Networks::where('id', '=', $request->network_id)->first();


        if ($request->hasFile('sponsor_promo_image')) {

            $imageName = str_slug('sponsored-'.$request->name.time(), '-');
            $imageName = $imageName.'.'.request()->sponsor_promo_image->getClientOriginalExtension();
            request()->sponsor_promo_image->move(public_path('images'), $imageName);

            $pin->update([
                'location_id'           => $request->location_id,
                'network_id'            => $request->network_id,
                'sponsor_id'            => $request->sponsor_id,
                'sponsor_promo_image'   => 'images/'.$imageName,
                'pin_code'              => $request->pin_code,
                'pin_code_char'         => '*'.$network->code.'*'.$request->pin_code.'#',
                'is_active'             => $request->is_active,
                'show_at'               => $request->show_at,
            ]);

            return redirect()->route('pins.index')
                    ->with('success','Recharge PIN updated successfully with Sponsored Image.');

        } else {

            $pin->update([
                'location_id'           => $request->location_id,
                'network_id'            => $request->network_id,
                'sponsor_id'            => $request->sponsor,
                'pin_code'              => $request->pin_code,
                'pin_code_char'         => '*'.$network->code.'*'.$request->pin_code.'#',
                'is_active'             => $request->is_active,
                'show_at'               => $request->show_at,
            ]);

            return redirect()->route('pins.index')
                    ->with('success','Recharge PIN updated successfully without Sponsored Image.');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pins  $pins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pins $pin)
    {

        $pin->delete();
  
        return redirect()->route('pins.index')
                        ->with('success','Recharge PIN deleted successfully');

    }
}
