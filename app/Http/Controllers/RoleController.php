<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $roles = Role::all();
        $users = User::all();
        return view('admin.roles.index', compact('roles', 'users'));
        //return view('admin.roles.index')->with(compact('users'))->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255','unique:roles']
        ]);
        $role = Role::create($request->all());
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'))->with('success', $role->title.' create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('role_id', $id)->get();

        $roles = Role::findOrFail($id);
        

       
        return view('admin.roles.show', compact('roles', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $roles = Role::findOrFail($id);
        
        
        return view('admin.roles.edit', compact('roles'));
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
        
        //dd($users, $roles);
        $role = Role::findOrFail($id);
        if ($role->title == 'administrator' ) {
            return redirect()->route('roles.index')->with('warning', 'Cannot update administrator!');
        }
        if ($role->title == 'user' ) {
            return redirect()->route('roles.index')->with('warning', 'Cannot update user!');
        }

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', $role->title.' update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $role = Role::findOrFail($id);

        if ($role->title == 'administrator' ) {
            return redirect()->back()->with('warning', 'Cannot delete role "administrator"!');
        }
        if ($role->title == 'user' ) {
            return redirect()->back()->with('warning', 'Cannot delete role "user"!');
        }
        $role->delete();
        return redirect()->route('roles.index')->with('success', $role->title.' delete successfully!');
    }
}
