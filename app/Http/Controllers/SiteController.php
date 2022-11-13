<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function setlocale($locale)
    {
       
      session(['locale' => $locale]);
      return redirect()->back();
    }
}
