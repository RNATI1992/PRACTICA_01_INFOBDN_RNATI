<h2> Cursos que han finalitzat</h2>
<div class="cursos_imparteixes">
	<?php foreach ($resultado as $key) { ?>
		<div class="curs">
			<a href="index.php?entrada=cursos_notes_professors&id_curso=<?php echo $key['idCurso'] ?>">
				<img src="img/cursos_varios.gif" alt="No hi ha imatge">
				<div class="container">
					<div class="altura">
						<h3 class="c_h"><?php echo $key['nom_curs'] ?></h3>
						<p class="finalitzat"></p>
						<p class="finalitzat"> Descripcio: <span><?php echo $key['descripcio'] ?></span></p>
						<p class="finalitzat"> Hores: <span><?php echo $key['horas'] ?> Hores</span></p>
						<p class="finalitzat"> Data Inici: <span class="f_uno"><?php echo $key['data_inici'] ?></span></p>
						<p class="finalitzat"> Data Final: <span class="f_dos"><?php echo $key['data_final'] ?></span></p>
					</div>
					<div class="curs_img">El curs ha finalitzat</div>
				</div>
				<div>
					<!-- <p class="finalitzat"> Nº alumnes: <span> <?php echo $num_alumnes ?></span></p> -->
				</div>
			</a>
		</div>
	<?php } ?>
</div>
<div class="contenidor">
	<a href="index.php?entrada=cursos_pagina_principal_professors"><i class="fas fa-reply"><span> Pagina principal </span></i></a>
</div>