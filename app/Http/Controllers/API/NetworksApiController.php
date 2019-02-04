<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use DB;
use App\Networks;
use Validator;


class NetworksApiController extends BaseController
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
            'name'          => 'Airtime Networks',
            'title'         => 'All Airtime Networks across Candle',
            'description'   => ' ',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );


        $networks_array     = Networks::where('is_active', 1)->get(); 
        
        if (!empty($networks_array->first())) {

            foreach ($networks_array as $network) {
                $sponsors_array[]    = array(
                    'network_name'          => $network->name, 
                    'network_description'   => $network->description, 
                    'network_code'          => $network->code, 
                    'network_code_char'     => $network->code_char
                );
            }
            return $this->sendResponse($sponsors_array, 'Airtime Networks retrieved successfully.');

        } else {
            return $this->sendError('No Airtime Networks are available at the moment', $errorMessages = [], 404);
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
