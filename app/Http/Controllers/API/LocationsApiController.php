<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use DB;
use App\Locations;
use Validator;


class LocationsApiController extends BaseController
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
            'name'          => 'Locations',
            'title'         => 'All Locations across Candle',
            'description'   => ' ',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );


        $locations          = Locations::all();
        // $sportnews_array    = compact('sportnews', 'pages'))->with('i', (request()->input('page', 1) - 1) * 5); 
        if (!empty($locations->first())) {
            foreach ($locations as $location) {
                $locations_array[]    = array(
                    'location_name'         => $location->name, 
                    'location_node'         => $location->node, 
                    'location_description'  => $location->description, 
                    'location_address'      => $location->address, 
                    'location_latitude'     => $location->latitude, 
                    'location_longtitude'   => $location->longtitude, 
                    'location_image'        => asset($location->location_image) 
                );
            }
            return $this->sendResponse($locations_array, 'Locations retrieved successfully.');
        } else {
            return $this->sendError('No Locations are available at the moment', $errorMessages = [], 404);
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
