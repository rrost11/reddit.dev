<div class="text-center">
	@if(session()->has('SUCCESS_MESSAGE'))
		<div class="alert alert-success">
			<p>
				{{session('SUCCESS_MESSAGE')}}	
			</p>
		</div>
	@endif
</div>

<div class="text-center">
	@if(session()->has('ERROR_MESSAGE'))
		<div class="alert alert-danger">
			<p>
				{{session('ERROR_MESSAGE')}}	
			</p>
		</div>
	@endif
</div>