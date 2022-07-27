<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendKontaktRequest;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function kontakt(string $country = 'de') {
        $countryList = [
            'de',
            'ch',
            'at',
            'en'
        ];
        // dd(compact('country', 'countryList')) // dd = dump and die


        return view('kontakt', compact('country', 'countryList'));

        return $country;
    }

    public function index() {
        $users = [
            'Max',
            'Peter',
            'Hans'
        ];


        return view('test', [
            'name' => '<div style="color:red;"> Stefan </div>',
            'age' => 25,
            'users' => $users
        ]);
    }

    public function send(SendKontaktRequest $request) {
        // dd($request);
        // dd($request->all);
        // dd($request->name);
        // echo 'Hallo, ' .$request->name . '<br>';

        // übergit alle Felder direkt, mit ->all() werden alle übergeben, auch die vom nutzer "illigal" angegebenen
        // ContactRequest brauch noch protected $fillable = [ oder protected $guarded
        $contactRequest = new ContactRequest($request->validated());
        /* $contactRequest = new ContactRequest();
        $contactRequest->name = $request->name;
        $contactRequest->email = $request->email;
        $contactRequest->message = $request->message; */


        $contactRequest->save();



        return redirect()->back()->with('message', 'Formular erfolgreich abgesendet!');
    }
}
