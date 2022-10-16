<header>
	<div class="contenidor">
		<h1> Edició dels professors </h1>
	</div>
</header>
<div class="contenidor_1">
	<div class="contenidor_2">
		<div>
			<?php
			if ($fotografia != "") {
			?>
				<img class="_fotos" src="<?php echo $fotografia ?>">
			<?php
			} else if ($fotografia == "" && $sexe == "h") {
			?>
				<img class="_fotos" src="img/avatar_hombre.png">
			<?php
			} else if ($fotografia == "" && $sexe == "d") { ?>
				<img class="_fotos" src="img/avatar_mujer.png">
			<?php
			} else { ?>
				<img class="_fotos" src="img/avatar_mujer.png" />
			<?php
			}
			?>
		</div>
		<form action="index.php?entrada=editar_professors&dni=<?php echo $dni_prof ?>" enctype="multipart/form-data" method='post'>
			<table class="caixa_registre">
				<div>
					DNI Profesor/a:
				</div>
				<div>
					<select name="dni_professors_editar" disabled="disabled" required>
						<?php print_r($professors); ?>
					</select>
				</div>
				<div>
					Nom:
				</div>
				<div>
					<input type="text" name="nom_professors_editar" value="<?php print_r($nom_professor) ?>" />
				</div>
				<div>
					Cognom:
				</div>
				<div>
					<input type="text" name="cognom_professors_editar" value="<?php print_r($cognom_professor) ?>" />
				</div>
				<div>
					Titol acadèmic:
				</div>
				<div>
					<input type="text" name="titol_professors_editar" value="<?php print_r($titol_academic) ?>" />
				</div>

				<div>
					Fotografia:
				</div>
				<div>
					<input type="file" name="foto" value="<?php print_r($fotografia) ?>" />
				</div>
				<div>
					<input type="submit" name='editar' value="Editar" />
				</div>
			</table>
		</form>
	</div>
	<div class="contenidor">
		<a href="index.php?entrada=pagina_principal_professors&retorno=si"><i class="fas fa-reply"><span> Taula professors </span></i></a>
	</div>
</div>