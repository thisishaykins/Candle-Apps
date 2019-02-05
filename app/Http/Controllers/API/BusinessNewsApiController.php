<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use DB;
use App\BusinessNews;
use App\Sponsors;
use Carbon\Carbon;
use Validator;


class BusinessNewsApiController extends BaseController
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
            'name'          => 'Business News',
            'title'         => 'All Business News',
            'description'   => 'CANDLE BUSINESS is strictly support by APIs from world-class financial partners listed: BLOOMBERG, FINANCIAL TIMES, WSJ, BUSINESS INSIDER',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );

        $today      = Carbon::today();

        // $business_news      = BusinessNews::where('show_at', $today->toDateString())->get(); 
        $where_array        = array('business_news.show_at' => $today->toDateString(), 'business_news.is_active' => 1);
        $business_news      = DB::table('business_news')
                                ->join('sponsors', 'sponsors.id', '=', 'business_news.sponsor_id')
                                ->where($where_array)
                                ->orderBy('business_news.id', 'DESC')
                                ->get();

        if (!empty($business_news->first())) {

            foreach ($business_news as $business) {

                $businessnews_array[] = array(
                    'news_title'        => $business->business_post_title, 
                    'news_body'         => $business->business_post_content, 
                    'news_image'        => asset($business->business_post_image), 
                    'sponsor_name'      => $business->name, 
                    'sponsor_logo'      => asset($business->logo_path)//, 
                    // 'sponsor_descr'     => $business->description 
                );

            }

            return $this->sendResponse($businessnews_array, 'Business News retrieved successfully.');

        } else {

            return $this->sendError('No business news available at the moment', $errorMessages = [], 404);

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
