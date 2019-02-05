<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use DB;
use App\Pins;
use App\Networks;
use App\Locations;
use App\Sponsors;
use Carbon\Carbon;
use Validator;


class FreebiesApiController extends BaseController
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
            'name'          => 'Freebies - Airtime and Data Freebies',
            'title'         => 'All Freebies - Airtime and Data Freebies',
            'description'   => ' ',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );

        $today          = Carbon::today();

        // $freebies       = Pins::where('location_id', 0)->get(); 
        $where_array    = array('at_pins.show_at' => $today->toDateString(), 'at_pins.is_active' => 1, 'location_id' => 0);
        $freebies       = DB::table('at_pins')
                            ->join('at_networks', 'at_networks.id', '=', 'at_pins.network_id')
                            ->join('sponsors', 'sponsors.id', '=', 'at_pins.sponsor_id')
                            ->where($where_array)
                            ->orderBy('at_pins.id', 'DESC')
                            ->get();

        if (isset($freebies)) {

            foreach ($freebies as $key => $freebies) {

                $freebies_array[] = array(
                    'pin'                       => $freebies->pin_code, 
                    'pin_reacharge_code'        => $freebies->code, 
                    'pin_reacharge_code_char'   => $freebies->code_char, 
                    'pin_code_char'             => $freebies->pin_code_char, 
                    'pin_sponsor_image'         => asset($freebies->sponsor_promo_image), 
                    'pin_sponsor_name'          => $freebies->name, 
                    'pin_sponsor_logo'          => asset($freebies->logo_path)
                );

            }
            
            return $this->sendResponse($freebies_array, 'Freebies (Airtime and Data) retrieved successfully.');

        } else {

            $errorMessages = array(
                'error_code'    => 404, 
                'error_message' => 'No Freebies available at the moment.',
                'help_url' => config('app.url').'/api/freebies/'
            );
            return $this->sendError('Ooops, No Freebies available at the moment.', $errorMessages, 404);

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
                            'error_message' => 'No Freebies available at the moment',
                            'help_url' => config('app.url').'/api/freebies/'
                        );
                        return $this->sendError('Ooops, No Freebies available at the moment.', $errorMessages, 404);

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
