<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use DB;
use App\Locations;
use App\CandleAnalyticsTime;
use Carbon\Carbon;
use Validator;


class CandleAnalyticsApiController extends BaseController
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
            'name'          => 'Candle Analytics Stats Data',
            'title'         => 'All Stats - Candle Analytics stats data',
            'description'   => ' ',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );

        $today          = Carbon::today();

        // $freebies           = Pins::where('location_id', 0)->get(); 
        // $where_array        = array('locations.is_active' => 1, 'locations.location_id' => 0);
        $canalytics         = DB::table('locations')
                            ->join('candle_analytics', 'candle_analytics.an_location_id', '=', 'locations.id')
                            ->join('candle_analytics_time', 'candle_analytics_time.id', '=', 'candle_analytics.an_time_id')
                            // ->where($where_array)
                            ->orderBy('candle_analytics.id', 'DESC')
                            ->get();

        if (!empty($canalytics->first())) {

            foreach ($canalytics as $key => $canalytics) {

                $canalytics_array[] = array(
                    'hour'      => $canalytics->time,
                    'hour_text' => $canalytics->time_hrs,
                    'location'  => array(
                                    'location_name' => $canalytics->name, 
                                    'location_node' => $canalytics->node
                    ),
                    'analytics' => array(
                                    'number_cars'               => $canalytics->an_number_cars, 
                                    'number_persons_per_car'    => $canalytics->an_number_persons_car, 
                                    'soe_a'                     => $canalytics->an_soe_a,
                                    'soe_b'                     => $canalytics->an_soe_b,
                                    'soe_c'                     => $canalytics->an_soe_c,
                                    'soe_d'                     => $canalytics->an_soe_d,
                                    'soe_e'                     => $canalytics->an_soe_e,
                                    'soe_f'                     => $canalytics->an_soe_f,
                                    'gender_male'               => $canalytics->an_gender_male, 
                                    'gender_female'             => $canalytics->an_gender_female
                    ),
                    'date_added'          => $canalytics->an_date_added
                );

            }
            
            return $this->sendResponse($canalytics_array, 'Candle analytics (Stats Data) retrieved successfully.');

        } else {

            $errorMessages = array(
                'error_code'    => 404, 
                'error_message' => 'No Candle Analytics available at the moment.',
                'help_url' => config('app.url').'/api/canalytics/'
            );
            return $this->sendError('Ooops, No Candle Analytics available at the moment.', $errorMessages, 404);

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
            'name'          => 'Candle Analytics Stats Data',
            'title'         => 'All Stats - Candle Analytics stats data',
            'description'   => ' ',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );
        

        if ($location_node) {

            $get_location       = Locations::where('node', $location_node)->first(); 

            if (!empty($get_location)) {

                $where_array        = array('locations.node' => $location_node, 'locations.id' => $get_location->id);
                $canalytics         = DB::table('locations')
                                    ->join('candle_analytics', 'candle_analytics.an_location_id', '=', 'locations.id')
                                    ->join('candle_analytics_time', 'candle_analytics_time.id', '=', 'candle_analytics.an_time_id')
                                    ->where($where_array)
                                    ->orderBy('candle_analytics.id', 'DESC')
                                    ->get();

                if (!empty($canalytics->first())) {

                    foreach ($canalytics as $key => $canalytics) {
                        $hour_array[]       = array(
                            'hour'      => $canalytics->time,
                            'hour_text' => $canalytics->time_hrs,
                            'analytics' => array(
                                'number_cars'               => $canalytics->an_number_cars, 
                                'number_persons_per_car'    => $canalytics->an_number_persons_car, 
                                'soe_a'                     => $canalytics->an_soe_a,
                                'soe_b'                     => $canalytics->an_soe_b,
                                'soe_c'                     => $canalytics->an_soe_c,
                                'soe_d'                     => $canalytics->an_soe_d,
                                'soe_e'                     => $canalytics->an_soe_e,
                                'soe_f'                     => $canalytics->an_soe_f,
                                'gender_male'               => $canalytics->an_gender_male, 
                                'gender_female'             => $canalytics->an_gender_female 
                            ),
                            'date_added' => $canalytics->an_date_added
                        );
                        $canalytics_array[] = array(
                            'hour'      => $canalytics->time,
                            'hour_text' => $canalytics->time_hrs,
                            'analytics' => array(
                                'number_cars'               => $canalytics->an_number_cars, 
                                'number_persons_per_car'    => $canalytics->an_number_persons_car, 
                                'soe_a'                     => $canalytics->an_soe_a,
                                'soe_b'                     => $canalytics->an_soe_b,
                                'soe_c'                     => $canalytics->an_soe_c,
                                'soe_d'                     => $canalytics->an_soe_d,
                                'soe_e'                     => $canalytics->an_soe_e,
                                'soe_f'                     => $canalytics->an_soe_f,
                                'gender_male'               => $canalytics->an_gender_male, 
                                'gender_female'             => $canalytics->an_gender_female 
                            ),
                            'date_added' => $canalytics->an_date_added
                        );

                    }

                    $canalytics_array = array(
                        'location'  => array(
                            'location_name' => $get_location->name, 
                            'location_node' => $get_location->node 
                        ), 
                        $hour_array
                    );
                    
                    return $this->sendResponse($hour_array, 'Candle analytics (Stats Data) retrieved successfully.');

                } else {

                    $errorMessages = array(
                        'error_code'    => 404, 
                        'error_message' => 'No Candle Analytics available at the moment.',
                        'help_url'      => config('app.url').'/api/canalytics/'
                    );
                    return $this->sendError('Ooops, No Candle Analytics available at the moment.', $errorMessages, 404);

                }

            } else {

                return $this->sendError('Ooops, Invalid location node.', $errorMessages = [], 404);

            }

        } else {

            $errorMessages = array(
                'error_code'    => 500, 
                'error_message' => 'Missing location_node as parameter.',
                'help_url'      => config('app.url').'/api/locations/'
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
