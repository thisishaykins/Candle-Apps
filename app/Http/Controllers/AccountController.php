<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

/** Import & Exports **/ 
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;


class AccountController extends Controller
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
            'name'          => 'Accounts',
            'title'         => 'Accounts',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        $accounts = Account::latest()->paginate(50);
  
        return view('accounts.index',compact('accounts', 'pages'))
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
            'name'          => 'Accounts',
            'title'         => 'Accounts',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );
        return view('accounts.create',compact('pages'));

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
            'name'      => 'required', 'string', 'max:255',
            'email'     => 'required', 'string', 'email', 'max:255', 'unique:users',
            'phone'     => 'required', 'string', 'min:11', 'max:13',
            'password'  => 'required', 'string', 'min:6', 'confirmed',
        ]);
  
        Account::create($request->all());
   
        return redirect()->route('accounts.index')
                        ->with('success','Account profile created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {

        return view('accounts.show',compact('account'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {

        $pages  = array(
            'name'          => 'Accounts',
            'title'         => 'Accounts',
            'fb_title'      => 'Candle Apps Dashboard',
            'tw_title'      => 'Candle Apps Dashboard',
            'description'   => 'Candle Apps Dashboard is platform consiting of the Apps under the Candle INC.',
            'tags'          => 'candle, ooh, apps, candle apps, ooh apps, candle ooh app, ',
            'image'         => '//www.candle.media/images/social-image.jpg',
            'author'        => config('app.name')
        );

        return view('accounts.edit',compact('account', 'pages'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {



        $request->validate([
            'name'      => 'required', 'string', 'max:255',
            'email'     => 'required', 'string', 'email', 'max:255', 'unique:users',
            'phone'     => 'required', 'string', 'min:11', 'max:13',
            'password'  => 'nullable', 'string', 'min:6',
        ]);
  
        $account->update($request->all());

  
        return redirect()->route('accounts.index')
                        ->with('success','Account profile updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {

        $account->delete();
  
        return redirect()->route('accounts.index')
                        ->with('success','Account profile deleted successfully');

    }

    /** IMPORT & EXPORT SESSSSION **/ 

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       // return view('dnd.import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'user_accounts.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }
}
