<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        //verifier si c'est une method POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //verifier le POST reçu

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //initialisation des datas
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //valider l'email

            if (empty($data['email'])) {
                $data['email_err'] = 'Veuillez SVP entrer un email';
            } else {
                // verifier email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Cet email est déjà pris';
                }
            }

            //valider le nom
            if (empty($data['name'])) {
                $data['name_err'] = 'Veuillez SVP entrer votre nom';
            }

            //valider le password
            if (empty($data['password'])) {
                $data['password_err'] = 'Veuillez SVP entrer un mot de passe';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'le mot de passe doit au moins faire 6 caractères';
            }


            //check le confirm passwordd
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Veuillez confirmer le mot de passe';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = ' les mot de passe ne sont pas les mêmes';
                }
            }

            //verifier que tous les champs erreurs sont vides avant de valider
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                die('success');
            } else {
                //charger la view avec les erreurs
                $this->view('users/register', $data);
            }
        } else {
            // Init les data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password' => '',
                'confirm_password_err' => ''
            ];

            // charger le view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //verifier si c'est une method POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //initialisation des datas
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            //valider l'email

            if (empty($data['email'])) {
                $data['email_err'] = 'Veuillez SVP entrer un email';
            }

            //valider le password
            if (empty($data['password'])) {
                $data['password_err'] = 'Veuillez SVP entrer un mot de passe';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'le mot de passe doit au moins faire 6 caractères';
            }

            //verifier que tous les champs erreurs sont vides avant de valider
            if (empty($data['email_err']) && empty($data['password_err'])) {
                die('success');
            } else {
                //charger la view avec les erreurs
                $this->view('users/login', $data);
            }
        } else {
            // Init les data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // charger le view
            $this->view('users/login', $data);
        }
    }
}
