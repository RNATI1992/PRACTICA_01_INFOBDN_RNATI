<div class="contenidor_administracio">
    <h2> Cursos Disponibles</h2>
    <div class="busca_afegeix">
        <form action='index.php?entrada=cercar_curs&numero=3' enctype="multipart/form-data" method='post' class="excepcion">
            <div class="cercar">
                <label> CERCAR CURS:<input type="text" name="cercar_cursos" placeholder="Posa el nom del curs" /></label>
                <label><input type='submit' name="cercar"></label>
            </div>
        </form>
    </div>
    <section class="wrapper">
        <!-- Row title -->
        <main class="row2 title">
            <ul class="th">
                <li>Nom Curs</li>
                <li>Descripcio</li>
                <li>Hores</li>
                <li>Data Inici</li>
                <li>Data Final</li>
                <li>Nota</li>
            </ul>
        </main>
        <!-- Row 1 - fadeIn -->
        <?php foreach ($resultado as $key) {
            if ($key['actiu'] == FALSE) { ?>
                <section class="row2-fadeIn-wrapper">
                    <article class="row2 nfl">
                        <ul>
                            <li><?php echo $key['nom_curs'] ?></li>
                            <li><?php echo $key['descripcio'] ?></li>
                            <li><?php echo $key['horas'] ?></li>
                            <li><?php echo $key['data_inici'] ?></li>
                            <li><?php echo $key['data_final'] ?></li>
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
                                $result .= "<li class='u_s' style='color: #ff5e35; font-size: 17px; font-weight: bolder;'> No hi ha nota.</li>";
                            }
                            echo $result;
                            ?>
                        </ul>
                    </article>
                </section>
        <?php }
        } ?>
    </section>
</div>
<?php
if ($succesful = !'') {
    echo $succesful;
}
?>
<div class="contenidor">
    <a href="index.php?entrada=pagina_principal_alumnes"><i class="fas fa-reply"><span> Pagina principal </span></i></a>
</div>