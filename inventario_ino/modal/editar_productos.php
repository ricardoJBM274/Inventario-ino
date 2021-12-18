	<?php
	if (isset($con)) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar producto</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
							<div id="resultados_ajax2"></div>
							<div class="form-group">
								<label for="mod_codigo" class="col-sm-3 control-label">Código</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_codigo" name="mod_codigo" placeholder="Código del producto" required>
									<input type="hidden" name="mod_id" id="mod_id">
								</div>
							</div>
							<div class="form-group">
								<label for="mod_nombre" class="col-sm-3 control-label">Descripción</label>
								<div class="col-sm-8">
									<textarea class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Descripción del producto" required></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="mod_categoria" class="col-sm-3 control-label">Aulas</label>
								<div class="col-sm-8">
									<select class='form-control' name='mod_categoria' id='mod_categoria' required>
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
								<label for="mod_precio" class="col-sm-3 control-label">Número de serie (Opcional)</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_precio" name="mod_precio" placeholder="Numero de serie">
								</div>
							</div>

							<div class="form-group">
								<label for="mod_stock" class="col-sm-3 control-label">Cantidad (Opcional)</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="mod_stock" name="mod_stock" placeholder="Cantidad sin código">
								</div>
							</div>
							<div class="form-group">
								<label for="mod_estado" class="col-sm-3 control-label">Estado (Opcional)</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_estado" name="mod_estado" placeholder="Estado del producto">
								</div>
							</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	<?php
	}
	?>