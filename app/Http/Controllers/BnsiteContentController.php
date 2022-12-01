<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BnsiteContent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BnsiteContentController extends Controller
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
}
