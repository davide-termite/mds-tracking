<?php

namespace App\Http\Controllers;


use App\Models\Tracker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackerController extends Controller
{
    public function showAll()
    {
        
        $tracker = DB::table('tracker')->get();
        return view("dashboard", compact('tracker'));

    }

    public function showSingle($codice)
    {
        $trackers = DB::table('tracker')->get();
        $tracker = $trackers->find($codice);

        return view("info");
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $existing_trackers = DB::table('tracker')->get();
        $tracker = new Tracker($input);
        $tracker->user()->associate( Auth::user());
        
        foreach ($existing_trackers as $e_trackers) {

            if ($input['codice'] === $e_trackers->codice) {

                return redirect()->back()->with('error', 'Codice già inserito');
            }
            else {

                $tracker->save();

                return redirect()->route('dashboard-show')->with('success', 'Codice aggiunto correttamente!');
            }
        }
        

    }
}
