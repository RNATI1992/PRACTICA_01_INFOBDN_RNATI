<div class="contenidor_administracio">
	<h2> Gestió Professors</h2>
	<div class="busca_afegeix">
		<form action='index.php?entrada=cercar_professors' enctype="multipart/form-data" method='post' class="excepcion">
			<div class="cercar">
				<label> CERCAR PROFESSOR:<input type="text" name="cercar_professors" placeholder="Posa el nom del professor" /></label>
				<label><input type='submit' name="cercar"></label>
			</div>
		</form>
		<div>
			<a href="index.php?entrada=afegir_professors"><button class="afegir_professor"> Afegir Professor</button></a>
		</div>
	</div>
	<section class="wrapper">
		<!-- Row title -->
		<main class="row title">
			<ul class="th">
				<li>DNI</li>
				<li>Nom</li>
				<li>Cognom</li>
				<li>Titol Academic</li>
				<li>Fotografia</li>
				<!-- <li>Cursos Imparteixen</li> -->
				<li>EDITAR</li>
				<li>ELIMINAR</li>
			</ul>
		</main>
		<!-- Row 1 - fadeIn -->
		<?php foreach ($resultado as $key) {
			if ($key['actiu'] == TRUE) { ?>
				<section class="row-fadeIn-wrapper">
					<article class="row nfl">
						<ul>
							<li><?php echo $key['dni_prof'] ?></li>
							<li><?php echo $key['nom_professor'] ?></li>
							<li><?php echo $key['cognom_professor'] ?></li>
							<li><?php echo $key['titol_academic'] ?></li>

							<?php
							if ($key['fotografia'] != "") {
							?>
								<li class="li_foto"><img class="fotos" src="<?php echo $key['fotografia'] ?>"></li>
							<?php
							} else if ($key['fotografia'] == "" && $key['sexe'] == "h") {
							?>
								<li class="li_foto"><img class="fotos" src="img/avatar_hombre.png"></li>
							<?php
							} else if ($key['fotografia'] == "" && $key['sexe'] == "d") { ?>
								<li class="li_foto"><img class="fotos" src="img/avatar_mujer.png"></li>
							<?php
							} else { ?>
								<li class="li_foto"><img class="fotos" src="img/avatar_mujer.png" /></li>
							<?php
							}
							?>
							<li>
								<a href="index.php?entrada=editar_professors&fila=<?php echo $key['dni_prof'] ?>"><i class="fas fa-edit"></i></a>
							</li>
							<li>
								<a href="index.php?entrada=desactivar_professors&fila=<?php echo $key['dni_prof'] ?>"><i class="fas fa-trash-alt"></i></a>
							</li>
						</ul>
					</article>
				</section>
			<?php } else { ?>
				<section class="row-fadeIn-wrapper">
					<article class="row nfl">
						<ul class="dissable">
							<li><?php echo $key['dni_prof'] ?></li>
							<li><?php echo $key['nom_professor'] ?></li>
							<li><?php echo $key['cognom_professor'] ?></li>
							<li><?php echo $key['titol_academic'] ?></li>
							<?php
							if ($key['fotografia'] != "") {
							?>
								<li class="li_foto"><img class="fotos" src="<?php echo $key['fotografia'] ?>"></li>
							<?php
							} else if ($key['fotografia'] == "" && $key['sexe'] == "h") {
							?>
								<li class="li_foto"><img class="fotos" src="img/avatar_hombre.png"></li>
							<?php
							} else if ($key['fotografia'] == "" && $key['sexe'] == "d") { ?>
								<li class="li_foto"><img class="fotos" src="img/avatar_mujer.png"></li>
							<?php
							} else { ?>
								<li class="li_foto"><img class="fotos" src="img/avatar_mujer.png" /></li>
							<?php
							}
							?>
							<li class="activar">Activar =></li>
							<li>
								<a href="index.php?entrada=activar_professors&fila=<?php echo $key['dni_prof'] ?>"><i class="fas fa-trash-restore"></i></a>
							</li>
						</ul>
					</article>
				</section>
		<?php }
		} ?>
	</section>
</div>
<div class="contenidor">
	<a href="index.php?entrada=pagina_administracio"><i class="fas fa-reply"><span> Pagina principal </span></i></a>
</div>