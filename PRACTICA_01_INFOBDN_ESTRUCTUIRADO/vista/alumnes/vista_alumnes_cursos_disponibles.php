<div class="contenidor_administracio">
	<h2> Cursos Disponibles</h2>
	<div class="busca_afegeix">
		<form action='index.php?entrada=cercar_curs&numero=1' enctype="multipart/form-data" method='post' class="excepcion">
			<div class="cercar">
				<label> CERCAR CURS:<input type="text" name="cercar_cursos" placeholder="Posa el nom del curs" /></label>
				<label><input type='submit' name="cercar"></label>
			</div>
		</form>
	</div>
	<section class="wrapper2">
		<!-- Row title -->
		<main class="row2 title">
			<ul class="th">
				<li>Nom</li>
				<li>Descripcio</li>
				<li>Hores</li>
				<li>Data Inici</li>
				<li>Data Final</li>
				<li>Matricular</li>
			</ul>
		</main>
		<!-- Row 1 - fadeIn -->
		<?php
		foreach ($resultado as $key) {
			if ($key['actiu'] == 1) { ?>
				<section class="row-fadeIn-wrapper">
					<article class="row2 nfl">
						<ul>
							<li><?php echo $key['nom_curs'] ?></li>
							<li><?php echo $key['descripcio'] ?></li>
							<li><?php echo $key['horas'] ?></li>
							<li><?php echo date("d-m-Y", strtotime($key['data_inici'])) ?></li>
							<li><?php echo date("d-m-Y", strtotime($key['data_final'])) ?></li>
							<li><a href="index.php?entrada=cursos_disponibles_alumnes&fila=<?php echo $key['idCurso'] ?>"><i class="fas fa-user-plus"></i></a></li>
						</ul>
					</article>
				</section>
			<?php
			} else {
			?>
				<section class="row-fadeIn-wrapper">
					<article class="row2 nfl">
						<ul>
							<li> No hi ha Cursos disponbiles encara!</li>
						</ul>
					</article>
				</section>
		<?php
			}
		}
		?>
	</section>
</div>
<?php
// if ($succesful = !'') {
// 	echo $succesful;
// }
?>
<div class="contenidor">
	<a href="index.php?entrada=pagina_principal_alumnes"><i class="fas fa-reply"><span> Pagina principal </span></i></a>
</div>