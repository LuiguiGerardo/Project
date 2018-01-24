$(document).ready(function(){
		var fecha_actual= new Date().toISOString().slice(0,10);;

		$("#fecha_vencimiento").attr("min",fecha_actual);
	});
	$('#stockMax').on('keypress', function (e) {
	    console.log(e.keyCode);
	    if (e.keyCode == 101 || e.keyCode == 45 || e.keyCode == 46 || e.keyCode == 43 || e.keyCode == 44 || e.keyCode == 47) {
	        return false;
	    }
	    soloNumeros(e.keyCode);
	});
	$('#stockMin').on('keypress', function (e) {
	    console.log(e.keyCode);
	    if (e.keyCode == 101 || e.keyCode == 45 || e.keyCode == 46 || e.keyCode == 43 || e.keyCode == 44 || e.keyCode == 47) {
	        return false;
	    }
	    soloNumeros(e.keyCode);
	});
	$('#precioCompra').on('keypress', function (e) {
	    console.log(e.keyCode);
	    if (e.keyCode == 101 || e.keyCode == 45 || e.keyCode == 43 || e.keyCode == 44 || e.keyCode == 47) {
	        return false;
	    }
	    soloNumeros(e.keyCode);
	});
	$('#precioVenta').on('keypress', function (e) {
	    console.log(e.keyCode);
	    if (e.keyCode == 101 || e.keyCode == 45 || e.keyCode == 43 || e.keyCode == 44 || e.keyCode == 47) {
	        return false;
	    }
	    soloNumeros(e.keyCode);
	});

function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
        return (key >= 48 && key <= 57)
}