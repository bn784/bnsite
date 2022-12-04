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
    //dd($bnsitecontents);
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
       
        $bnsitecontents = Bnsitecontent::all();
        //return view('admin.roles.index', compact('roles'))->with('success', $role->title.' create successfully!');
        return redirect()->back()->with('success',' create successfully!');;
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
}
