@if(session('borrar-error'))
	
				<div class="alert alert-danger alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session('borrar-error') }}
				</div>
		
	
@endif