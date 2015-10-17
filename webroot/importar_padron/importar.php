<html>
<head>
	<title>Importar dato en Excel</title>
</head>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<!--<script src="js/jquery.datatables.js"></script>-->
<script src="js/bootstrap-datatables.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-datatables.css" />
<script>
$(function(){ 
	$('#sort').dataTable(); 
	$('[title]').tooltip(); 
}); 
function validar(){

    if(confirm("Esta seguro que desea importar el archivo?")){
        /**
         * verificamos si se selecciono algun archivo
         */
        if($("#archivo").val()==""){
            alert("Seleccione un archivo .csv");
            return false;
        }
        var nombreArchivo=$("#archivo").val().split(".");//recuperamos la extension del archivo a subir
        /**
         * verificamos si la extension es .csv
         */
        if(nombreArchivo[nombreArchivo.length-1]!="csv"){
            alert("ARCHIVO NO VALIDO");
            return false;
        }
    return true;
    }
    else{
        return false;
    }
}
</script> 
<body>
	<form name="formid" id="formid" method="post" action="vista.php" enctype="multipart/form-data" onsubmit="return validar();">
		<div class="form-group">
			<label for="archivo"><p>Archivo .CSV</p>
				<input type="file" name="archivo" id="archivo" class="form-control">
			</label>
			<label for="button">
				<button>Subir</button>
			</label>
		</div>
	</form>
</body>
</html>