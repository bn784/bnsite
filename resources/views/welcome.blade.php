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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form method="POST" action="{{ route('BnsiteContents.store') }}">
            @csrf

               

                <div class="form-group row" style="height: 50px;">
                        <label for="name_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.title') }}</label>
                    <div class="col-md-8">
                        <input id="title_input" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row" style="height: 50px;">
                        <label for="name_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.title') }}</label>
                    <div class="col-md-8">
                        <input id="title_input" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row" style="height: 50px;">
                        <label for="name_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.title') }}</label>
                    <div class="col-md-8">
                        <input id="title_input" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row" style="height: 50px;">
                        <label for="name_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.title') }}</label>
                    <div class="col-md-8">
                        <input id="title_input" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
        </form>
        <!-- end form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.Close') }}</button>
        <button type="button" class="btn btn-primary">{{ __('messages.Save changes') }}</button>
      </div>
    </div>
  </div>
</div>
@endsection

