@if(session()->has('msg'))
	<div class="alert alert-danger">
		{{ session()->get('msg') }}
	</div>
@endif