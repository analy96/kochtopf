<?php

require_once 'model/UserModel.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userModel = new UserModel();

        $view = new View('registrieren_index');
        $view->title = 'Login';
        $view->heading = 'registrieren';
        $view->display();
    }

    public function create()
    {
        $view = new View('user_create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    public function doCreate()
    {
            $benutzername = $_POST['benutzername'];
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $email = $_POST['email'];
            $alter = $_POST['alter'];
            $geschlecht = (isset($_POST['geschlecht'])) ? $_POST['geschlecht'] : "";
            $passwort = $_POST['passwort'];

            $emailregex = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
            $pwregex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/';
            $ok = false;

            if(strlen($benutzername) > 2){
              if(UserModel::checkUsername($benutzername) == true){
                if(strlen($vorname) > 1 && strlen($nachname) > 1){
                  if (preg_match($emailregex, $email)) {
                    if (preg_match($pwregex, $passwort)) {
                      $ok = true;
                    }
                  }
                }
              }
            }

            if($ok == false){
              $this->index();
            }else{
              $userModel = new UserModel();
              $userModel->create($benutzername, $vorname, $nachname, $email, $alter, $geschlecht, $passwort);
              // Anfrage an die URI /user weiterleiten (HTTP 302)
              header('Location: /home');
            }
    }

    public function delete()
    {
        $userModel = new UserModel();
        $userModel->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
