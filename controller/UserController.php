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
            $geschlecht = 'm';//$_POST['geschlecht'];
            $passwort = $_POST['passwort'];

            $userModel = new UserModel();
            $userModel->create($benutzername, $vorname, $nachname, $email, $alter, $geschlecht, $passwort);
        
		
        echo $_SESSION['userid'];
        echo $_POST['geschlecht'];
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /home');
    }

    public function delete()
    {
        $userModel = new UserModel();
        $userModel->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
