<?php

require_once 'model/RezeptModel.php';
require_once 'model/KategorieModel.php';
require_once 'model/GetAllModel.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class HomeController
{
    public function index()
    {
        $rezeptModel = new RezeptModel();
        $kategorieModel = new KategorieModel();
        
        $view = new View('home_index');
        $view->title = 'Home';
        $view->rezepte = $rezeptModel->readRezept();
        $view->kategorien = $kategorieModel->readKategorie();
        $view->display();
    }

    public function rezeptAnzeigen()
    {
        $getAllModel = new GetAllModel();
        
        $view = new View('homeAnzeige_index');
        $view->title = 'Rezept';    
        echo $_GET['id'];
        $view->rezept = $getAllModel->readRezeptAndKommentar($_GET['id']);
        $view->display();
    }

    public function doCreate()
    {
        if ($_POST['send']) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $userModel->create($firstName, $lastName, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        $userModel = new UserModel();
        $userModel->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
