<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		table {
		   width: 100%;
		   border: 1px solid #000;
		}
		th, td {
		   width: 25%;
		   text-align: left;
		   vertical-align: top;
		   border: 1px solid #000;
		   border-collapse: collapse;
		   padding: 0.3em;
		   caption-side: bottom;
		}
		caption {
		   padding: 0.3em;
		   color: #fff;
		    background: #000;
		}
		th {
		   background: #eee;
		}
	</style>
	<title>Compras</title>
</head>
<body>
		<h3>Listado de compras</h3>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<tr>
					<th class="success">Id</th>					
					<th class="success">Proveedor</th>
					<th class="success">Personal</th>
					<th class="success">Total</th>					
					
				</tr>
									
				</thead>
				<tbody>
					@foreach ($compras as $d)
						<tr>
							<td>{{ $d->id}}</td>
							<td>{{ $d->proveedor->razon_social}}</td>
							<td>{{ $d->personal->nombre.' '.$d->personal->apellido}}</td>
							<td>{{ $d->total}}</td>				
											
						</tr>				
					@endforeach
				</tbody>
               
			</table>
		</div>		
	
</body>
</html>


	
