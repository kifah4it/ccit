<?php
namespace App\Http\Controllers\Api\v1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\User;

class SyncCoursesController extends Controller
{
public function index(){
    return User::all();
}
}