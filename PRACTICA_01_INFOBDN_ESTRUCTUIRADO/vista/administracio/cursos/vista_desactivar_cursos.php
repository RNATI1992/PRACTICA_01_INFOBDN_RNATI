<header>
	<div class="contenidor">
		<h1> Registre Alumnes: infoBDN </h1>
	</div>
</header>
<div class="contenidor_1">
	<div class="contenidor_2">
		<form action='index.php?formulari=Controlador&action=pagina_inici' enctype="multipart/form-data" method='post'>
			<table class="caixa_registre">
				<tr>
					<td>
						Nom:
					</td>
					<td>
						<i class="fas fa-id-card"></i>
						<input type="text" name="dni_alum_form" placeholder="DNI" required />
					</td>
				</tr>
				<tr>
					<td>
						Descripció:
					</td>
					<td>
						<i class="fas fa-signature"></i>
						<input type="text" name="nom_alum_form" placeholder="Nom" required />
					</td>
				</tr>
				<tr>
					<td>
						Hores:
					</td>
					<td>
						<i class="far fa-user icon"></i>
						<input type="text" name="cognom_alum_form" placeholder="Cognom" required />
					</td>
				</tr>
				<tr>
					<td>
						Data Inici:
					</td>
					<td>
						<i class="fas fa-key icon"></i>
						<input type="password" name="pass_alum_form" placeholder="Password" required />
					</td>
				</tr>
				<tr>
					<td>
						Data Final:
					</td>
					<td>
						<i class="fas fa-calendar-alt"></i>
						<input type="text" name="edat_alum_form" placeholder="Edat" required />
					</td>
				</tr>
				<tr>
					<td>
						DNI Professora:
					</td>
					<td>
						<i class="fas fa-image"></i>
						<input type="file" name="fotografia_alum_form" required />
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Registrar" />
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div class="contenidor">
		<p>Ja estas registrat?<a href="index.php?formulari=Controlador&action=pagina_inici"><span> Inicia sessió </span></a></p>
	</div>
</div>