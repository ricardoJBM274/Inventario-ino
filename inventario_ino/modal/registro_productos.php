	<?php
	if (isset($con)) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
							<div id="resultados_ajax_productos"></div>
							<div class="form-group">
								<label for="codigo" class="col-sm-3 control-label">Código</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código del producto" required>
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="col-sm-3 control-label">Descripción</label>
								<div class="col-sm-8">
									<textarea class="form-control" id="nombre" name="nombre" placeholder="Descripción del producto" required maxlength="255"></textarea>

								</div>
							</div>

							<div class="form-group">
								<label for="categoria" class="col-sm-3 control-label">Aulas</label>
								<div class="col-sm-8">
									<select class='form-control' name='categoria' id='categoria' required>
										<option value="">Selecciona una Aula</option>
										<?php
										$query_categoria = mysqli_query($con, "select * from categorias order by nombre_categoria");
										while ($rw = mysqli_fetch_array($query_categoria)) {
										?>
											<option value="<?php echo $rw['id_categoria']; ?>"><?php echo $rw['nombre_categoria']; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="precio" class="col-sm-3 control-label">Número de serie (Opcional)</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="precio" name="precio" placeholder="Numero de serie">
								</div>
							</div>

							<div class="form-group">
								<label for="stock" class="col-sm-3 control-label">Cantidad (Opcional)</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="stock" name="stock" placeholder="Cantidad sin código">
								</div>
							</div>
							<div class="form-group">
								<label for="stock" class="col-sm-3 control-label">Estado (Opcional)</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="estado" name="estado" placeholder="Estado del producto">
								</div>
							</div>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	<?php
	}
	?>