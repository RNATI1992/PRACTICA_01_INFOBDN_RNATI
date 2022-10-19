<?php

    include __DIR__. '/../modelo/idiomesModel.php';

    /**
     * Administració
     */

    function checklogin_administracio()
    {
        if (isset($_POST['entrar'])) {
            $usuari_adm = $_POST['form_usuari_administracio'];
            $password_adm = $_POST['form_password_administracio'];
            $result = auth_login_administracio($usuari_adm, $password_adm);
            $incorrecte = "<div class='contenidor_2' style='background-color: #c94f60; color: #ffffff';>Has posat les credencials incorrectament! </div>";
            if ($result) {
                if (mysqli_fetch_array($result) != NULL) {
                    $_SESSION['usu_admin'] = $usuari_adm;
                    $_SESSION['pass_admin'] = $password_adm;
                    header("Refresh:0; url=index.php?entrada=pagina_administracio");
                } else {
                    include __DIR__ . '/../vista/administracio/vista_administracio.php';
                    header("Refresh:1; url=index.php?entrada=administracio");
                }
            } else {
                include __DIR__ . '/../vista/administracio/vista_administracio.php';
                header("Refresh:1; url=index.php?entrada=administracio");
            }
        } else {
            include __DIR__ . '/../vista/administracio/vista_administracio.php';
        }
    }

    /**
     * Alumnes o Professors
     */

    function checklogin(){
        if(isset($_POST['entrada'])){
            $usuari = $_POST['form_usuari'];
            $password = $_POST['form_password'];
            print_r($password);
            $incorrecte = "<div class='contenidor_2' style='background-color: #c94f60; color: #ffffff';>Has posat les credencials incorrectament! </div>";
            if(isset($_POST['radiologin'])){
                if ($_POST['radiologin'] == "alumne"){
                    $result = auth_login_alumne($usuari, $password);
                    if ($result) {
                        if (mysqli_fetch_array($result) != NULL) {
                            $_SESSION['dni'] = $usuari;
                            $_SESSION['pass'] = $password;
                            include __DIR__ . '/../vista/alumnes/vista_alumnes_principal.php'; 
                        } 
                        else {
                            echo $incorrecte;
                            header("Refresh:1; url=index.php?entrada=checklogin");
                        }
                    } 
                    else {
                        echo $incorrecte;
                        header("Refresh:1; url=index.php?entrada=checklogin");
                    }
                }
                else if($_POST['radiologin'] == "professor"){
                    $actiu = auth_actiu_professors($usuari);
                    if ($actiu == '1') {
                        $result = auth_login_professor($usuari, $password);
                        if ($result) {
                            if (mysqli_fetch_array($result) != NULL) {
                                $_SESSION['dni_professor'] = $usuari;
                                $_SESSION['pass'] = $password;
                                include __DIR__ . '/../vista/professors/vista_professors_principal.php'; 
                            }
                            else{
                                echo $incorrecte;
                                header("Refresh:1; url=index.php?entrada=checklogin");
                            }
                        }
                        else{
                            echo $incorrecte;
                            header("Refresh:1; url=index.php?entrada=checklogin");
                        }
                    }
                    else{
                        usuari_desactivat();
                        header("Refresh:1; url=index.php?entrada=checklogin");
                    }
                } 
                else {
                    $result = auth_login_administracio($usuari, $password);
                    if ($result) {
                        if (mysqli_fetch_array($result) != NULL) {
                            echo $incorrecte;
                            header("Refresh:1; url=index.php?entrada=checklogin");
                        } else {
                            echo $incorrecte;
                            header("Refresh:1; url=index.php?entrada=checklogin");
                        }
                    }
                }
            }
            else{
                echo $incorrecte;
                header("Refresh:1; url=index.php?entrada=checklogin");
            }
        }
        else{
            include __DIR__ . '/../vista/vista_pagina_principal.php';
        }
    }

    function tractament_dni($dni){
        $letter = substr($dni, -1);
        $numbers = substr($dni, 0, -1);
        $resultat = false;
        if(strlen($dni) == 9){
            if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers % 23, 1) == $letter && strlen($letter) == 1 && strlen($numbers) == 8) {
                $resultat = true;
            }
        }
        else{
            $resultat = false;
        }

        return $resultat;
    }

    function pagina_registre(){
        if(isset($_POST['registrar'])){
            $usuari= $_POST['dni_alum_form'];
            $foto_post[0] = $_FILES['foto']["tmp_name"];
            $foto_post[1] = $_FILES['foto']["name"];
            $comprovacio_dni = tractament_dni($usuari);
            if($comprovacio_dni){
                $result = comprovar_existeix_registre($usuari);
                if ($result) {
                    if (mysqli_fetch_array($result) == NULL) {
                        $afegir_foto = tractament_fitxer($foto_post);
                        $registrar = registrar($afegir_foto);
                        $_SESSION['dni'] = $_POST['dni_alum_form'];
                        $_SESSION['pass'] = $_POST['registrar'];
                        registre_succes();
                        header("Refresh:1; url=index.php?entrada=pagina_principal_alumnes");
                        // include __DIR__ . '/../vista/alumnes/vista_professors_principal.php';
                    }
                    else{
                        registre_no_succes();
                        header("Refresh:1; url=index.php?entrada=registre");
                    }
                }
                else{
                    header("Refresh:1; url=index.php?entrada=checklogin");
                }
            }
            else{
                dni_error();
                header("Refresh:5; url=index.php?entrada=registre");
            }
        }
        else{
            include __DIR__ . '/../vista/vista_registre_alumnes.php';
        }
    }

    function tractament_fitxer($foto_post){
        if($foto_post != ""){
            $idUnico = time();
            $nombreFicheroDirectorio = "img/".$idUnico . "-" . $foto_post[1];
            move_uploaded_file ($foto_post[0], $nombreFicheroDirectorio);
        }
        else{
            $nombreFicheroDirectorio = "img/avatar_mujer.png";
        }
        return $nombreFicheroDirectorio;
    }

    function sense_permissos(){
        return print_r("<div class='contenidor_2' style='background-color: #c94f60; color: #ffffff';>No tens permissos per poder veure la pàgina! </div>");
    }

    function satisfactoriament(){
        return print_r("<div class='contenidor_2' style='background-color: #63FFA6; color: black';>Proces realitzat correctament! </div>");
    }

    function registre_succes(){
        return print_r("<div class='contenidor_2' style='background-color: #63FFA6; color: black';>Has creat el teu usuari satisfactoriament! </div>");
    }

    function registre_no_succes(){
        return print_r("<div class='contenidor_2' style='background-color: #c94f60; color: black';>Aquest usuari ja existeix, torna a possar les credencials! </div>");
    }

    function requeriments(){
        return print_r("<div class='contenidor_2' style='background-color: #c94f60; color: black';>Has de seleccionar o be si ets Professor o Alumne! </div>");
    }

    function desactivat_succes(){
        return print_r("<div class='contenidor_2' style='background-color: #63FFA6; color: black';>Has desactivat correctament! </div>");
    }

    function activat_succes()
    {
        return print_r("<div class='contenidor_2' style='background-color: #63FFA6; color: black';>Has activat correctament! </div>");
    }

    function usuari_desactivat(){
        return print_r("<div class='contenidor_2' style='background-color: #c94f60; color: black';>Aquest usuari esta deactivat! </div>");
    }

    function dni_error(){
        return print_r("<div class='contenidor_2' style='background-color: #c94f60; color: black';> <p>Has possat el DNI incorrectament </p><br><p style='color: #63FFA6'>Exemple: 73547889<span style='color: white'>F</span></p></div>");
    }

    function data_avui(){
        $data = new DateTime();

        $dia = $data->format('d');

        $mes = $data->format('m');

        $any = $data->format('Y');

        $avui = $any . "-" . $mes . "-" . $dia;

        return $avui;
    }


    function pagina_administracio(){
        if (isset($_SESSION['usu_admin'])) {
            include __DIR__ . '/../vista/administracio/vista_administracio_decision.php'; 
        }
        else{
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=administracio");
        }
    }

    function pagina_principal_curso(){
        if (isset($_SESSION['usu_admin'])) {
            $resultado = cursos();
            include __DIR__ . '/../vista/administracio/cursos/vista_administracio_gestio_cursos.php';
        }
        else{
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=administracio");
        }
    }


    /**
     * CRUD CURSOS
     */
    function afegir_curso(){
        if (isset($_SESSION['usu_admin'])) {
            $incorrecte = "<div class='contenidor_2' style='background-color: #c94f60; color: #ffffff';> La data que has possat es inferior a la data d'avui!! </div>";
            $professors = "";
            $resultado = cursos();
            $avui = data_avui();

            if(isset($_POST['afegir'])){
                // print_r($resultado_professors);
                if($_POST['data_inici_afegir'] >= $avui){
                    $resultado_afegir_cursos = afegir_cursos_administracio();
                    satisfactoriament();
                    header("Refresh:1; url=index.php?entrada=pagina_principal_cursos");
                }
                else{
                    include __DIR__ . '/../vista/administracio/cursos/vista_afegir_cursos.php';
                }
            } 
            else if (isset($_GET['retorno']) == "si") {
                include __DIR__ . '/../vista/administracio/cursos/vista_administracio_gestio_cursos.php';
            } 
            else{
                $resultado_professors = professors_disponibles();
                foreach ($resultado_professors as $row) {
                    $professors .= '<option value=' . $row['dni_prof'] . '> ' . $row['dni_prof'] . ' => ' . $row['nom_professor'] . '</option>';
                }
                include __DIR__ . '/../vista/administracio/cursos/vista_afegir_cursos.php';
            }
        }
        else{
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=administracio");
        }
    }

    function cercar_curs(){
        if (isset($_SESSION['usu_admin'])) {
            if(isset($_POST['cercar']) && $_POST['cercar_cursos'] != " "){
                $cercar = $_POST['cercar_cursos'];

                $resultado = buscar_curso_general($cercar);
                include __DIR__ . '/../vista/administracio/cursos/vista_administracio_gestio_cursos.php';
            }
            else{
                include __DIR__ . '/../vista/administracio/cursos/vista_administracio_gestio_cursos.php';
            }
        }
        else if (isset($_SESSION['dni_professor'])) {
            if (isset($_POST['cercar']) && $_POST['cercar_cursos'] != " ") {
                $cercar = $_POST['cercar_cursos'];

                $resultado = buscar_curso($cercar);
                include __DIR__ . '/../vista/professors/vista_professors_taula_alumnes.php';
            } else {
            include __DIR__ . '/../vista/professors/vista_professors_taula_alumnes.php';
            }
        } 
        else if (isset($_SESSION['dni'])) {
            if (isset($_POST['cercar']) && $_POST['cercar_cursos'] != " ") {
                $cercar = $_POST['cercar_cursos'];
                $num = intVal($_GET['numero']);
                print_r("<pre>");
                var_dump($num);

                if($num == 1){
                    echo "hola 1";
                    $resultado = buscar_curso_general($cercar);
                    include __DIR__ . '/../vista/alumnes/vista_alumnes_cursos_disponibles.php';
                }
                else if($num == 2){
                    echo "hola 2";
                    $resultado = buscar_curso_general($cercar);
                    include __DIR__ . '/../vista/alumnes/vista_alumnes_cursos_desactivar.php';
                }
                else if($num == 3){
                    echo "hola 3";
                    $resultado = buscar_curso_general($cercar);
                    include __DIR__ . '/../vista/alumnes/vista_alumnes_cursos_taula_notes.php';
                }
            } else {
                include __DIR__ . '/../vista/alumnes/vista_alumnes_cursos_disponibles.php';
            }
        }
        else{
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=administracio");
        }
    }

    function editar_curso(){
        if (isset($_SESSION['usu_admin'])) {
            $curs_seleccionat = $_GET['fila'];
            $resultado_cursos = curs_seleccionat($curs_seleccionat);

            $cursos = "";
            if (isset($_POST['editar'])) {
                $resultado = cursos();
                $curs_seleccionat = $_GET['fila'];
                $editar_cursos = editar_cursos_administracio($curs_seleccionat);
                //include __DIR__ . '/../vista/administracio/cursos/vista_administracio_gestio_cursos.php';
                header("Refresh:1; url=index.php?entrada=pagina_principal_cursos");
            } 
            else if (isset($_GET['retorno']) == "si") {

                include __DIR__ . '/../vista/administracio/professors/vista_administracio_gestio_professors.php';
            } 
            else{
                foreach ($resultado_cursos as $row) {
                    $cursos .= '<option value=' . $row['idCurso'] . '>' . $row['nom_curs'] . '</option>';
                    $descripcio = $row['descripcio'];
                    $hores = $row['horas'];
                    $data_inici = $row['data_inici'];
                    $data_final = $row['data_final'];
                }
                $resultado_professors = professors_disponibles_actius();
                $professors = "";

                foreach ($resultado_professors as $row) {
                    $professors .= '<option value='.$row['dni_prof'].'> ' . $row['dni_prof'] . ' => ' . $row['nom_professor'] . '</option>';
                }
                include __DIR__ . '/../vista/administracio/cursos/vista_editar_cursos.php';
            }
        } 
        else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=administracio");
        }
    }

    function desactivar_cursos(){
        $curs_desactivat = desa_curs($_GET['fila']);
        desactivat_succes();
        header("Refresh:1; url=index.php?entrada=pagina_principal_cursos");
    }

    function activar_cursos(){
        $curs_activat = activar_curs($_GET['fila']);
        print_r(activat_succes());
        header("Refresh:1; url=index.php?entrada=pagina_principal_cursos");
    }

    /**
     * Gestió de Professors
     */

    function pagina_principal_professors(){
        if (isset($_SESSION['usu_admin'])) {
            $resultado = professors_disponibles();
            include __DIR__ . '/../vista/administracio/professors/vista_administracio_gestio_professors.php';
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=administracio");
        }
    }

    function cercar_professor()
    {
        if (isset($_SESSION['usu_admin'])) {
            if (isset($_POST['cercar']) && $_POST['cercar_professors'] != "") {
                $cercar = $_POST['cercar_professors'];
                $resultado = buscar_professor($cercar);
                include __DIR__ . '/../vista/administracio/professors/vista_administracio_gestio_professors.php';
            } else {
                include __DIR__ . '/../vista/administracio/professors/vista_administracio_gestio_professors.php';
            }
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=administracio");
        }
    }

    function afegir_professors(){
        if (isset($_SESSION['usu_admin'])) {
            $incorrecte = "<div class='contenidor_2' style='background-color: #c94f60; color: #ffffff';> La data que has possat es inferior a la data d'avui!! </div>";
            $resultado = professors_disponibles();
            if (isset($_POST['afegir'])) {
                $professor = $_POST['dni_professors_afegir'];
                $result = comprovar_existeix_professor($professor);
                $comprovacio_dni = tractament_dni($professor);
                if ($comprovacio_dni) {
                    if ($result) {
                        if (mysqli_fetch_array($result) == NULL) {
                            $foto_post[0] = $_FILES['foto']["tmp_name"];
                            $foto_post[1] = $_FILES['foto']["name"];
                            $afegir_foto = tractament_fitxer($foto_post);
                            $resultado_afegir_cursos = afegir_professors_administracio($afegir_foto);
                            registre_succes();
                            header("Refresh:1; url=index.php?entrada=pagina_principal_professors");
                        } else {
                            registre_no_succes();
                            header("Refresh:1; url=index.php?entrada=afegir_professors");
                        }
                    }
                    else{
                        registre_no_succes();
                        header("Refresh:1; url=index.php?entrada=afegir_professors");
                    }
                } 
                else {
                    dni_error();
                    header("Refresh:5; url=index.php?entrada=registre");
                }
            } 
            else if(isset($_GET['retorno']) == "si"){
                include __DIR__ . '/../vista/administracio/professors/vista_administracio_gestio_professors.php';
            }
            else {
                include __DIR__ . '/../vista/administracio/professors/vista_afegir_professors.php';
            }
        }
        else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=administracio");
        }
    }

    function editar_professors(){
        if (isset($_SESSION['usu_admin'])) {
            if(isset($_POST['editar'])){
            // foto_professors_editar
                $foto_post[0] = $_FILES['foto']["tmp_name"];
                $foto_post[1] = $_FILES['foto']["name"];
                $afegir_foto = tractament_fitxer($foto_post);
                $update_prof = editar_professors_administracio($_GET['dni'], $afegir_foto);
                satisfactoriament();
                header("Refresh:1;url=index.php?entrada=pagina_principal_professors");
            } 
            else if (isset($_GET['retorno']) == "si") {
                include __DIR__ . '/../vista/administracio/professors/vista_administracio_gestio_professors.php';
            }
            else{
                $professors = "";
                $resultado_professors = professor_seleccionado($_GET['fila']);
                foreach ($resultado_professors as $row) {
                    $professors .= '<option value=' . $row['dni_prof'] . '> ' . $row['dni_prof'] . ' => ' . $row['nom_professor'] . '</option>';
                    $dni_prof = $row['dni_prof'];
                    $nom_professor = $row['nom_professor'];
                    $cognom_professor = $row['cognom_professor'];
                    $titol_academic = $row['titol_academic'];
                    $fotografia = $row['fotografia'];
                    $sexe = $row['sexe'];
                }
                include __DIR__ . '/../vista/administracio/professors/vista_editar_professors.php';
            }
        }
        else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=administracio");
        }
    }

    function desactivar_professors(){
        $profe_desactivat = desa_profe($_GET['fila']);
        print_r(desactivat_succes());
        header("Refresh:1; url=index.php?entrada=pagina_principal_professors");
    }

    function activar_professors(){
        $profe_activat = activar_profe($_GET['fila']);
        print_r(activat_succes());
        header("Refresh:1; url=index.php?entrada=pagina_principal_professors");
    }

    /**
     * Alumnes
     */

    function pagina_principal_alumne(){
        if (isset($_SESSION['dni'])) {
            include __DIR__ . '/../vista/alumnes/vista_alumnes_principal.php';
        }
        else{
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }

    function cursos_disponibles_alumne(){
        if (isset($_SESSION['dni'])) {
            $avui = data_avui();
            $usuari = $_SESSION['dni'];
            $resultado = cursos_disponibles($avui, $usuari);
       
            if(isset($_GET['fila'])){
                $curs = $_GET['fila'];
                $result = existe_matricula($usuari);
                
                if ($result) {
                    $testAurena = mysqli_fetch_array($result);
                    // print("<pre>");
                    // var_dump($testAurena);
                    // print("</pre>");
                    if ($testAurena == NULL) {
                        $afeg_mattricula = afegir_matricula($curs, $usuari);
                        $succesful = satisfactoriament();
                        $resultado = cursos_disponibles($avui, $usuari);
                        registre_succes();
                        header("Refresh:1; url=index.php?entrada=cursos_disponibles_alumnes");
                    } else {
                        $act_matricula = actualitzar_matricula($curs);
                        activat_succes();
                        header("Refresh:1; url=index.php?entrada=cursos_disponibles_alumnes");
                    }
                }
                header("Refresh:1; url=index.php?entrada=cursos_disponibles_alumnes");
            }
            else{
                include __DIR__ . '/../vista/alumnes/vista_alumnes_cursos_disponibles.php';
            }
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }

    function desactivar_cursos_alumne(){
        if (isset($_SESSION['dni'])) {
            $usuari = $_SESSION['dni'];
            
            if(isset($_GET['fila'])){
                $curs_seleccionat = $_GET['fila'];
                $desactivar_matricula = desactivar_matricula($curs_seleccionat);
                $succesful = satisfactoriament();
                $resultado = baixa_cursos($usuari);
                header("Refresh:1; url=index.php?entrada=desactivar_cursos_alumnes");
            }
            else{
                $resultado = baixa_cursos($usuari);
            }
            include __DIR__ . '/../vista/alumnes/vista_alumnes_cursos_desactivar.php';
        

        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }

    function taula_notes_alumne(){
        if (isset($_SESSION['dni'])) {
            $usuari = $_SESSION['dni'];
            $resultado = taula_notes($usuari);
            include __DIR__ . '/../vista/alumnes/vista_alumnes_cursos_taula_notes.php';
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }

    /**
     * Professors
     */

    function pagina_principal_professor(){
        if (isset($_SESSION['dni_professor'])) {
            include __DIR__ . '/../vista/professors/vista_professors_principal.php';
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }

    function cursos_imparteixen_professor(){
        if (isset($_SESSION['dni_professor'])) {
            $professor = $_SESSION['dni_professor'];
            $resultado = cursos_imparteixes($professor);
            // $num_alum = num_alumnes();
            // header("Refresh:1; url=index.php?entrada=cursos_imparteixen_professors");
            include __DIR__ . '/../vista/professors/vista_professors_cursos_imparteixes.php';
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }

    function curs_seleccionat_professor(){
        if (isset($_SESSION['dni_professor'])) {
            $professor = $_SESSION['dni_professor'];
            $curso = $_GET['id_curso'];
            $resultado = curs_taula_alumnes($professor, $curso);
            // $num_alum = num_alumnes();
            include __DIR__ . '/../vista/professors/vista_professors_taula_alumnes.php';
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }

    function cursos_finalitzats(){
        if (isset($_SESSION['dni_professor'])) {
            $data_avui = data_avui();
            $professor = $_SESSION['dni_professor'];
            $resultado = cursos_finalitzats_sql($professor, $data_avui);
            include __DIR__ . '/../vista/professors/vista_professors_cursos_finalitzats.php';
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }

    function cursos_notes_professor(){
        if (isset($_SESSION['dni_professor'])) {
            $data_avui = data_avui();
            $professor = $_SESSION['dni_professor'];
            if(isset($_GET['id_curso'])){
                $curs = $_GET['id_curso'];
                $resultado = notes_cursos($professor, $curs, $data_avui);
                include __DIR__ . '/../vista/professors/vista_professors_curs_nota.php';
            }
            else{
                $resultado = cursos_imparteixes($professor);
                include __DIR__ . '/../vista/professors/vista_professors_cursos_finalitzats.php';
            }
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }


    function update_alumnes_note(){
        if (isset($_SESSION['dni_professor'])) {
            $data_avui = data_avui();
            $professor = $_SESSION['dni_professor'];
            $curso = $_GET['fila'];
            if (isset($_POST['afegir'])) {
                $curs = $_GET['fila'];
                $alumne = $_GET['alumne'];
                $nota = $_POST['afegir_nota'];
                $afeg_nota = afegir_nota_alumne($alumne, $curs, $nota);
                $resultado = notes_cursos($professor, $curso, $data_avui);
                include __DIR__ . '/../vista/professors/vista_professors_curs_nota.php';
            }else if(isset($_POST['editar'])){
                $curs = $_GET['fila'];
                $alumne = $_GET['alumne'];
                $nota = $_POST['afegir_nota'];
                $afeg_nota = afegir_nota_alumne($alumne, $curs, $nota);
                $resultado = notes_cursos($professor, $curso, $data_avui);
                include __DIR__ . '/../vista/professors/vista_professors_curs_nota.php';
            }
            else {
                $resultado = notes_cursos($professor, $curso, $data_avui);
                include __DIR__ . '/../vista/professors/vista_professors_curs_nota.php';
            }
        } else {
            sense_permissos();
            header("Refresh:1; url=index.php?entrada=checklogin");
        }
    }

    // function cercar_alumnes_curs(){
    //     if (isset($_SESSION['dni_professor'])) {
    //         if (isset($_POST['cercar']) && $_POST['cercar_alumne'] != " ") {
    //             $cercar = $_POST['cercar_alumne'];
    //             // $curso = $_GET['fila'];
    //             $resultado = cercar_persona_taula($cercar);
    //             print_r($resultado);
    //             include __DIR__ . '/../vista/professors/vista_professors_curs_nota.php';
    //         } else {
    //             include __DIR__ . '/../vista/professors/vista_professors_curs_nota.php';
    //         }
    //     } 
    //     else {
    //         sense_permissos();
    //         header("Refresh:1; url=index.php?entrada=checklogin");
    //     }
    // }



    function tancar_sessio(){
        if(isset($_SESSION['usu_admin'])){
            $sessio_administracio = $_SESSION['usu_admin'];
            session_destroy();
            header("Refresh:0; url=index.php?entrada=administracio");
        }
        else{
            session_destroy();
            header("Refresh:0; url=index.php?entrada=checklogin");
        }
    }
