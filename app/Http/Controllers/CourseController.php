<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    /** test by kifah 2222222
     * Display a listing of the resource.
     *testttssss
     * test by george
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('courses');
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
    
    public function enroll(Request $req){
        try{
        if(!isset($_SESSION))
                session_start();

        $LMS_URL = env('LMS_URL');
        $username = $_SESSION['mdl_userinfo']->username;
        $courses = '';
        $coursesArr = [];
        if($req->courses != null){
            foreach( $req->courses as $crs ){
                $courses .= "courses[]=".$crs."&";
            }
        }
        $key = env('localops_API_key');
        $url = $LMS_URL.'/webservice/rest/server.php?wstoken='.$key.'&wsfunction=local_ops_enroll_student&username='.$username.'&'.$courses.'moodlewsrestformat=json';
 
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $r = $client->request('GET', $url);
   return $r->getBody();
    }
    catch(Exception $ex){
        Log::error(json_encode($ex,true));
    }
}
}
