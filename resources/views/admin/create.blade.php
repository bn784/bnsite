@extends('layouts.app')
{{ App::setLocale(Auth::user()->preferred_language) }}
@section('content')
<div class="container-fluid"  style="background-color:; height: 95vh;">
    
    <div class="row" style="height: 70px;">
   @if(session('warning'))
            <!-- If password successfully show message -->
    <div class="row">
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    </div>
    @endif
    @if(session('success'))
            <!-- If password successfully show message -->
    <div class="row">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
    @endif
    </div>
    <div class="row">
    <div class="col-1"></div>
	<div class="col-7">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">@lang('messages.Creating user')</div>

                        <div class="card-body">
                             <!-- form -->
                            <form method="POST" action="{{ route('user_store') }}">
                            
                            @csrf

                            <div class="form-group row" style="height: 50px;">
                            <div class="col-md-4"> 
                            <label for="select_preferred_language_create">{{ __('messages.preferred_language')}}</label>
                            </div>    
                                
                                <div class="col-md-6">
                                <select id="select_preferred_language_create" name="preferred_language" class="form-control">
                                    <option value="RU">{{ __('messages.Russian')}}</option>
                                    <option value="UA" selected>@lang('messages.Ukrainian')</option>
                                    <option value="EN">@lang('messages.English')</option>
  
                                </select> 
                                </div>
                            </div>

                            <div class="form-group row" style="height: 50px;">
                                <label for="name_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name_input" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row" style="height: 50px;">
                                <label for="email_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email_input" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            
                           

                            <div class="form-group row" style="height: 50px;">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row" style="height: 50px;">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('messages.Confirm password') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0" style="height: 50px;">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('messages.create')
                                    </button>
                                </div>
                            </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
</div>
    </div>
    <div class="col-4"></div>
    </div>
    <div class="row">
    <div class="col-2"></div>
	<div class="col-5">
   
    </div>
    <div class="col-5"></div>
    </div>
    
    <div class="row">
    <div class="col-2"></div>
	<div class="col-5">
    
    <div class="col-5"></div>
    </div>
   
</div>



@stop

