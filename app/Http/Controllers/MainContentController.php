<?php

namespace App\Http\Controllers;


use Request;
use Carbon\Carbon;

use DB;
use Auth;
use App\Mainc;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class MainContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);  
        
//        \Session::flash('flash_message_bad', 'Please login to report');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    $userquests = DB::table('maincs')
            ->leftJoin('users', 'users.id', '=', 'maincs.user_id')
            ->select('users.name', 'users.id as uid', 'maincs.id', 'maincs.title', 'maincs.summary', 'maincs.body', 'maincs.created_at', 'maincs.slug')
            ->groupBy('maincs.id')
            ->paginate(7);   

    return view('pages.index', compact('userquests'));
    }
    
    public function shownew()
    {
        
    $userquests = DB::table('maincs')
            ->leftJoin('users', 'users.id', '=', 'maincs.user_id')
            ->select('users.name', 'users.id as uid', 'maincs.id', 'maincs.title', 'maincs.summary', 'maincs.body', 'maincs.created_at', 'maincs.slug')
            ->orderBy('created_at', 'desc')
            ->groupBy('maincs.id')
            ->paginate(7);   

    return view('pages.index', compact('userquests'));
    }
    
    public function btags()
    {
        
    $userquests = DB::table('maincs')
            ->leftJoin('users', 'users.id', '=', 'maincs.user_id')
            ->select('users.name', 'users.id as uid', 'maincs.id', 'maincs.title', 'maincs.summary', 'maincs.body', 'maincs.created_at', 'maincs.slug')
            ->groupBy('maincs.id')
            ->paginate(7);   

    return view('pages.index', compact('userquests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Createmainc $request)
    {

        $input = Request::all();
        $mainc = new mainc;
        
        $mainc->title = $input['title'];
        $mainc->body = $input['body'];
        $mainc->summary = $input['summary'];
        $mainc->user_id = Auth::user()->id;
        
        $mainc->save();
        
        $qid = $mainc->id; 
        
        $tagin = $input['tags'];
        
        $tagint = preg_replace('/\s+/', '', $tagin);
        
        $tagints = strtolower($tagint);
        
        $pieces = preg_split( '/#/', $tagints, NULL, PREG_SPLIT_NO_EMPTY);
        
        foreach ($pieces as $atag)
            {
            
                $atag = trim($atag);
                
            
                $existtags = DB::table('tags')
                    ->where('name', '=', $atag)
                    ->first();

                if(is_null($existtags))

                    {
                        $tag = new Tag;

                        $tag->name = $atag;

                        $tag->save();

                        $tidn = $tag->id;

                        $mainctag = new mainctag;

                        $mainctag->tag_id = $tidn;

                        $mainctag->mainc_id = $qid;

                        $mainctag->save();


                    }

                else
                    {

                        $tid = $existtags->id;    

                        $mainctag = new mainctag;

                        $mainctag->tag_id = $tid;

                        $mainctag->mainc_id = $qid;

                        $mainctag->save();
                    }
            }
        
        \Session::flash('flash_message', 'Your report has been posted');

        return redirect('maincs');
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
