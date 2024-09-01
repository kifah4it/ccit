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

    public function enroll(Request $req)
    {
        try {
            if (!isset($_SESSION))
                session_start();

            $LMS_URL = env('LMS_URL');
            $userid = $_SESSION['mdl_userinfo']->id;
            $courses = '';
            $messages = '';
            $key = env('localops_API_key');
            $url = $LMS_URL . '/webservice/rest/server.php?wstoken=' . $key . '&wsfunction=local_ops_assign_member_cohort_apply&moodlewsrestformat=json';
            if ($req->courses != null) {
                foreach ($req->courses as $crs) {
                    // $courses .= "courses[]=" . $crs . "&";
                    $selected_course = explode(':', $crs);
                    if(count($selected_course) > 1){
                        $options = [
                            'form_params' => [
                                'members' => [
                                    [
                                        'cohortid' => $selected_course[1],
                                        'userid' => $userid,
                                        'courseid' => $selected_course[0]
                                    ]
                                ]
                            ]
                        ];
                    }
                    else if(count($selected_course) == 1){
                        $options = [
                            'form_params' => [
                                'members' => [
                                    [
                                        'cohortid' => null,
                                        'userid' => $userid,
                                        'courseid' => $selected_course[1]
                                    ]
                                ]
                            ]
                        ];
                    }
                    else{
                        $messages = [
                            'status' => 'error',
                            'warningcode' => null,
                            'message' => 'neither cohort or course selected'
                        ];
                        return json_encode($messages);
                    }
                    
                    $client = new \GuzzleHttp\Client(['verify' => false]);
                    $r = $client->post($url, $options);
                    $messages = $r->getBody();
                }
            }
            return $messages;



            // return $r->getBody();
        } catch (Exception $ex) {
            Log::error(json_encode($ex, true));
        }
    }
}
