<div class="contenidor">
	<h1> Benvingut a l'Acadèmia infoBDN </h1>
</div>
<div class="contenidor_2">
	<h3 style="color: red">ADMINISTRACIÓ: </h3>
	<form action='index.php?entrada=administracio' enctype="multipart/form-data" method='post'>
		<div>
			<label>Usuari:
				<input type='text' name='form_usuari_administracio'></label>
			</label>
		</div>
		<div>
			<label>Password:
				<input type='password' name='form_password_administracio'>
			</label>
		</div>
		<div class="botons">
			<div>
				<input type='reset' value="Resetejar">
			</div>
			<div>
				<input type='submit' name="entrar" value="Entrar">
			</div>
		</div>
	</form>
</div>
<div>
	<?php
	if (isset($_POST['entrar'])) {
		print_r($incorrecte);
	}
	?>
</div>
<div class="contenidor">
	<p>Pagina principal Alumnes: <a href="index.php?formulari=Controlador&action=pagina_inici"><span> Inicia sessió </span></a></p>
</div>