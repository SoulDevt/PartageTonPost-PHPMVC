<?php

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //Get l'url explosé grâce à la methode getUrl()
        $url = $this->getUrl();

        //vérifier si l'url qui a été Get existe dans notre dossier controller et libérer la position dans l'arrat à la fin
        if (isset($url[0]) && file_exists('../app/controllers/'. ucwords($url[0]) .'.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        //s'il l'url existe, on le recupere ici sinon on require le controller par défaut(Pages)
        require_once '../app/controllers/' . $this->currentController . '.php';


        //instatiation du controller, par défaut ça sera $pages = new Pages();
        $this->currentController = new $this->currentController;

        //verification de la deuxieme partie du url explosé

        if (isset($url[1])) {
            //verifier si une methode existe dans ce controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //Get les parametres, ici array_values va seulement retourner les parametres car url[0] et url[1] ont été libéré de l'array
        $this->params = $url ? array_values($url) : [];

        //cette fonction agit comme ceci: laClass->LaMethod(Param)
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}
