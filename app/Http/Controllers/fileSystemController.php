<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;

use Illuminate\Http\Request;

class fileSystemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function store()
    {
        /*$this->middleware('auth');*/
        return ('Profile.Profile');
    }
}
