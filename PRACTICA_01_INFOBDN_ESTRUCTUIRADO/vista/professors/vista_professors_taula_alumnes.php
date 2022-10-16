<div class="contenidor_administracio">
	<h2> Llista alumnes curs</h2>
	<div class="busca_afegeix">
		<form action='index.php?entrada=cercar_curs' enctype="multipart/form-data" method='post' class="excepcion">
			<div class="cercar">
				<label> CERCAR CURS:<input type="text" name="cercar_cursos" placeholder="Posa el nom del curs" /></label>
				<label><input type='submit' name="cercar"></label>
			</div>
		</form>
	</div>
	<section class="wrapper">
		<!-- Row title -->
		<main class="row3 title">
			<ul class="th">
				<li>Fotografia</li>
				<li>Nom</li>
				<li>Cognom</li>
				<li>Nom Curs</li>
				<li>Descripcio</li>
				<li>Hores</li>
				<li>Nota</li>
				<li>Data Inici</li>
				<li>Data Final</li>
			</ul>
		</main>
		<!-- Row 1 - fadeIn -->
		<?php
		foreach ($resultado as $key) { ?>
			<section class="row3-fadeIn-wrapper">
				<article class="row3 nfl">
					<ul>
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
						<li><?php echo $key['nom'] ?></li>
						<li><?php echo $key['cognom'] ?></li>
						<li><?php echo $key['nom_curs'] ?></li>
						<li><?php echo $key['descripcio'] ?></li>
						<li><?php echo $key['horas'] ?></li>
						<?php
						$result = '';
						if ($key['nota'] > '0' && $key['nota'] < '5') {
							$result .= "<li class='u_s' style='color: #ff5e35; font-size: 17px; font-weight: bolder;'>" . $key['nota'] . "</li>";
						} else if ($key['nota'] >= '5' && $key['nota'] < '6') {
							$result .= "<li class='u_s'style='color: #ff5f10; font-size: 17px; font-weight: bolder;'>" . $key['nota'] . "</li>";
						} else if ($key['nota'] >= '6' && $key['nota'] < '9') {
							$result .= "<li class='u_s' style='color: #fcf84a; font-size: 17px; font-weight: bolder;'>" . $key['nota'] . "</li>";
						} else if ($key['nota'] >= '9' && $key['nota'] <= '10') {
							$result .= "<li class='u_s' style='color: #11ffbb; font-size: 17px; font-weight: bolder;'>" . $key['nota'] . "</li>";
						} else {
							$result .= "<li class='u_s' style='color: #ff5e35; font-size: 14px; font-weight: bolder;'> No hi ha nota.</li>";
						}
						echo $result;
						?>
						<li><?php echo $key['data_inici'] ?></li>
						<li><?php echo $key['data_final'] ?></li>
					</ul>
				</article>
			</section>
		<?php
		}
		?>
	</section>
</div>
<div class="contenidor">
	<a href="index.php?entrada=cursos_imparteixen_professors"><i class="fas fa-reply"><span> Pagina principal </span></i></a>
</div>