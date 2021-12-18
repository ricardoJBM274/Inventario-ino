<?php
include('is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado

/*Inicia validacion del lado del servidor*/
if (empty($_POST['codigo'])) {
	$errors[] = "Código vacío";
} else if (empty($_POST['nombre'])) {
	$errors[] = "Nombre del producto vacío";
} else if (
	!empty($_POST['codigo']) &&
	!empty($_POST['nombre'])
) {
	/* Connect To Database*/
	require_once("../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
	require_once("../config/conexion.php"); //Contiene funcion que conecta a la base de datos
	include("../funciones.php");
	// escaping, additionally removing everything that could be (html/javascript-) code
	$codigo = mysqli_real_escape_string($con, (strip_tags($_POST["codigo"], ENT_QUOTES)));
	$nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES)));
	$stock = intval($_POST['stock']);
	$id_categoria = intval($_POST['categoria']);
	$precio_venta = mysqli_real_escape_string($con, (strip_tags($_POST["precio"], ENT_QUOTES)));
	$estado =  mysqli_real_escape_string($con, (strip_tags($_POST["estado"], ENT_QUOTES)));
	$date_added = date("Y-m-d H:i:s");

	$sql = "INSERT INTO products (codigo_producto, nombre_producto, date_added, num_serie, stock, id_categoria, estado) VALUES ('$codigo','$nombre','$date_added','$precio_venta', '$stock','$id_categoria','$estado')";
	$query_new_insert = mysqli_query($con, $sql);
	if ($query_new_insert) {
		$messages[] = "Producto ha sido ingresado satisfactoriamente.";
		$id_producto = get_row('products', 'id_producto', 'codigo_producto', $codigo);
		$user_id = $_SESSION['user_id'];
		$nota = "Se agregó $nombre al inventario";
		echo guardar_historial($id_producto, $user_id, $date_added, $nota, $codigo, $stock, $estado);
	} else {
		$errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($con);
	}
} else {
	$errors[] = "Error desconocido.";
}

if (isset($errors)) {

?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error!</strong>
		<?php
		foreach ($errors as $error) {
			echo $error;
		}
		?>
	</div>
<?php
}
if (isset($messages)) {

?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡Bien hecho!</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}

?>