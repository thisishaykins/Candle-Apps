<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use DB;
use App\Weather;
use App\Locations;
use Validator;


class WeatherApiController extends BaseController
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
            'name'          => 'Sport News',
            'title'         => 'All Sports News',
            'description'   => ' ',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );
        
        $errorMessages = array(
            'error_code'    => 500, 
            'error_message' => 'Missing location_node as parameter.',
            'help_url' => config('app.url').'/api/locations/'
        );
        return $this->sendError('Ooops, please enter your location node. Find your location_node using the link below', $errorMessages, 500);


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
     * @param  int  $location_node
     * @return \Illuminate\Http\Response
     */
    public function show($location_node = null, Request $request)
    {

        // Pages Details & SEO
        $pages  = array(
            'name'          => 'Sport News',
            'title'         => 'All Sports News',
            'description'   => ' ',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );
        
        $weather_node = $request->input('weather_node');

        if ($location_node) {

            $weather            = Weather::all();
            $get_location       = Locations::where('node', $location_node)->first(); 

            if ($get_location) {

                if (!isset($weather_node)) {

                    $weather        = Weather::where('location_id', $get_location->id)->get(); 
                    foreach ($weather as $weather) {
                        $weather_array[]    = array(
                            'name'          => $weather->name, 
                            'node'          => $weather->node, 
                            'description'   => $weather->description, 
                            'bg_image'      => asset($weather->bg_image) 
                        );
                    }
                    return $this->sendResponse($weather_array, 'Weather Data retrieved successfully.');

                } else {

                    $where_node     = array('location_id' => $get_location->id, 'node' => $weather_node);
                    $weather_array  = Weather::where($where_node)->first(); 

                    if (isset($weather_array)) {

                        $weather_array   = array(
                            'name'          => $weather_array->name, 
                            'node'          => $weather_array->node, 
                            'description'   => $weather_array->description, 
                            'bg_image'      => asset($weather_array->bg_image) 
                        );
                        return $this->sendResponse($weather_array, 'Weather Node Data retrieved successfully.');

                    } else {

                        $errorMessages = array(
                            'error_code'    => 500, 
                            'error_message' => 'Invalid weather node value.',
                            'help_url' => config('app.url').'/api/weather/'.$location_node
                        );
                        return $this->sendError('Ooops, Invalid weather node.', $errorMessages, 404);

                    }


                }

            } else {

                return $this->sendError('Ooops, Invalid location node.', $errorMessages = [], 404);

            }

        } else {

            $errorMessages = array(
                'error_code'    => 500, 
                'error_message' => 'Missing location_node as parameter.',
                'help_url' => config('app.url').'/api/locations/'
            );
            return $this->sendError('Ooops, please enter your location node. Find your location_node using the link below', $errorMessages, 500);

        }


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
