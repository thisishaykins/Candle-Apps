<?php

namespace App\Http\Controllers;

use App\Networks;
use Illuminate\Http\Request;

class NetworksController extends Controller
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
            'name'          => 'Networks',
            'title'         => 'Networks',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $networks = Networks::latest()->paginate(50);
  
        return view('networks.index',compact('networks', 'pages'))
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
            'name'          => 'Networks',
            'title'         => 'Networks',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );
        return view('networks.create',compact('pages'));

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
            'description'       => 'required', 'string', 'max:5000',
            'code'              => 'required', 'string', 'max:100',
            'is_active'         => 'required',
        ]);

        // Networks::create($request->all());
        Networks::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'code'          => $request->code,
            'code_char'     => '*'.$request->code.'*pin_code#',
            'is_active'     => $request->is_active,
        ]);
   
        return redirect()->route('networks.index')
                        ->with('success','Network created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Networks $network)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Networks $network)
    {

        $pages  = array(
            'name'          => 'Networks',
            'title'         => 'Networks',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        return view('networks.edit',compact('network', 'pages'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Networks $network)
    {

        $request->validate([
            'name'              => 'required', 'string', 'max:190',
            'description'       => 'required', 'string', 'max:5000',
            'code'              => 'required', 'string', 'max:100',
            'is_active'         => 'required',
        ]);
  
        $network->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'code'          => $request->code,
            'code_char'     => '*'.$request->code.'*pin_code#',
            'is_active'     => $request->is_active,
        ]);

  
        return redirect()->route('networks.index')
                        ->with('success','Network updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Networks $network)
    {

        $network->delete();
  
        return redirect()->route('networks.index')
                        ->with('success','Network deleted successfully');

    }
}
