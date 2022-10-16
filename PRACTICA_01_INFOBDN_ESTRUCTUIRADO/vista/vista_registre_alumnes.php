<header>
	<h1 style='color: red;'> Pàgina d'Administració infoBDN </h1>
</header>
<div class="contenidor_1">
	<div class="contenidor_2">
		<div class="contenidor">
			<h3> Registre Alumnes: infoBDN </h3>
		</div>
		<form action="index.php?entrada=registre" method="POST" enctype="multipart/form-data">
			<div>
				<table class="caixa_registre">
					<tr>
						<td>
							<i class="fas fa-id-card"></i>
							<input type="text" name="dni_alum_form" placeholder="DNI" required />
						</td>
					</tr>
					<tr>
						<td>
							<i class="fas fa-signature"></i>
							<input type="text" name="nom_alum_form" placeholder="Nom" required />
						</td>
					</tr>
					<tr>
						<td>
							<i class="far fa-user icon"></i>
							<input type="text" name="cognom_alum_form" placeholder="Cognom" required />
						</td>
					</tr>
					<tr>
						<td>
							<i class="fas fa-key icon"></i>
							<input type="password" name="pass_alum_form" placeholder="Password" required />
						</td>
					</tr>
					<tr>
						<td>
							<i class="fas fa-calendar-alt"></i>
							<input type="text" name="edat_alum_form" placeholder="Edat" required />
						</td>
					</tr>
					<tr>
						<td>
							<i class="fas fa-image"></i>
							<input type="file" name="foto" required />
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" id="hom" name="radiologin" value="h">
							<label for="hom">Home</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" id="don" name="radiologin" value="d">
							<label for="don">Dona</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="registrar" value="Registrar" />
						</td>
					</tr>
				</table>
			</div>
		</form>
	</div>
	<div class="contenidor">
		<p>Ja estas registrat?<a href="index.php?entrada=checklogin"><span> Inicia sessió </span></a></p>
	</div>
</div>