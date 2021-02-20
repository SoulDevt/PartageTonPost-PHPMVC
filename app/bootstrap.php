<?php

//charger le fichier config

require_once 'config/config.php';

//charger les librairies
// require_once 'librairies/Controller.php';
// require_once 'librairies/Core.php';
// require_once 'librairies/Database.php';

//Autoloader librairies

spl_autoload_register(function($className){
    require_once 'librairies/'.$className. '.php';
});
