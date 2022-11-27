@extends('layouts.main')
@auth
{{ App::setLocale(Auth::user()->preferred_language) }}
@else
@if (session('locale'))
{{ App::setLocale(session('locale')) }}
@else
{{ App::setLocale('UA') }}
@endif
@endauth

@section('content')

<div class="container-fluid">
    <div id="row1" class="row row1 rowbnsite">
     <div class="col row1col1">
     row1col1
     </div>
     <div class="col row1col2 bnsiteChange">
      row1col2
     </div>
    </div>
    <div id="row2" class="row row2 rowbnsite bnsiteChange">
    
	row2
    </div>
    <div id="row3" class="row row3 rowbnsite bnsiteChange">
	row3
    </div>
    <div id="row4" class="row row4 rowbnsite bnsiteChange">
	row4
    </div>
    <div id="row5" class="row row5 rowbnsite bnsiteChange">
	row5
    </div>
    <div id="row6" class="row row6 rowbnsite bnsiteChange">
	row6
    </div>
</div>

@endsection

