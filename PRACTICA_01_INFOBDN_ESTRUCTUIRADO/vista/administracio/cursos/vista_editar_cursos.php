<header>
	<div class="contenidor">
		<h1> Edició dels cursos: infoBDN </h1>
	</div>
</header>
<div class="contenidor_1">
	<div class="contenidor_2">
		<form action="index.php?entrada=editar_cursos&fila=<?php echo $_GET['fila'] ?>" enctype="multipart/form-data" method='post'>
			<table class="caixa_registre">
				<tr>
					<td>
						Id Curs i Nom:
					</td>
					<td>
						<select name="nom_curs_editar" disabled="disabled" required>
							<?php print_r($cursos); ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Descripció:
					</td>
					<td>
						<input type="text" name="descripcio_curs_editar" value="<?php print_r($descripcio) ?>" />
					</td>
				</tr>
				<tr>
					<td>
						Hores:
					</td>
					<td>
						<input type="number" name="hores_curs_editar" value="<?php print_r($hores) ?>" />
					</td>
				</tr>
				<tr>
					<td>
						Data Inici:
					</td>
					<td>
						<input type="text" name="data_inici_editar" value="<?php print_r($data_inici) ?>" onfocus="(this.type='date')" />
					</td>
				</tr>
				<tr>
					<td>
						Data Final:
					</td>
					<td>
						<input type="text" name="data_final_editar" value="<?php print_r($data_final) ?>" onfocus="(this.type='date')" />
					</td>
				</tr>
				<tr>
					<td>
						DNI Professora:
					</td>
					<td>
						<select name="dni_professora_editar" required>
							<?php print_r($professors); ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name='editar' value="Editar" />
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div class="contenidor">
		<a href="index.php?entrada=pagina_principal_cursos&retorno=si"><i class="fas fa-reply"><span> Gestio Cursos </span></i></a>
	</div>
</div>