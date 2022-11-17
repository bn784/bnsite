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
        
        <a href="" class="btn btn-xs btn-success" data-bs-toggle="modal" data-bs-target="#createModal">@lang('messages.add_new')</a>
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
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr data-entry-id="{{ $user->id }}" class="">
                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='email'>{{ $user->email }}</td>
                            <td>
                               <a href="" class="btn btn-xs btn-info" data-bs-toggle="modal" data-bs-target="#editModal">@lang('messages.edit')</a>
                                                          
                               <a href="" class="btn btn-xs btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('messages.Delete')</a>
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
<!-- Modal delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      @lang('messages.Are you sure?')
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('messages.Close')</button>
        <form method="post" action="{{ route('modals.destroy',[$user->id]) }}">
        @csrf
        <input type="hidden" name="_method" value="delete" />
        <input class="btn btn-default btn-danger" type="submit" value="Delete" />

        </form>
        
        
      </div>
    </div>
  </div>
</div>



<!-- Modal create-->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <!-- form -->
        <form method="POST" action="{{ route('modals.store') }}">
                            
                            @csrf

                            <div class="form-group row" style="height: 50px;">
                            <div class="col-md-6"> 
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
                                <label for="name_input" class="col-md-6 col-form-label text-md-right">{{ __('messages.Name') }}</label>

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
                                <label for="email_input" class="col-md-6 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

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
                                <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('messages.Password') }}</label>

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
                                <label for="password_confirmation" class="col-md-6 col-form-label text-md-right">{{ __('messages.Confirm password') }}</label>

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




<!-- Modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <!-- form -->
      <form method="POST" action="{{ route('modals_update2', $user->id) }}">
                            
                            @csrf

                            <div class="form-group row" style="height: 70px;">
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

                            <div class="form-group row" style="height: 70px;">
                                <label for="name_input" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name_input" type="text" class="form-control" name="name">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                           

                            
                           

                            <div class="form-group row" style="height: 70px;">
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

                            <div class="form-group row" style="height: 70px;">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('messages.Confirm password') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0" style="height: 70px;">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('messages.edit')
                                    </button>
                                </div>
                            </div>
                            </form>
                            <!-- end form -->
      </div>
      
    </div>
  </div>
</div>
@stop
