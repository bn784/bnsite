@extends('layouts.app')
{{ App::setLocale(session('locale')) }}
@section('content')
	<div class="change_password">
		@if(session('success'))
				<!-- If password successfully show message -->
		<div class="row">
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		</div>
		@else
		<div class="container change_password_container">
			<div class="row justify-content-center bn">
				<div class="col-md-9 bn2">
					
				</div>
			</div>
		</div>
	</div>

	@endif
@stop

