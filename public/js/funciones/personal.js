$('#sueldo').on('keypress', function (e) {
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