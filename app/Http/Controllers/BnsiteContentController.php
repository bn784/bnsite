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
    return view('welcome');
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
        //dd($request);
        $bnsitecontent = Bnsitecontent::create($request->all());
        //dd($Bnsitecontent);
        $bnsitecontents = $Bnsitecontent::all();
        //return view('admin.roles.index', compact('roles'))->with('success', $role->title.' create successfully!');
        return redirect()->back();
    }
}
