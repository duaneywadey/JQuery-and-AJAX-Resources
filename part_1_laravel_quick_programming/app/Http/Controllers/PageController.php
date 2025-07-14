<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Import models
use App\Models\UnsplashUser;


class PageController extends Controller
{
	public function showForm() {
        return view('showform');
    }

    public function handleForm(Request $request){
        $array['firstName'] = 'required|min:4';
        $array['middleName'] = 'required|min:5';
        $array['lastName'] = 'required|min:6';
        $validated = $request->validate($array);
        echo "<pre>";
        print_r($validated);
        echo "<pre>";
        return redirect()->route('showForm')->with('message', 'Message coming from the POST request!');
    }

    public function about($id = null) {

        // // Pure SQl
        // if ($id) {
        //     $data = DB::select("SELECT * FROM unsplash_users WHERE user_id = ?", [$id]);
        // }
        // else {
        //     $data = DB::select("SELECT * FROM unsplash_users");
        // }


        // Eloquent way
        if ($id) {
            $data = UnsplashUser::where('user_id', $id)->get();
        }
        else {
            $data = UnsplashUser::all();
        }

        return view('about', ['data' => $data]);
    }

    public function sessiontest() {

        // single value in session
        session()->put("username", "ivan");

        // multiple values in session
        $arr['name1'] = "duane";
        $arr['name2'] = "auden";
        $a['names'] = $arr;
        session()->put($a);

        // push method
        session()->push("names", "june");

        // // pull method
        // session()->pull("names");

        // // exists method to check if session var exists
        // session()->exists("names");

        // // flush method - erase all session variables
        // session()->flush(); 

        echo "<pre>";
        print_r(session()->all());
        return view('sessiontest');
    }

}
