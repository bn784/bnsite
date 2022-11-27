@extends('layouts.app')
{{ App::setLocale(Auth::user()->preferred_language) }}
@section('content')
<?php //dd($users, $roles); ?>
<div class="container-fluid">
    
    <div class="row" style="height: 70px;">
    @if(session('warning'))
     <!--  warning show message -->
    <div class="row">
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
    </div>
    @endif
    <!--  successfully show message -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    </div>
    <div class="row">
    <div class="col-2"></div>
	<div class="col-5"><h3 class="page-title">@lang('messages.email'): {{ $users->email }}</h3></div>
    <div class="col-5"></div>
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
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('messages.list')
        </div>
        <div class="panel-body table-responsive">
    </div>
    <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('messages.Name')</th>
                    <th>@lang('messages.E-Mail Address')</th>
                    <th>@lang('messages.preferred_language')</th>
                    <th>@lang('messages.Role')</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
               
                        <tr data-entry-id="{{ $users->id }}" class="">
                            <td field-key='name'>{{ $users->name }}</td>
                            <td field-key='email'>{{ $users->email }}</td>
                            <td field-key='preferred_language'>{{ $users->preferred_language }}</td>
                            <td field-key='role'>{{ $roles }}</td>
                            <td>
                               <a href="{{ route('users.edit',[$users->id]) }}" class="btn btn-xs btn-info">@lang('messages.edit')</a>
                            </td>
                        </tr>
                   
                 
                </tbody>
            </table>
    </div>
    <div class="col-5"></div>
    </div>
   
</div>
@stop