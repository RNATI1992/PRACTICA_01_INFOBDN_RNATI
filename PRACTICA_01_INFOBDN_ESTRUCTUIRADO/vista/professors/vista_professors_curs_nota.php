<div class="contenidor_alumnes_taula">
	<h2> Taula Alumnes Notes</h2>
	<!-- <div class="busca_alumnes_taula">
		<form action='index.php?entrada=cercar_alumnes_curs' enctype="multipart/form-data" method='post' class="excepcion">
			<div class="cercar">
				<label> CERCAR CURS:<input type="text" name="cercar_alumne" placeholder="Posa el nom del alumne" /></label>
				<label><input type='submit' name="cercar"></label>
			</div>
		</form>
	</div> -->
	<div class="inline">
		<div class="fill_inline">
			<?php
			foreach ($resultado as $key) { ?>
				<div class="row-fadeIn-wrapper2">
					<div class="dni">
						<div class="u_text">
							<p class="u_p">
							<p class="u_s_name">
								<?php echo $key['nom'] . " " . $key['cognom'] ?>
							</p>
							<span>
								<?php
								if ($key['fotografia'] != "") {
								?>
									<img class="fichajes" src="<?php echo $key['fotografia'] ?>">
								<?php
								} else if ($key['fotografia'] == "" && $key['sexe'] == "h") {
								?>
									<img class="fichajes" src="img/avatar_hombre.png">
								<?php
								} else if ($key['fotografia'] == "" && $key['sexe'] == "d") { ?>
									<img class="fichajes" src="img/avatar_mujer.png">
								<?php
								} else { ?>
									<img class="fichajes" src="img/avatar_mujer.png" />
								<?php
								}
								?>
							</span>
							</p>
						</div>
						<div class="u_text">
							<span class="u_s">
								<h3>Edat</h3>
							</span>
							<span class="u_s">
								<?php
									$resultat = explode("-", $key['edat']);
									$anys = date('Y') - $resultat[0];
									echo $anys;
								?>
							</span>
							<?php if ($key['nota'] == '') { ?>
								<span class="u_line_2_not_allowed">
									<form action='index.php?entrada=update_alumnes_notes&fila=<?php echo $key['idCurso'] ?>&alumne=<?php echo $key['dni_alum'] ?>' enctype="multipart/form-data" method="post">
										<input type="text" class="desaparece" value="Nota: " disabled>

										<input type="text" name="afegir_nota" class="afeg_nota">

										<input type='submit' name="afegir" value='Afegir' class="submit">
									</form>
								</span>
							<?php  } else { ?>
								<span class="u_line_2_not_allowed">
									<form action='index.php?entrada=update_alumnes_notes&fila=<?php echo $key['idCurso'] ?>&alumne=<?php echo $key['dni_alum'] ?>' enctype="multipart/form-data" method="post">
										<input type="text" class="desaparece" value="Nota: " disabled>

										<input type="text" name="afegir_nota" class="afeg_nota">

										<input type='submit' name="editar" value='Editar' class="submit">
									</form>
								</span>
							<?php } ?>
						</div>
						<div class="u_text">
							<span class="u_s">
								<h3>Informacio</h3>
							</span>
							<span class="u_line">
							</span>
							<p class="u_text_p">
								<span class="u_s_t">
									Nom Curs:
								</span>
								<span class="u_s">
									<?php echo $key['nom_curs'] ?>
								</span>
							</p>
							<p class="u_text_p">
								<span class="u_s_t">
									Descripcio:
								</span>
								<span class="u_s">
									<?php echo $key['descripcio'] ?>
								</span>
							</p>
							<p class="u_text_p">
								<span class="u_s_t">
									Nota:
								</span>
								<?php
								$result = '';
								if ($key['nota'] > '0' && $key['nota'] < '5') {
									$result .= "<span class='u_s' style='color: #ff5e35; font-size: 17px; font-weight: bolder;'>" . $key['nota'] . "</span>";
								} else if ($key['nota'] >= '5' && $key['nota'] < '6') {
									$result .= "<span class='u_s'style='color: #ff5f10; font-size: 17px; font-weight: bolder;'>" . $key['nota'] . "</span>";
								} else if ($key['nota'] >= '6' && $key['nota'] < '9') {
									$result .= "<span class='u_s' style='color: #fcf84a; font-size: 17px; font-weight: bolder;'>" . $key['nota'] . "</span>";
								} else if ($key['nota'] >= '9' && $key['nota'] <= '10') {
									$result .= "<span class='u_s' style='color: #11ffbb; font-size: 17px; font-weight: bolder;'>" . $key['nota'] . "</span>";
								} else {
									$result .= "<span class='u_s' style='color: #ff5e35; font-size: 17px; font-weight: bolder;'> No hi ha nota.</span>";
								}
								echo $result;
								?>
							</p>
							<p class="u_text_p">
								<span class="u_s_t">
									Data Inici:
								</span>
								<span class="u_s">
									<?php echo $key['data_inici'] ?>
								</span>
							</p>
							<p class="u_text_p">
								<span class="u_s_t">
									Data Final:
								</span>
								<span class="u_s">
									<?php echo $key['data_final'] ?>
								</span>
							</p>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<?php
if ($succesful = !'') {
	echo $succesful;
}
?>
<div class="contenidor">
	<a href="index.php?entrada=cursos_finalitzats_professors"><i class="fas fa-reply"><span> Pagina principal </span></i></a>
</div>