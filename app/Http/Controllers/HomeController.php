<?php

namespace App\Http\Controllers;

use App\Models\CoursesView;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    //
    public function index()
    {

        if (!isset($_SESSION))
            session_start();


        if (isset($_GET['sesskey'])) {
            $_SESSION['mdl_sesskey'] = $_GET['sesskey'];


            if (isset($_SESSION['redirect'])) {

                $section = isset($_SESSION['section']) ? $_SESSION['section'] : '';
                $redir = $_SESSION['redirect'] . $section;
                unset($_SESSION['redirect']);
                unset($_SESSION['section']);
                return Redirect::to($redir);
            } else
                return Redirect::to(env('LMS_URL') . "/my");
        }

        // require_once('geoplugin.class.php');
        // $geoplugin = new geoPlugin();
        // If we wanted to change the base currency, we would uncomment the following line
        // $geoplugin->currency = 'EUR';

        // $geoplugin->locate();

        // echo "Geolocation results for {$geoplugin->ip}: <br />\n".
        // 	"City: {$geoplugin->city} <br />\n".
        // 	"Region: {$geoplugin->region} <br />\n".
        // 	"Region Code: {$geoplugin->regionCode} <br />\n".
        // 	"Region Name: {$geoplugin->regionName} <br />\n".
        // 	"DMA Code: {$geoplugin->dmaCode} <br />\n".
        // 	"Country Name: {$geoplugin->countryName} <br />\n".
        // 	"Country Code: {$geoplugin->countryCode} <br />\n".
        // 	"In the EU?: {$geoplugin->inEU} <br />\n".
        // 	"EU VAT Rate: {$geoplugin->euVATrate} <br />\n".
        // 	"Latitude: {$geoplugin->latitude} <br />\n".
        // 	"Longitude: {$geoplugin->longitude} <br />\n".
        // 	"Radius of Accuracy (Miles): {$geoplugin->locationAccuracyRadius} <br />\n".
        // 	"Timezone: {$geoplugin->timezone}  <br />\n".
        // 	"Currency Code: {$geoplugin->currencyCode} <br />\n".
        // 	"Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
        // 	"Exchange Rate: {$geoplugin->currencyConverter} <br />\n";
        return view('home');
    }

    public function courses($cat = null)
    {
        require_once('CacheManagement.php');
        $cache = new CacheManagement();
        $courses = $cache->getcache($cat);
        $courseslst[] = array();

        foreach ($courses as $course) {
            $CourseV = new CoursesView();
            $CourseV->Name = $course['fullname'];
            // $CourseV->Name = $course['customfields'][0]['value'] ?? '';
            $CourseV->imgSrc = env('LMS_URL') . '/' . (string) $course['courseimage'];
            $CourseV->sDesc = Cookie::get('lang') == 'EN' ? $course['course_details_en'] ?? '' : $course['course_details'] ?? '';
            $CourseV->catName = (string) $course['categoryname'];
            $courseslst[] = $CourseV;
        }
        return view('courses')->with('courseslst', $courseslst);
    }

    public function switchlang(string $lang)
    {
        if (!isset($_SESSION))
            session_start();
        if ($lang === 'AR') {
            $_SESSION['lang'] = 'ar';
            //Cookie::queue(Cookie::make('lang', 'AR'));
            // app()->setLocale('ar');
            config(['app.locale' => 'ar']);
            return redirect()->back()->withCookie(cookie()->forever('lang', 'AR'));
        } else {
            $_SESSION['lang'] = 'en';
            //Cookie::queue(Cookie::make('lang', 'EN'));
            //  app()->setLocale('en');
            config(['app.locale' => 'en']);
            return redirect()->back()->withCookie(cookie()->forever('lang', 'EN'));
        }
    }

    private function checkcourseavailabilty($userid, $cid)
    {
        $LMS_URL = env('LMS_URL');
        $key = env('localops_API_key');
        $url = $LMS_URL . '/webservice/rest/server.php?wstoken=' . $key . '&wsfunction=local_ops_check_course_prereq&userid=' . $userid . '&coursesids[]=' . $cid . '&moodlewsrestformat=json';
        $ch = curl_init();
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);
        $courses = json_decode($response, true);
        return $courses;
    }
    
    public function course($name)
    {
        require_once('CacheManagement.php');
        $cache = new CacheManagement();
        $courses = $cache->getcache();
        if (!isset($_SESSION))
            session_start();
        foreach ($courses as $c) {
            if ($c['fullname'] == $name) {
                // if (isset($_SESSION['mdl_userinfo'])) {
                    //$avail = self::checkcourseavailabilty($_SESSION['mdl_userinfo']->id,$c['id']);
                    $c = array_merge((array)$c, array('avail' => self::checkcourseavailabilty($_SESSION['mdl_userinfo']->id ?? null, $c['id']), true));
                // }
                $cohort = json_decode(self::getcohorts($c['fullname']), true);
                $c = array_merge($c,(array)$cohort);
                return view('course')->with('courseObj', $c);
            }
        }
        //  return view('course');
    }
    private function getcohorts($courseName)
    {
        $LMS_URL = env('LMS_URL');
        $key = env('localops_API_key');
        $url = $LMS_URL . '/webservice/rest/server.php?wstoken=' . $key . '&wsfunction=local_ops_get_earlier_cohort&moodlewsrestformat=json';
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $options = [
            'form_params' => [
                'courseName' => $courseName
            ]
        ];
        $r = $client->post($url, $options);

        return $r->getBody();
        // curl_setopt($ch, CURLOPT_URL,$url);
        //  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        //    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
        //    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        // // Timeout in seconds
        // curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        //  $response = curl_exec($ch);
        //  curl_close($ch);
        //  return $response;
        //    $cohorts = json_decode($response,true);
        //    return $cohorts;
    }

    public function curriculum($name)
    {
        require_once('CacheManagement.php');
        $cache = new CacheManagement();
        $courses = $cache->getcache();
        $crclm = array();
        if (!isset($_SESSION))
            session_start();
        foreach ($courses as $c) {
            if ($c['fullname'] == $name) {
                if (isset($_SESSION['mdl_userinfo']))
                    $c = array_merge((array)$c, array('avail' => self::checkcourseavailabilty($_SESSION['mdl_userinfo']->id, $c['id']), true));

                $crclm[] = $c;

                foreach ($courses as $cr) {
                    if ($c['categoryid'] == $cr['categoryid'] && $cr['format'] != "singleactivity") {

                        if (isset($_SESSION['mdl_userinfo']))
                            $cr = array_merge((array)$cr, array('avail' => self::checkcourseavailabilty($_SESSION['mdl_userinfo']->id, $cr['id']), true));

                            $cohort = json_decode(self::getcohorts($cr['fullname']), true);
                            $cr = array_merge($cr,(array)$cohort);

                        $crclm[0]['courses'][] = $cr;
                    }
                }
                return view('curriculum')->with('courseObj', $crclm);
            }
        }
        //  return view('course');
    }
    public function login()
    {
                    
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            unset($_SESSION['mdl_userinfo']);
            return view('home');
        }
        if (isset($_GET['redirect'])) {
            if (!isset($_SESSION))
                session_start();
            $_SESSION['redirect'] = $_GET['redirect'];
        }
        
        if(isset($_SESSION['mdl_userinfo'])){

            return redirect(env('LMS_URL').'/my');

        }
        return view('login');
    }
}
