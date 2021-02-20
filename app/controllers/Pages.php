<?php 
    class Pages extends Controller {
        public function __construct() {
            
        }

        public function index() {
            $data = [
                'title' => 'SouleyBlog',
                'description' => 'Réseau social créé à partir du Framework SouleyMVC'
            ];


            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'A Propos',
                'description' => 'Ceci est une Application permettant de partager des posts'
            ];
            $this->view('pages/about', $data);
        }
        
    }