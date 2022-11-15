@extends('layouts.app')
{{ App::setLocale(session('locale')) }}
@section('content')
@if(session('warning'))
        <!--  warning show message -->
<div class="row">
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
</div>
@endif
@if(session('success'))
        <!--  successfully show message -->
<div class="row">
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
</div>
@endif
    <h3 class="page-title">@lang('messages.users_title')</h3>
    @auth
    <p>
        <a href="{{ route('user_create') }}" class="btn btn-success">@lang('messages.add_new')</a> 
    </p>
    @endauth
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('messages.list')
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped" style="width:50%">
                <thead>
                <tr>
                    <th>@lang('messages.Name')</th>
                    <th>@lang('messages.E-Mail Address')</th>
                </tr>
                </thead>
                <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr data-entry-id="{{ $user->id }}" class="">
                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='email'>{{ $user->email }}</td>
                            <td>
                               <a href="{{ route('user_edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('messages.edit')</a>
                           
                               <a href="{{ route('user_destroy',[$user->id]) }}" class="btn btn-xs btn-danger">@lang('messages.Delete')</a>
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
    </div>
@stop