@extends('layouts.main')
{{ App::setLocale(session('locale')) }}
@section('content')
<div class="container-fluid">
    <div id="row1" class="row row1" style="background-color:blue;">
     <div class="col row1col1" style="background-color:blue;">
     row1col1
     </div>
     <div class="col row1col2"  style="background-color:blue;">
      row1col2
     </div>
    </div>
    <div id="row2" class="row row2"  style="background-color:red;">
	row2
    </div>
    <div id="row3" class="row row3"  style="background-color:grey;">
	row3
    </div>
    <div id="row4" class="row row4"  style="background-color:green;">
	row4
    </div>
    <div id="row5" class="row row5"  style="background-color:brown;">
	row5
    </div>
    <div id="row6" class="row row6"  style="background-color:pink;">
	row6
    </div>
</div>
@endsection

