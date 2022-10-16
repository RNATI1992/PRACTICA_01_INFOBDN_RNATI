<h2> Cursos que imparteixes</h2>
<div class="cursos_imparteixes">
	<?php foreach ($resultado as $key) { ?>
		<div class="curs">
			<a href="index.php?entrada=curs_seleccionat_professors&id_curso=<?php echo $key['idCurso'] ?>">
				<img id="curs_img" src="img/cursos_varios.gif"></img>
				<div>
					<h3 class="c_h"><?php echo $key['nom_curs'] ?></h3>
					<p class="c_p"></p>
					<p class="c_p"> Descripcio: <span><?php echo $key['descripcio'] ?></span></p>
					<p class="c_p"> Hores: <span><?php echo $key['horas'] ?> Hores</span></p>
					<p class="c_p"> Data Inici: <span><?php echo $key['data_inici'] ?></span></p>
					<p class="c_p"> Data Final: <span><?php echo $key['data_final'] ?></span></p>
					<!-- <p class="c_p"> Nº alumnes: <span> <?php echo $num_alumnes ?></span></p> -->
				</div>
			</a>
		</div>
	<?php } ?>
</div>
<div class="contenidor">
	<a href="index.php?entrada=cursos_pagina_principal_professors"><i class="fas fa-reply"><span> Pagina principal </span></i></a>
</div>