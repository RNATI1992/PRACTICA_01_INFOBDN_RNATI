<header>
	<div class="pag_princ">
		<div class="dintre_header">
			<h1> Benvingut a l'Acadèmia infoBDN </h1>
		</div>
		<div class="dintre_header">
			<button>
				<a href="index.php?entrada=administracio"><i class="fas fa-user-shield">
						<p class="boton_salir">Admin</p>
					</i>
				</a>
			</button>
		</div>
	</div>
</header>
<div class="contenidor_2">
	<form action='index.php?entrada=checklogin' enctype="multipart/form-data" method='post'>
		<div>
			<label>Usuari: <input type='text' name='form_usuari'></label>
		</div>
		<div>
			<label>Password: <input type='password' name='form_password'></label>
		</div>
		<div>
			<input type="radio" id="prof" name="radiologin" value="professor">
			<label for="prof">Professor</label>
		</div>
		<div>
			<input type="radio" id="alum" name="radiologin" value="alumne">
			<label for="alum">Alumne</label>
		</div>
		<div class="botons">
			<div>
				<input type='reset' value="Resetejar">
			</div>
			<div>
				<input type='submit' name="entrada" value="Entrar">
			</div>
		</div>
	</form>
</div>
<div>
	<?php
	if (isset($_POST['entrada'])) {
		print_r($incorrecte);
	}
	?>
</div>
<div class="contenidor">
	<p>No estas enregistrat?<a href="index.php?entrada=registre"><span> Enregistra't </span></a></p>
</div>