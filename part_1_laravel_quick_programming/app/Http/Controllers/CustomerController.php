<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// Import models
use App\Models\Customer;


class CustomerController extends Controller
{
    public function addcustomer() {
        if (Auth::check()) {
            // returns an array
            // $customers = Customer::all();
            // $customers = DB::table('customers')->where('id',5)->get();
            // $customers = DB::table('customers')->where('name','john')->get();
            $customers = DB::table('customers')->get();
            return view("addcustomer", ['customers'=>$customers]);
        }
        else {
            return redirect()->route('login');
        }

    }

    public function insertcustomer(Request $request) {

        // Insert new customer
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|numeric'
        ]);

        // $cus = new Customer();
        // $cus->name = $request->name;
        // $cus->email = $request->email;
        // $cus->age = $request->age;
        // $cus->save();

        DB::table('customers')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age
        ]);

        return redirect()->route('addcustomer');
    }

    public function deletecustomer($id) {
        // $cus = new Customer();
        // $data = $cus->find($id);
        // $data->delete();

        DB::table('customers')->where('id', $id)->delete();
        return redirect()->route('addcustomer');
    }

    public function editcustomer($id) {
        // $cus = new Customer();
        // $data = $cus->find($id);

        $data = DB::table('customers')->find($id);
        return view('editcustomer',['data'=>$data]);
    }

    public function updatecustomer(Request $request) {

        // Update customer
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|numeric'
        ]);

        // $cus = new Customer();
        // $data = $cus->find($request->id);

        // if ($data) {
        //     $data->name = $request->name;
        //     $data->email = $request->email;
        //     $data->age = $request->age;
        //     $data->save();
        // }

        DB::table('customers')->where('id', $request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'age'=>$request->age
        ]);

        return redirect()->route('addcustomer');
    }
}
