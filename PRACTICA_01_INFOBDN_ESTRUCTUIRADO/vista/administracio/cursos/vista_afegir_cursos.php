<header>
	<div class="contenidor">
		<h1> Afegir CURS: infoBDN </h1>
	</div>
</header>
<div class="contenidor_1">
	<div class="contenidor_2">
		<form action='index.php?entrada=afegir_cursos' enctype="multipart/form-data" method='post'>
			<table class="caixa_registre">
				<tbody>
					<tr>
						<td>
							Nom Curs:
						</td>
						<td>
							<input type="text" name="nom_curs_afegir" placeholder="Nom" required />
						</td>
					</tr>
					<tr>
						<td>
							Descripció:
						</td>
						<td>
							<textarea name="descripcio_curs_afegir" placeholder="Descripcio" rows="5" cols="21" maxlength="50" required /></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Hores:
						</td>
						<td>
							<input type="number" name="hores_curs_afegir" placeholder="Hores" required />
						</td>
					</tr>
					<tr>
						<td>
							Data Inici:
						</td>
						<td>
							<input type="date" name="data_inici_afegir" placeholder="Password" required />
						</td>
					</tr>
					<tr>
						<td>
							Data Final:
						</td>
						<td>
							<input type="date" name="data_final_afegir" placeholder="Edat" required />
						</td>
					</tr>
					<tr>
						<td>
							DNI Professor/a:
						</td>
						<td>
							<select name="dni_professora_afegir" required>
								<?php print_r($professors); ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name='afegir' value="Afegir" />
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<div>
		<?php
		if (isset($_POST['afegir'])) {
			print_r($incorrecte);
		}
		?>
	</div>
	<div class="contenidor">
		<a href="index.php?entrada=afegir_cursos&retorno=si"><i class="fas fa-reply"><span> Pàgina gestio cursos</span></i></a>
	</div>
</div>