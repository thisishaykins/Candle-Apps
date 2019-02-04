<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use DB;
use App\Sponsors;
use Validator;


class SponsorApiController extends BaseController
{
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
            'title'         => 'All Sponsors across Candle',
            'description'   => ' ',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );


        $sponsors          = Sponsors::where('is_active', 1)->get(); 
        
        if (!empty($sponsors->first())) {

            foreach ($sponsors as $sponsor) {
                $sponsors_array[]    = array(
                    'sponsor_name'         => $sponsor->name, 
                    'sponsor_description'  => $sponsor->description, 
                    'sponsor_image'        => asset($sponsor->logo_path) 
                );
            }
            return $this->sendResponse($sponsors_array, 'Sponsors retrieved successfully.');

        } else {
            return $this->sendError('No Sponsors are available at the moment', $errorMessages = [], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
