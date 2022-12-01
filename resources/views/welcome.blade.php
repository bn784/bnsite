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
     <div class="col row1col2 change">
      row1col2
     </div>
    </div>
    <div id="row2" class="row row2 rowbnsite">
    
	row2
    </div>
    <div id="row3" class="row row3 rowbnsite">
	row3
    </div>
    <div id="row4" class="row row4 rowbnsite">
	row4
    </div>
    <div id="row5" class="row row5 rowbnsite">
	row5
    </div>
    <div id="row6" class="row row6 rowbnsite">
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
            <input id="title_input" type="hidden" name="title" value="">

               

                
                <div class="form-group row" style="height: 50px;">
                        <label for="en_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.en_input') }}</label>
                    <div class="col-md-8">
                        <input id="current_value_input" type="text" class="form-control{{ $errors->has('en_input') ? ' is-invalid' : '' }}" name="en_input">
                        @if ($errors->has('en_input'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('en_input') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row" style="height: 50px;">
                        <label for="ru_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.ru_input') }}</label>
                    <div class="col-md-8">
                        <input id="ru_input" type="text" class="form-control{{ $errors->has('ru_input') ? ' is-invalid' : '' }}" name="ru_input">
                        @if ($errors->has('ru_input'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ru_input') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row" style="height: 50px;">
                        <label for="ua_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.ua_input') }}</label>
                    <div class="col-md-8">
                        <input id="ua_input" type="text" class="form-control{{ $errors->has('ua_input') ? ' is-invalid' : '' }}" name="ua_input">
                        @if ($errors->has('ua_input'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ua_input') }}</strong>
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

