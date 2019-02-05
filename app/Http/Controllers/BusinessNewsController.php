<?php

namespace App\Http\Controllers;

use App\BusinessNews;
use App\Sponsors;
use Illuminate\Http\Request;

class BusinessNewsController extends Controller
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
            'name'          => 'Business News',
            'title'         => 'Business News',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $businessnews = BusinessNews::latest()->paginate(50);
  
        return view('businessnews.index',compact('businessnews', 'pages'))
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
            'name'          => 'Business News',
            'title'         => 'Business News',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $sponsors   = Sponsors::all();

        return view('businessnews.create',compact('pages', 'sponsors'));

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
            'sponsor_id'        => 'required', 'string', 'max:10',
            'name'              => 'required', 'string', 'max:190',
            'description'       => 'required', 'string', 'max:5000',
            'bg_img'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'show_at'           => 'required', 'string', 'max:15',
            'is_active'         => 'required', 'string', 'max:3',
        ]);

        if ($request->hasFile('bg_img')) {

            $imageName = str_slug($request->name.time(), '-');
            $imageName = $imageName.'.'.request()->bg_img->getClientOriginalExtension();
            request()->bg_img->move(public_path('images'), $imageName);

            BusinessNews::create([
                'sponsor_id'                => $request->sponsor_id,
                'business_post_title'       => $request->name,
                'business_post_content'     => $request->description,
                'business_post_image'       => 'images/'.$imageName,
                'is_active'                 => $request->is_active,
                'show_at'                   => $request->show_at,
            ]);

            return redirect()->route('businessnews.index')
                        ->with('success','Business News created successfully.');

        } elseif (!$request->hasFile('bg_img')) {

            BusinessNews::create([
                'sponsor_id'                => $request->sponsor_id,
                'business_post_title'       => $request->name,
                'business_post_content'     => $request->description,
                'is_active'                 => $request->is_active,
                'show_at'                   => $request->show_at,
            ]);

            return redirect()->route('businessnews.index')
                        ->with('success','Business News created successfully with news background.');

        } else {

            return redirect()->route('businessnews.create')
                        ->with('error','Unable to upload Sport News Background');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessNews  $businessnews
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessNews $businessnews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessNews  $businessnews
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessNews $businessnews)
    {

        $pages  = array(
            'name'          => 'Business News',
            'title'         => 'Business News',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $sponsors   = Sponsors::all();

        return view('businessnews.edit',compact('businessnews', 'pages', 'sponsors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessNews  $businessnews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessNews $businessnews)
    {

        $request->validate([
            'sponsor_id'        => 'required', 'string', 'max:10',
            'name'              => 'required', 'string', 'max:190',
            'description'       => 'required', 'string', 'max:5000',
            'bg_img'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'show_at'           => 'required', 'string', 'max:15',
            'is_active'         => 'required', 'string', 'max:3',
        ]);
  

        if ($request->hasFile('logo')) {

            $imageName = str_slug($request->name.time(), '-');
            $imageName = $imageName.'.'.request()->bg_img->getClientOriginalExtension();
            request()->bg_img->move(public_path('images'), $imageName);

            $businessnews->update([
                'sponsor_id'                => $request->sponsor_id,
                'business_post_title'       => $request->name,
                'business_post_content'     => $request->description,
                'business_post_image'       => 'images/'.$imageName,
                'is_active'                 => $request->is_active,
                'show_at'                   => $request->show_at,
            ]);

            return redirect()->route('businessnews.index')
                        ->with('success','News item updated successfully.');

        } else {

            $businessnews->update([
                'sponsor_id'                => $request->sponsor_id,
                'business_post_title'       => $request->name,
                'business_post_content'     => $request->description,
                'is_active'                 => $request->is_active,
                'show_at'                   => $request->show_at,
            ]);

            return redirect()->route('businessnews.index')
                        ->with('success','News item updated successfully without a new background image.');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessNews  $businessnews
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessNews $businessnews)
    {

        $businessnews->delete();
  
        return redirect()->route('businessnews.index')
                        ->with('success','Sport News deleted successfully');

    }
}
