<div class="contenidor_administracio">
	<h2> Gestió Cursos</h2>
	<div class="busca_afegeix">
		<form action='index.php?entrada=cercar_curs' enctype="multipart/form-data" method='post' class="excepcion">
			<div class="cercar">
				<label> CERCAR CURS:<input type="text" name="cercar_cursos" placeholder="Posa el nom del curs" /></label>
				<label><input type='submit' name="cercar"></label>
			</div>
		</form>
		<div>
			<a href="index.php?entrada=afegir_cursos"><button class="afegir_curs"> Afegir Curs</button></a>
		</div>
	</div>
	<section class="wrapper">
		<!-- Row title -->
		<main class="row3 title">
			<ul class="th">
				<li>Nom</li>
				<li>Descripcio</li>
				<li>Hores</li>
				<li>Data Inici</li>
				<li>Data Final</li>
				<li>DNI Professor</li>
				<li>EDITAR</li>
				<li>ELIMINAR</li>
			</ul>
		</main>
		<!-- Row 1 - fadeIn -->
		<?php foreach ($resultado as $key) {
			if ($key['actiu'] == 1) { ?>
				<section class="row3-fadeIn-wrapper">
					<article class="row3 nfl">
						<ul>
							<li><?php echo $key['nom_curs'] ?></li>
							<li><?php echo $key['descripcio'] ?></li>
							<li><?php echo $key['horas'] ?></li>
							<li><?php echo date("d-m-Y", strtotime($key['data_inici'])) ?></li>
							<li class="li_data_final"><?php echo date("d-m-Y", strtotime($key['data_final'])) ?></li>
							<li><?php echo $key['dni_prof'] ?></li>
							<li><a href="index.php?entrada=editar_cursos&fila=<?php echo $key['idCurso'] ?>"><i class="fas fa-edit"></i></a></li>
							<li><a href="index.php?entrada=desactivar_cursos&fila=<?php echo $key['idCurso'] ?>"><i class="fas fa-trash-alt"></i></a></li>
						</ul>
					</article>
				</section>
			<?php } else { ?>
				<section class="row3-fadeIn-wrapper">
					<article class="row3 nfl">
						<ul class="dissable">
							<li><?php echo $key['nom_curs'] ?></li>
							<li><?php echo $key['descripcio'] ?></li>
							<li><?php echo $key['horas'] ?></li>
							<li><?php echo $key['data_inici'] ?></li>
							<li class="li_data_final"><?php echo $key['data_final'] ?></li>
							<li><?php echo $key['dni_prof'] ?></li>
							<li class="activar">Activar =></li>
							<li><a href="index.php?entrada=activar_cursos&fila=<?php echo $key['idCurso'] ?>"><i class="fas fa-trash-restore"></i></a></li>
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