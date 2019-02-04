<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use DB;
use App\SportNews;
use App\Sponsors;
use Carbon\Carbon;
use Validator;


class SportsApiController extends BaseController
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
            'description'   => 'Get access to all live Sports News across several different leagues in Europe and across the World of about 804 Leagues',
            'tags'          => '',
            'image'         => '',
            'author'        => config('app.name')
        );

        $today      = Carbon::today();

        // $sportnews          = SportNews::latest()->paginate(50);
        // $sportnews_array    = compact('sportnews', 'pages'))->with('i', (request()->input('page', 1) - 1) * 5); 
        // $sportnews          = SportNews::all();
        $sportnews          = SportNews::where('show_at', $today->toDateString())->get(); 
        $where_array        = array('sp_news.show_at' => $today->toDateString(), 'sp_news.is_active' => 1);
        $sportnews          = DB::table('sp_news')
                                ->join('sponsors', 'sponsors.id', '=', 'sp_news.sponsor_id')
                                ->where($where_array)
                                ->orderBy('sp_news.show_at', 'DESC')
                                ->get();

        if (!empty($sportnews->first())) {

            foreach ($sportnews as $sportnews) {

                $sportnews_array[] = array(
                    'news_title'        => $sportnews->title, 
                    'news_description'  => $sportnews->post_content, 
                    'news_bg_image'     => asset($sportnews->bg_image), 
                    'sponsor_name'      => $sportnews->name, 
                    'sponsor_logo'      => asset($sportnews->logo_path)//, 
                    // 'sponsor_descr'     => $sportnews->description 
                );

            }

            return $this->sendResponse($sportnews_array, 'SportNews retrieved successfully.');

        } else {
            return $this->sendError('No sportnews available at the moment', $errorMessages = [], 404);
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
