<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bnsitecontent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BnsitecontentController extends Controller
{
    public function index()
  {
    $bnsitecontents = Bnsitecontent::all();
    $show_on_site = 'welcome';
    session(['show_on_site' => $show_on_site]);
    return view('welcome', compact('bnsitecontents'));
  }
  public function setlocale($locale)
  {
    session(['locale' => $locale]);
    return redirect()->back();
  }
  public function store(Request $request)
    {
      //dd($request);
        $this->validate($request, [
            'title' => [ 'string', 'max:255',  'unique:bnsitecontents'],
            'content_en' => [ 'string', 'max:255'],
            'content_ru' => [ 'string', 'max:255'],
            'content_ua' => [ 'string', 'max:255'],
        ]);
       
        $bnsitecontent = Bnsitecontent::create($request->all());
       
        //$bnsitecontents = Bnsitecontent::all();
        //return view('admin.roles.index', compact('roles'))->with('success', $role->title.' create successfully!');
        return redirect()->back()->with('success','create successfully!');
    }
    public function update(Request $request)
    {
       
        $this->validate($request, [
            'content_en' => [ 'string', 'max:255'],
            'content_ru' => [ 'string', 'max:255'],
            'content_ua' => [ 'string', 'max:255'],
        ]);
        
        $bnsitecontent = Bnsitecontent::where('title', $request->title)->firstOrFail();
        $bnsitecontent->title = $request->title;
        $bnsitecontent->content_en = $request->content_en; 
        $bnsitecontent->content_ru = $request->content_ru;
        $bnsitecontent->content_ua = $request->content_ua;
        $bnsitecontent->save();
        
        return redirect()->back()->with('success', 'update successfully!');
    }
    public function site_management()
    {
        if (! Gate::allows('admin_access')) {
            return abort(401);
        }
        $bnsitecontents = Bnsitecontent::all();
        return view('admin.users.site_management', compact('bnsitecontents'));
    }
    public function edit($id)
    {
        if (! Gate::allows('admin_access')) {
            return abort(401);
        }
        $bnsitecontents = Bnsitecontent::findOrFail($id);
        //dd($bnsitecontents);
        return view('admin.users.edit_site_management', compact('bnsitecontents'));
    }
    public function show_on_site($id)
    {
        if (! Gate::allows('admin_access')) {
            return abort(401);
        }
        $show_on_site = Bnsitecontent::findOrFail($id)->title;
        session(['show_on_site' => $show_on_site]);
        $bnsitecontents = Bnsitecontent::all();
        return view('welcome', compact('bnsitecontents'));
    }
}
