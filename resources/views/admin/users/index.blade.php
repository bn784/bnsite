@extends('layouts.app')
{{ App::setLocale(Auth::user()->preferred_language) }}
@section('content')
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
	<div class="col-5"><h3 class="page-title">@lang('messages.users_title')</h3></div>
    <div class="col-5"></div>
    </div>
    <div class="row">
    <div class="col-2"></div>
	<div class="col-5">
    @auth
    <p>
        <a href="{{ route('users.create') }}" class="btn btn-success">@lang('messages.add_new')</a> 
    </p>
    @endauth
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
                    <th>@lang('messages.Role')</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr data-entry-id="{{ $user->id }}" class="">
                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='email'>{{ $user->email }}</td>
                            <td field-key='role'>{{ $user->roles->title}}</td>
                            <td>
                               <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('messages.edit')</a>
                              
                               {!! Form::open(array(
                                                                        'style' => 'display: inline-block;',
                                                                        'method' => 'DELETE',
                                                                        'onsubmit' => "return confirm('".trans("messages.Are you sure?")."');",
                                                                        'route' => ['users.destroy', $user->id])) !!}
                                {!! Form::submit(trans('messages.Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">@lang('messages.no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
    </div>
    <div class="col-5"></div>
    </div>
   
</div>

@stop
