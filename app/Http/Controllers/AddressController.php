<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::find(Auth::id());
        $address=Address::all()->except($user->address);
        return view('address.index')->withAddress($address);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'address_line_1'=>'required|string|max:60',
            'address_line_2'=>'max:60',
            'town'=>'required|string|max:255',
            'county'=>'max:255',
            'country'=>'required|string|max:255',
            'post_code'=>'required|string|max:255',
            'from_date'=>'required|string|date|max:255',
            'until_date'=>'required|string|date|max:255',

        ]);
        if(strlen($request->address_line_1)+strlen($request->address_line_2)>60){
            Session::flash('message','Total length of the address can not be more than 60!');
            return redirect()->back();
        }

        $dob=Carbon::parse(Auth::user()->dob);
        $from_date=Carbon::parse($request->from_date);
        $until_date=Carbon::parse($request->until_date);


        if($from_date->between($dob,$until_date)){
            $address=new Address();
            $address->user_id=Auth::id();
            $address->address_line_1=$request->address_line_1;
            $address->address_line_2="".$request->address_line_2;
            $address->town=$request->town;
            $address->county="".$request->county;
            $address->country=$request->country;
            $address->post_code=$request->post_code;
            $address->from_date=$from_date;
            $address->until_date=$until_date;

            $address->save();

            $user=User::find(Auth::id());
            $user->address=$address->id;
            $user->save();

            Session::flash('message','New address successfully added!');
            return redirect()->back();
        }else{
            Session::flash('message','From date must be between dob and untill date!');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $address=Address::find($user->address);
        return view('address.show')->withAddress($address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $address=Address::find($user->address);
        return view('address.edit')->withAddress($address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'address_line_1'=>'required|string|max:60',
            'address_line_2'=>'max:60',
            'town'=>'required|string|max:255',
            'county'=>'max:255',
            'country'=>'required|string|max:255',
            'post_code'=>'required|string|max:10',
            'from_date'=>'required|string|date|max:255',
            'until_date'=>'required|string|date|max:255',

        ]);

        if(strlen($request->address_line_1)+strlen($request->address_line_2)>60){
            Session::flash('message','Total length of the address can not be more than 60!');
            return redirect()->back();
        }

        $dob=Carbon::parse(Auth::user()->dob);
        $from_date=Carbon::parse($request->from_date);
        $until_date=Carbon::parse($request->until_date);


        if($from_date->between($dob,$until_date)){
            $user=User::find($id);
            $address=Address::find($user->address);
            $address->user_id=Auth::id();
            $address->address_line_1=$request->address_line_1;
            $address->address_line_2="".$request->address_line_2;
            $address->town=$request->town;
            $address->county="".$request->county;
            $address->country=$request->country;
            $address->post_code=$request->post_code;
            $address->from_date=$from_date;
            $address->until_date=$until_date;

            $address->save();

            $user=User::find(Auth::id());
            $user->address=$address->id;
            $user->save();

            Session::flash('message','New address successfully updated!');
            return redirect()->back();
        }else{
            Session::flash('message','From date must be between dob and untill date!');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address=Address::find($id);
        $address->delete();
        Session::flash('message','Address successfully deleted!');
        return redirect()->route('address.index');
    }
}
