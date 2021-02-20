<?php

    // Chargement des models et des views

    class Controller {
        //Chargement d'un model
        public function model($model) {
            require_once '../app/models/' . $model . '.php';

            //instantier le model

            return new $model;
            
        }

        //chargement du view

        public function view($view, $data = []) {
            //verification du view
            if( file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die('View non trouvé');
            }
        }
    }