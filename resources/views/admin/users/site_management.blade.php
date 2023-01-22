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
	<div class="col-5"><h3 class="page-title">@lang('messages.content')</h3></div>
    <div class="col-5"></div>
    </div>
    <div class="row">
    <div class="col-2"></div>
	<div class="col-5"></div>
    <div class="col-5"></div>
    </div>
    
    <div class="row">
        <div class="col-2"></div>
	    <div class="col-auto">
            <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.list')</div>
            <div class="panel-body table-responsive"></div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('messages.title')</th>
                    <th>@lang('messages.content_en')</th>
                    <th>@lang('messages.content_ru')</th>
                    <th>@lang('messages.content_ua')</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @if (count($bnsitecontents) > 0)
                    @foreach ($bnsitecontents as $bnsitecontent)
                        <tr data-entry-id="{{ $bnsitecontent->id }}" class="">
                            <td field-key='title'>{{ $bnsitecontent->title }}</td>
                            <td field-key='content_en'>{{ $bnsitecontent->content_en }}</td>
                            <td field-key='content_ru'>{{ $bnsitecontent->content_ru}}</td>
                            <td field-key='content_ua'>{{ $bnsitecontent->content_ua}}</td>
                            <td>
                               <a href="{{ route('bnsitecontents.show_on_site',[$bnsitecontent->id]) }}" class="btn btn-xs btn-primary">@lang('messages.Show on site')</a>
                               <a href="{{ route('bnsitecontents.edit',[$bnsitecontent->id]) }}" class="btn btn-xs btn-info">@lang('messages.edit')</a>
                              
                               
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
        <div class="col"></div>
    </div>
</div>

@stop
