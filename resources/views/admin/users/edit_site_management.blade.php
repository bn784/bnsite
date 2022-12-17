@extends('layouts.app')
{{ App::setLocale(Auth::user()->preferred_language) }}
@section('content')
<div class="container-fluid"  style="background-color:cyan; height: 95vh;">
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
                        <div class="card-header">@lang('messages.Editing content'): &nbsp; </div>
                        <div class="card-body">
                            <!-- form name-->
                            <form method="POST" action="{{ route('bnsitecontents.update') }}">
                                @csrf
                                <input id="name_input_content" type="hidden" name="title" value="{{$bnsitecontents->title}}">
                                <div class="form-group row" style="height: 70px;">
                                    <div class="col-md-4"> 
                                        <label for="name_input_content_en">{{ __('messages.content_en')}}</label>
                                    </div>    
                                    <div class="col-md-4">
                                        <input id="name_input_content" type="text" name="content_en" class="form-control{{ $errors->has('content_en') ? ' is-invalid' : '' }}" 
                                        value="{{$bnsitecontents->content_en}}">
                                        @if ($errors->has('content_en'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content_en') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        @lang('messages.edit')
                                    </div>
                                </div>
                            </form>  
                          
                               
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