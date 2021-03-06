<?php

namespace App\Http\Controllers;


use App\Models\Tracker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;

class TrackerController extends Controller
{
    
    public function showUserCodes()
    {
        $tracker = Auth::user()->tracker;      
        return view("dashboard", compact('tracker'));
    }

    public function showSingleCode($codice)
    {        
        $trackers= Tracker::all();
        $tracker = $trackers->where('codice', $codice)->first();

        return view("info", ['tracker' => $tracker]);
    }

    public function insertCode(Request $request)
    {
        $input = $request->all();

        $checkTracker = Tracker::where('codice', $request->codice)->first();

        if($checkTracker)
        {
            return redirect('/dashboard')->with('error', 'Codice già inserito');
        }else{
            $tracker = new Tracker($input);
            $tracker->user()->associate( Auth::user());
            $tracker->save();
            return redirect('/dashboard')->with('success', 'Codice aggiunto correttamente!');
        }
    }

    public function cron(){
        Artisan::call('request:api');
    }

}
