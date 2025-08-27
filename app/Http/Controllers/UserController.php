<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use Hash,Auth,DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authUser = Auth::user();
        if($authUser->role_id == 1){
            $users = User::with('company')->where('role_id','<>',1)->orderBy('id','desc')->paginate(10);
        }else{
            $users = User::with('company')->where('role_id','<>',1)->where('company_id',Auth::user()->company_id)->orderBy('id','desc')->paginate(10);
        }
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = DB::table('roles')->where('id','<>',1)->pluck('name','id')->toArray();
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
        ]);

        $authUser = Auth::user();

        if ($authUser->role_id === 1 || $authUser->role_id == 3) {
            abort(403, 'You dont have permission to create user.');
        }
        
        $admin = auth()->user();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role, // admin or member
            'company_id' => $admin->company_id,
            'password' => Hash::make('123456')
        ]);

        return redirect()->route('users.index')->with('success', 'User created and invited successfully!');
    }
}
