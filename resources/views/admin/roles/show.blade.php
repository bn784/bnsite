@extends('layouts.app')
{{ App::setLocale(Auth::user()->preferred_language) }}
@section('content')
    <h3 class="page-title">@lang('messages.roles.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('messages.view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('messages.fields.title')</th>
                            <td field-key='title'>{{ $role->title }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="users">
    <table class="table table-bordered table-striped dt-select ">
    <thead>
    <tr>
        <th>@lang('messages.users.fields.name')</th>
        <th>@lang('messages.users.fields.email')</th>
        <th>@lang('messages.users.fields.role')</th>
        <th>&nbsp;</th>

    </tr>
    </thead>

    <tbody>
        @if (count($users) > 0)
            @foreach ($users as $user)
                <tr data-entry-id="{{ $user->id }}">
                    <td field-key='name'>{{ $user->name }}</td>
                    <td field-key='email'>{{ $user->email }}</td>
                    <td field-key='role'></td>
                    <td>
                       
                        <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('messages.view')</a>
                       
                        <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('messages.edit')</a>
                        
                        {!! Form::open(array(
                                                                'style' => 'display: inline-block;',
                                                                'method' => 'DELETE',
                                                                'onsubmit' => "return confirm('".trans("messages.are_you_sure")."');",
                                                                'route' => ['users.destroy', $user->id])) !!}
                        {!! Form::submit(trans('messages.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('roles.index') }}" class="btn btn-default">@lang('messages.back_to_list')</a>
        </div>
    </div>
@stop


