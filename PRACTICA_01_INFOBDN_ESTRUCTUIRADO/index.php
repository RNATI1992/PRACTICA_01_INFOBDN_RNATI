<?php
session_start();

include __DIR__. '/controlador/formularicontrolador.php';
include __DIR__ . '/vista/header-footer/vista_head.php';

if (!conectar()) {
    print("No se ha podido cargar la base de datos.");
}
else{
    if (!isset($_GET['entrada'])) { //mira si esta vacia o no
        checklogin();
    } else {
        switch ($_GET['entrada']) {
            /**
             * Pagina_principal
             */
            case 'registre':
                pagina_registre();
                break;
            case 'checklogin':
                checklogin();
                break;
            case 'administracio':
                checklogin_administracio();
                break;
            case 'pagina_administracio':
                pagina_administracio();
                break;
            /**
             * admini. Cursos
             */
            case 'pagina_principal_cursos':
                pagina_principal_curso();
                break;
            case 'afegir_cursos':
                afegir_curso();
                break;
            case 'cercar_curs':
                cercar_curs();
                break;
            case 'editar_cursos':
                editar_curso();
                break;
            case 'desactivar_cursos':
                desactivar_cursos();
                break;
            case 'activar_cursos':
                activar_cursos();
                break;
            /**
             * admini. professors
             */
            case 'pagina_principal_professors':
                pagina_principal_professors();
                break;
            case 'afegir_professors':
                afegir_professors();
                break;
            case 'cercar_professors':
                cercar_professor();
                break;
            case 'editar_professors':
                editar_professors();
                break;
            case 'desactivar_professors':
                desactivar_professors();
                break;
            case 'activar_professors':
                activar_professors();
                break;
            /**
             * Alumne
             */
            case 'pagina_principal_alumnes':
                pagina_principal_alumne();
                break;
            case 'cursos_disponibles_alumnes':
                cursos_disponibles_alumne();
                break;
            case 'desactivar_cursos_alumnes':
                desactivar_cursos_alumne();
                break;
            case 'taula_notes_alumnes':
                taula_notes_alumne();
                break;
            /**
             * Professors
             */
            case 'cursos_pagina_principal_professors':
                pagina_principal_professor();
                break;
            case 'cursos_imparteixen_professors':
                cursos_imparteixen_professor();
                break;
            case 'curs_seleccionat_professors':
                curs_seleccionat_professor();
                break;
            case 'cursos_finalitzats_professors':
                cursos_finalitzats();
                break;
            case 'cursos_notes_professors':
                cursos_notes_professor();
                break;
            case 'update_alumnes_notes':
                update_alumnes_note();
                break;
            // case 'cercar_alumnes_curs':
            //     cercar_alumnes_curs();
            //     break;
            case 'sortir':
                tancar_sessio();
                break;
        }
    }
}
include __DIR__ . '/vista//header-footer/vista_footer.php';