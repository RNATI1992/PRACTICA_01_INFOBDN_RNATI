<?php

    /**
     * Conexio base dades
     */
    function conectar(){
        $conexion = new mysqli("localhost", "root", "", "infobdn");
        if (!$conexion) {
            set_error_handler("conexion");
            print("Error en la base de dades. Error: " . mysqli_connect_errno() . " - " . $conexion->connect_error);
        }
        return $conexion;
    }


    /**
     * Validacio login
     */
    function auth_login_alumne($usuari, $password){
        //utilizaremos this por que esta en la misma clase
        $query = "SELECT * FROM alumnes WHERE dni_alumne = '$usuari' AND pass ='" . md5($password) . "'";

        $result = mysqli_query(conectar(), $query);
       
        return $result;
    }

    function auth_login_professor($usuari, $password){
        //utilizaremos this por que esta en la misma clase
        $query = "SELECT * FROM professors WHERE dni_prof = '$usuari' AND pass = '" . md5($password) . "'";

        $result = mysqli_query(conectar(), $query);

        return $result;
    }

    function auth_actiu_alumne($usuari){
        $query = "SELECT * FROM alumnes WHERE actiu = '1' and dni_alumne = '$usuari'";

        $result = mysqli_query(conectar(), $query);

        $actiu = '';
        foreach ($result as $key) {
            $actiu = $key['actiu'];
        }

        return $actiu;
    }

    function auth_actiu_professors($usuari){
        $query = "SELECT * FROM professors WHERE actiu = '1' and dni_prof = '$usuari'";

        $result = mysqli_query(conectar(), $query);

        $actiu = '';
        foreach ($result as $key) {
            $actiu = $key['actiu'];
        }

        return $actiu;
    }

    /**
     * Registre 
     */

    function comprovar_existeix_registre($usuari){
        $query = " SELECT * FROM alumnes WHERE dni_alumne = '$usuari'";

        $result = mysqli_query(conectar(), $query);

        return $result;
    }

    function registrar($foto){
        $query = "INSERT INTO alumnes (dni_alumne, nom, cognom, pass, edat, fotografia, sexe) VALUES ('$_POST[dni_alum_form]', '$_POST[nom_alum_form]', '$_POST[cognom_alum_form]', '" . md5($_POST['pass_alum_form']) . "', '$_POST[edat_alum_form]', '$foto', '$_POST[radiologin]')";

        $result = mysqli_query(conectar(), $query);

        return $result;
    }

    /**
     * Validacio adimnistracio
     */
    function auth_login_administracio($usuari, $password){
        //utilizaremos this por que esta en la misma clase
        $query = "SELECT * FROM administracio WHERE dni = '$usuari' AND pass ='".md5($password)."';";

        $result = mysqli_query(conectar(), $query);
       
        return $result;
    }

    /******************************************* */

    /**
     * Gestio Cursos
     */

    function cursos(){
        $query = "SELECT * FROM cursos";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function professors_disponibles(){
        $query = "SELECT * FROM professors";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function professors_disponibles_actius(){
        $query = "SELECT * FROM professors WHERE actiu = '1'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    /**
     * Afegir Cursos
     */

    function afegir_cursos_administracio(){
        $query = "INSERT INTO cursos (nom_curs, descripcio, horas, data_inici, data_final, dni_prof) 
        VALUES ('$_POST[nom_curs_afegir]', '$_POST[descripcio_curs_afegir]', '$_POST[hores_curs_afegir]', '$_POST[data_inici_afegir]', '$_POST[data_final_afegir]', '$_POST[dni_professora_afegir]')";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    /**
     * Buscar Cursos
     */

    function buscar_curso($cercar){
        $query = "SELECT * FROM alumnes AS a INNER JOIN matricula AS m ON a.dni_alumne = m.dni_alum INNER JOIN cursos AS c ON  m.idCurso = c.idCurso WHERE c.nom_curs like '%$cercar%'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function buscar_curso_general($cercar)
    {
        $query = "SELECT * FROM cursos WHERE nom_curs like '%$cercar%'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    /**
     * Editar Cursos
     */

    function curs_seleccionat($curs_seleccionat){
        $query = "SELECT * FROM cursos WHERE idCurso = $curs_seleccionat";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function editar_cursos_administracio($curs_seleccionat){
        $query = "UPDATE cursos SET descripcio='$_POST[descripcio_curs_editar]', horas='$_POST[hores_curs_editar]', data_inici='$_POST[data_inici_editar]', data_final='$_POST[data_final_editar]', dni_prof='$_POST[dni_professora_editar]' WHERE idCurso= $curs_seleccionat";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function desa_curs($curs_seleccionat){
        $query = "UPDATE cursos SET actiu='0' WHERE idCurso= $curs_seleccionat";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function activar_curs($curso_seleccionat)
    {
        $query = "UPDATE cursos SET actiu = '1' WHERE idCurso = '$curso_seleccionat'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    /***************************************** */


    /* Gestio Professors */

    function informacio_cursos_professor(){
        $query = "SELECT * FROM cursos AS c RIGHT JOIN professors AS p ON c.dni_prof=p.dni_prof GROUP BY c.dni_prof";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function llista_cursos_imparteixen($dni){
        $query = "SELECT * FROM cursos WHERE dni_prof = '$dni'";

        $conectar_query = mysqli_query(conectar(), $query);
        print_r($conectar_query);

        return $conectar_query;
    }

    function buscar_professor($cercar){
        $query = "SELECT * FROM professors WHERE nom_professor like '%$cercar%'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function comprovar_existeix_professor($usuari)
    {
        $query = " SELECT * FROM professors WHERE dni_prof = '$usuari'";

        $result = mysqli_query(conectar(), $query);

        return $result;
    }

    function afegir_professors_administracio($foto){
        $query = "INSERT INTO professors (dni_prof, nom_professor, cognom_professor, pass, titol_academic, fotografia, actiu) 
            VALUES ('$_POST[dni_professors_afegir]', '$_POST[nom_professors_afegir]', '$_POST[cognom_professors_afegir]', '" . md5($_POST['password_professors_afegir']) . "', '$_POST[titol_professors_afegir]', '$foto', TRUE)";

        $conectar_query = mysqli_query(conectar(), $query);

        echo $query;

        return $conectar_query;
    }

    // function professor_seleccionadoK($curs_Seleccionat){
    //     $query = "SELECT * FROM cursos AS c RIGHT JOIN professors AS p ON c.dni_prof=p.dni_prof WHERE idCurso = '$curs_Seleccionat'";

    //     $conectar_query = mysqli_query(conectar(), $query);

    //     foreach ($conectar_query as $key) {
    //         print_r($key);
    //     }

    //     return $conectar_query;
    // }

    function professor_seleccionado($curs_Seleccionat){
        $query = "SELECT * FROM professors WHERE dni_prof = '$curs_Seleccionat'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function editar_professors_administracio($professor_seleccionat, $foto){
        $query = "UPDATE professors SET nom_professor='$_POST[nom_professors_editar]', cognom_professor='$_POST[cognom_professors_editar]', titol_academic='$_POST[titol_professors_editar]', fotografia='$foto' WHERE dni_prof= '$professor_seleccionat'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function desa_profe($profe_seleccionat)
    {
        $query = "UPDATE professors SET actiu ='0' WHERE dni_prof= '$profe_seleccionat'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function activar_profe($profe_seleccionat)
    {
        $query = "UPDATE professors SET actiu ='1' WHERE dni_prof= '$profe_seleccionat'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    /**
     * Alumnes
     */

    function cursos_disponibles($data_avui, $usuari){

        $query = "SELECT * FROM cursos AS c WHERE c.data_inici >= '$data_avui' AND c.actiu = 1 AND c.idCurso NOT IN (SELECT m.idCurso FROM matricula AS m WHERE m.dni_alum = '$usuari' AND m.actiu = 1)";

        // var_dump($query);
        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function existe_matricula($usuari){
        $query = "SELECT * FROM matricula WHERE dni_alum = '$usuari'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function actualitzar_matricula($curs_seleccionat)
    {
        $query = "UPDATE matricula SET actiu = 1 WHERE idCurso = '$curs_seleccionat'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }


    function afegir_matricula($curs, $usuari){

        $query = "INSERT INTO matricula (idCurso, dni_alum) VALUES ('$curs', '$usuari')";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }


    function baixa_cursos($usuari){
        $query = "SELECT * FROM cursos AS c INNER JOIN matricula AS m ON  c.idCurso = m.idCurso WHERE m.dni_alum = '$usuari'";

        $conectar_query = mysqli_query(conectar(), $query);
        
        return $conectar_query;
    }


    function desactivar_matricula($curs_seleccionat){
        $query = "UPDATE matricula SET actiu=0, nota='' WHERE idCurso = '$curs_seleccionat'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function taula_notes($usuari){
        $query = "SELECT * FROM cursos AS c INNER JOIN matricula AS m ON  c.idCurso = m.idCurso WHERE m.dni_alum = '$usuari' AND  m.actiu = 1 AND c.actiu = 1";
        // var_dump($query);
        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    /**
     * Professors
     */

    function cursos_imparteixes($professor){
        $query = "SELECT * FROM cursos WHERE dni_prof = '$professor' AND actiu = 1";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    // function num_alumnes(){
    //     $query = "SELECT count(dni_alum) FROM matricula WHERE idCurso = (SELECT idCurso FROM cursos)";

    //     $conectar_query = mysqli_query(conectar(), $query);

    //     return $conectar_query;
    // }

    function curs_taula_alumnes($professor, $curso){
        $query = "SELECT * FROM alumnes AS a INNER JOIN matricula AS m ON a.dni_alumne = m.dni_alum INNER JOIN cursos AS c ON  m.idCurso = c.idCurso WHERE c.dni_prof = '$professor' AND m.idCurso = '$curso'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function cursos_finalitzats_sql($professor, $data_avui){
        $query = "SELECT * FROM cursos AS c INNER JOIN matricula AS m ON  c.idCurso = m.idCurso WHERE c.dni_prof = '$professor' AND c.data_final < '$data_avui' AND c.actiu = 1 GROUP BY m.idCurso";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    function notes_cursos($professor, $curso, $data_avui){
        $query = "SELECT * FROM alumnes AS a INNER JOIN matricula AS m ON a.dni_alumne = m.dni_alum INNER JOIN cursos AS c ON  m.idCurso = c.idCurso WHERE c.dni_prof = '$professor' AND m.idCurso = '$curso' AND c.data_final < '$data_avui'";

        $conectar_query = mysqli_query(conectar(), $query);
    
        return $conectar_query;
    }

    function afegir_nota_alumne($alumne, $curso, $nota){
        $query = "UPDATE matricula SET nota=$nota WHERE dni_alum = '$alumne' AND idCurso = '$curso'";

        $conectar_query = mysqli_query(conectar(), $query);

        return $conectar_query;
    }

    // function cercar_persona_taula($cercar){
    //     $query = "SELECT * FROM alumnes AS a INNER JOIN matricula AS m ON a.dni_alumne = m.dni_alum INNER JOIN cursos AS c ON  m.idCurso = c.idCurso WHERE a.nom like '%$cercar%' AND c.dni_prof = '$_SESSION[dni_professor]'";

    //     $conectar_query = mysqli_query(conectar(), $query); 

    //     print_r($conectar_query);

    //     return $conectar_query;
    // }