<?php

namespace App\Http\Controllers;

use App\Models\user_regs;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserRegistered;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;




class user_reg_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userExists = DB::table('user_reg')->where('user_name', $request->user_name)->exists();
        if ($userExists) {
            return response()->json([
                'status' => 'error',
                'message' => 'User already exists.'
            ]);
        }
        $request->validate([
            'full_name'     => 'required',
            'user_name'     => 'required|unique:user_reg',
            'birthdate'     => 'required',
            'phone'         => 'required|min:11',
            'address'       => 'required',
            'password'      => 'required|min:8|regex:/[@$!%*#?&]/|regex:/[0-9]/|',
            'confirm_password' => 'required_with:password|same:password|min:8',
            'email'         => 'required|email',
            'user_image'    => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
    
        $file_name = time() . '.' . request()->user_image->getClientOriginalExtension();
        request()->user_image->move(public_path('images'), $file_name);
       
        
        DB::table('user_reg')->insert([
            'full_name' => $request->full_name,
            'user_name' => $request->user_name,
            'birthdate' => $request->birthdate,
            'phone'     => $request->phone,
            'address'   => $request->address,
            'password'  => $request->password,
            'confirm_password'  => $request->password,
            'email'     => $request->email,
            'user_image'=> $file_name,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        
        Mail::to('hagar.hs13@gmail.com')->send(new NewUserRegistered($request->full_name));

        return response()->json([
            'status' => 'success',
            'message' => 'User Added successfully.'
        ]);

    }


  
    /**
     * Display the specified resource.
     */
    public function show(user_regs $user_regs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user_regs $user_regs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user_regs $user_regs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user_regs $user_regs)
    {
        //
    }
}