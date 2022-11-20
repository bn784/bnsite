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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">@lang('messages.Role'): &nbsp; {{$roles->title}}</div>
                            <div class="card-body">
                                 <!-- form -->
                                <form method="POST" action="{{ route('roles.update', $roles->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH" />
                                    <div class="form-group row" style="">
                                        <div class="col-md-8"> 
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="management_access" name="management_access" 
                                                     @if($roles->management_access === 1) checked @endif >
                                                <label class="form-check-label" for="management_access">@lang('messages.admin access')</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="user_access" name="user_access" 
                                                     @if($roles->user_access === 1) checked @endif >
                                                <label class="form-check-label" for="user_access">@lang('messages.user access')</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="user_create" name="user_create" 
                                                     @if($roles->management_access === 1) checked @endif >
                                                <label class="form-check-label" for="user_create">@lang('messages.user create')</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="user_edit" name="user_edit" 
                                                     @if($roles->management_access === 1) checked @endif >
                                                <label class="form-check-label" for="user_edit">@lang('messages.user edit')</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="user_view" name="user_view" 
                                                     @if($roles->management_access === 1) checked @endif >
                                                <label class="form-check-label" for="user_view">@lang('messages.user view')</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="user_delete" name="user_delete" 
                                                     @if($roles->management_access === 1) checked @endif >
                                                <label class="form-check-label" for="user_delete">@lang('messages.user delete')</label>
                                            </div>
                                        </div>    
                                        <div class="col-md-4"></div></div>
                                    </div>
                                    


                                    <div class="form-group row mb-0" style="height: 70px;">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">@lang('messages.edit')</button>
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
    <div class="col-6"></div>
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