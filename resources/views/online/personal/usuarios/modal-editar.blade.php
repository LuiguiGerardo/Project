<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-editar-{{ $user->id }}">
	<form action="/user-editar/{{ $user->id }}" method="POST">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Cambiar contraseña: {{ $user->name }}</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group"> 
                        <label>Introduce password actual</label>                       
                        <div class="form-line">
                            <input type="password" class="form-control" name="mypassword"  required>
                        </div>
                        <label>Introduce nuevo password</label>                       
                        <div class="form-line">
                            <input type="password" class="form-control" name="password"  required>
                        </div>   
                        <label>Confirma nuevo password</label>                       
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_confirmation"  required>
                        </div>                        
                                                
                    </div>           
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-link waves-effect">Cambiar Password</button>
				</div>
			</div>
		</div>
	</form>
</div>