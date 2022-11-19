<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        return redirect()->back()->with('success', $user->name.' create successfully!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
                        
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::findOrFail($id);
        //dd($user,$request);
            if ($user->name == 'administrator') {
                return redirect()->back()->with('warning', 'Cannot edit "administrator"!');
            }
            if ($request->name == 'administrator') {
                return redirect()->back()->with('warning', 'Cannot use name "administrator"!');
            }
            //dd($user,$request);
            $user->name = $request->name;
            //$user->email = $request->email;
            $user->preferred_language = $request->preferred_language;
            $user->password = bcrypt($request->new_password);
           
            $user->save();
            return redirect()->back()->with('success', $user->email.' update successfully!');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userAuth = Auth::getUser();
        $user = User::findOrFail($id);
       
        if ($user->email == 'administrator@example.com' ) {
            return redirect()->back()->with('warning', 'Cannot delete "administrator@example.com"!');
        }
        if ($user->email == $userAuth->email ) {
            return redirect()->back()->with('warning', 'You can not remove yourself!');
        }
        $user->delete();
        $users = User::all();
        return redirect()->back()->with('success', 'delete successfully!');
        
    }
    /**
     * 
     *
     * 
     */
    public function preferred_language($lang)
    {
        $user = \Auth::user();
        $user ->preferred_language = $lang ;
        $user->save();
       
        return redirect()->back();
    }
}