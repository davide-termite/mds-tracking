<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tracker;
use App\Mail\PaccoConsegnato;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ReceptionController extends Controller
{
    public function index(){
        $trackers = Tracker::all();
        return view("reception", compact('trackers'));
    }

    public function status($codice){
        
        $trackers= Tracker::all();
        $tracker = $trackers->where('codice', $codice)->first();

        $users= User::all();
        $user = $users->where('id', $tracker->user_id)->first();
        
        $response = Http::get('https://ws001.selfivery.com/api/test/spedizione/' . $tracker->codice);

        $stato = $response['stato'];

        return view("reception-info", ['tracker' => $tracker, 'stato' => $stato, 'user' => $user]);
    }

    public function sendMail($codice ,$id){

        $user = User::find($id);
        
        $trackers = Tracker::all();
        $tracker = $trackers->where('codice', $codice)->first();
        
        if ($tracker->mail_sent === 1) {
            
            return redirect('/reception')->with('error', 'Una Mail è stata già inviata in precedenza!');

        } else {

            DB::table('tracker')->where('codice', '=', $codice)->update(['mail_sent' => '1', 'stato' => 'Pronto per la consegna']);

            Mail::to($user->email)->send(new PaccoConsegnato($id, $codice));

            return redirect('/reception')->with('success', 'Mail inviata correttamente!');
        }
        

    }

}
