<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if (! Gate::allows('user_access')) {
        //    return abort(401);
        }
        $users = User::all();
        dd($users);

        return view('admin.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }

       
        return view('admin.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($request->name == 'administrator') {
            return redirect()->back()->with('warning', 'Cannot create name "administrator"!');
        }
        $user = new User();
        $user->preferred_language = $request->preferred_language;
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.index')->with('success', $user->name.' create successfully!');
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
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user = User::findOrFail($id);
        if (Hash::check($request->get('password'), $user->password)) {
            if (($user->role_id == 1) && ($user->name == 'administrator') ) {
                return redirect()->route('admin.index')->with('warning', 'Cannot edit "administrator"!');
            }
            if ($request->name == 'administrator' ) {
                return redirect()->back()->with('warning', 'Cannot use name "administrator"!');
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->save();
            return redirect()->route('admin.index')->with('success', $user->name.' update successfully!');
        }else{
            return redirect()->back()->with('warning', 'Wrong password!');
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
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }

        $user = User::findOrFail($id);

        if ($user->email == 'administrator@example.com' ) {
            return redirect()->back()->with('warning', 'Cannot delete "administrator@example.com"!');
        }

        $user->delete();

        return redirect()->route('admin.index')->with('success', $user->name.' delete successfully!');
    }
    /**
     * 
     *
     * 
     */
    public function preferred_language($lang)
    {
        //$user = \Auth::user();
        //$user ->preferred_language = $lang ;
        //$user->save();
        session(['locale' => $lang]);

        return redirect()->back();
    }
}
