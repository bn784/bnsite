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
                        <div class="card-header">@lang('messages.Editing user'): &nbsp; {{ $users->email }}</div>
                        <div class="card-body">
                            <!-- form preferred_languag-->
                            <form method="POST" action="{{ route('users.update_preferred_language', $users->id) }}">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH" />
                                <div class="form-group row" style="height: 70px;">
                                    <div class="col-md-4"> 
                                        <label for="select_preferred_language_create">{{ __('messages.preferred_language')}}</label>
                                    </div>    
                                    <div class="col-md-4">
                                        <select id="select_preferred_language_create" name="preferred_language" class="form-control">
                                            <option selected value="{{$users->preferred_language}}">{{$users->preferred_language}}</option>
                                            <option value="RU">{{ __('messages.Russian')}}</option>
                                            <option value="UA">@lang('messages.Ukrainian')</option>
                                            <option value="EN">@lang('messages.English')</option>
                                        </select> 
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        @lang('messages.edit')
                                    </div>
                                </div>
                            </form>
                            <!-- form name-->
                            <form method="POST" action="{{ route('users.update_name', $users->id) }}">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH" />
                                <div class="form-group row" style="height: 70px;">
                                    <div class="col-md-4"> 
                                        <label for="name_input">{{ __('messages.Name')}}</label>
                                    </div>    
                                    <div class="col-md-4">
                                        <input id="name_input" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $users->name }}">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        @lang('messages.edit')
                                    </div>
                                </div>
                            </form>
                            <!-- form role-->
                            <form method="POST" action="{{ route('users.update_role', $users->id) }}">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH" />
                                <div class="form-group row" style="height: 70px;">
                                    <div class="col-md-4"> 
                                        <label for="select_role_edit">{{ __('messages.Role')}}</label>
                                    </div>    
                                    <div class="col-md-4">
                                        <select id="select_role_edit" name="role_id" class="form-control">
                                            <option selected value="{{$users->roles->id}}">{{$users->roles->title}}</option>
                                                @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->title}}</option>
                                                @endforeach
                                        </select> 
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        @lang('messages.edit')
                                    </div>
                                </div>
                            </form>
                            <!-- form new_password-->
                            <form method="POST" action="{{ route('users.update', $users->id) }}">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH" />
                                <div class="form-group row" style="height: 70px;">
                                    <div class="col-md-4"> 
                                        <label for="new_password_input">{{ __('messages.New password')}}</label>
                                    </div>    
                                    <div class="col-md-5">
                                        <input id="new_password_input" type="text" name="new_password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('new_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row" style="height: 70px;">
                                    <div class="col-md-4"> 
                                        <label for="new_password_confirmation_input">{{ __('messages.Confirm new password')}}</label>
                                    </div>    
                                    <div class="col-md-4">
                                        <input id="new_password_confirmation_input" type="text" name="new_password_confirmation" 
                                        class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('new_password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        @lang('messages.Change password')
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