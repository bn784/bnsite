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