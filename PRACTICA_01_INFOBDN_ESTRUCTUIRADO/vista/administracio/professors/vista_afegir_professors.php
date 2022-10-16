<div class="contenidor_1">
	<div class="contenidor_2">
		<div class="contenidor">
			<h3> Afegir PROFESSORS: infoBDN </h3>
		</div>
		<form action='index.php?entrada=afegir_professors' enctype="multipart/form-data" method='post'>
			<div>
				DNI Profesor/a:
			</div>
			<div>
				<input type="text" name="dni_professors_afegir" placeholder="DNI" required />
			</div>
			<div>
				Nom:
			</div>
			<div>
				<input type="text" name="nom_professors_afegir" placeholder="Nom" required />
			</div>
			<div>
				Cognom:
			</div>
			<div>
				<input type="text" name="cognom_professors_afegir" placeholder="Cognom" required /></textarea>
			</div>
			<div>
				password:
			</div>
			<div>
				<input type="password" name="password_professors_afegir" placeholder="Contrasenya" required /></textarea>
			</div>
			<div>
				Titol acadèmic:
			</div>
			<div>
				<input type="text" name="titol_professors_afegir" placeholder="Titol acadèmic" required />
			</div>

			<div>
				Fotografia:
			</div>
			<div>
				<input type="file" name="foto" />
			</div>
			<div>
				<input type="submit" name='afegir' value="Afegir" />
			</div>

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
		<a href="index.php?entrada=afegir_professors&retorno=si"><i class="fas fa-reply"><span> Pàgina gestio professors</span></i></a>
	</div>
</div>