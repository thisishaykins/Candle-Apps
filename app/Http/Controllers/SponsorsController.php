<?php

namespace App\Http\Controllers;

use App\Sponsors;
use Illuminate\Http\Request;

class SponsorsController extends Controller
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
            'name'          => 'Sponsors',
            'title'         => 'Sponsors',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $sponsors = Sponsors::latest()->paginate(50);
  
        return view('sponsors.index',compact('sponsors', 'pages'))
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
            'name'          => 'Sponsors',
            'title'         => 'Sponsors',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );
        return view('sponsors.create',compact('pages'));

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
            'logo'              => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active'         => 'required',
        ]);

        if ($request->hasFile('logo')) {

            $imageName = str_slug($request->name.time(), '-');
            $imageName = $imageName.'.'.request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('images'), $imageName);

            Sponsors::create([
                'name'          => $request->name,
                'description'   => $request->description,
                'logo_path'     => 'images/'.$imageName,
                'is_active'     => $request->is_active,
            ]);

            return redirect()->route('sponsors.index')
                        ->with('success','Sponsors created successfully.');

        } else {

            return redirect()->route('sponsors.create')
                        ->with('error','Unable to upload Sponsor logo');

        }
  
        // Sponsors::create($request->all());
   
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsors  $sponsors
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsors $sponsors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsors  $sponsors
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsors $sponsor)
    {

        $pages  = array(
            'name'          => 'Sponsors',
            'title'         => 'Sponsors',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        return view('sponsors.edit',compact('sponsor', 'pages'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsors  $sponsors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsors $sponsor)
    {

        $request->validate([
            'name'              => 'required', 'string', 'max:190',
            'description'       => 'required', 'string', 'max:5000',
            'logo'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active'         => 'required',
        ]);
  

        if ($request->hasFile('logo')) {

            $imageName = str_slug($request->name.time(), '-');
            $imageName = $imageName.'.'.request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('images'), $imageName);

            $sponsor->update([
                'name'          => $request->name,
                'description'   => $request->description,
                'logo_path'     => 'images/'.$imageName,
                'is_active'     => $request->is_active,
            ]);

            // $sponsor->update($request->all());
            return redirect()->route('sponsors.index')
                        ->with('success','Sponsors updated successfully.');

        } else {

            $sponsor->update([
                'name'          => $request->name,
                'description'   => $request->description,
                'is_active'     => $request->is_active,
            ]);

            return redirect()->route('sponsors.index')
                        ->with('success','Sponsor updated successfully without Logo.');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsors  $sponsors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsors $sponsor)
    {

        $sponsor->delete();
  
        return redirect()->route('sponsors.index')
                        ->with('success','Sponsor deleted successfully');

    }
}
