<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\User;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function index(){
        return view('/reception');
    }
}
