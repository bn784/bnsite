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
     <div class="col row1col2">
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
        <form id="formModal" method="post" action="{{ route('bnsitecontents.store') }}">
            @csrf
            <input id="title_input" type="hidden" name="title" value="title">

               

                
                <div class="form-group row" style="height: 70px;">
                        <label for="content_en" class="col-md-4 col-form-label text-md-right">{{ __('messages.content_en') }}</label>
                    <div class="col-md-8">
                        <input id="content_en_input" type="text" class="form-control{{ $errors->has('content_en') ? ' is-invalid' : '' }}" name="content_en">
                        @if ($errors->has('content_en'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content_en') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row" style="height: 70px;">
                        <label for="content_ru" class="col-md-4 col-form-label text-md-right">{{ __('messages.content_ru') }}</label>
                    <div class="col-md-8">
                        <input id="content_ru" type="text" class="form-control{{ $errors->has('content_ru') ? ' is-invalid' : '' }}" name="content_ru">
                        @if ($errors->has('content_ru'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content_ru') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row" style="height: 70px;">
                        <label for="content_ua" class="col-md-4 col-form-label text-md-right">{{ __('messages.content_ua') }}</label>
                    <div class="col-md-8">
                        <input id="content_ua" type="text" class="form-control{{ $errors->has('content_ua') ? ' is-invalid' : '' }}" name="content_ua">
                        @if ($errors->has('content_ua'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content_ua') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('messages.Save changes') }}</button>
                </div>

        </form>
        <!-- end form -->
      </div>
     
    </div>
  </div>
</div>
@endsection

