<?php

require_once 'model/ProfilModel.php';
require_once 'model/RezeptModel.php';
require_once 'model/KategorieModel.php';
require_once 'model/GetAllModel.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class ProfilController
{
    public function index()
    {
        $profilModel = new ProfilModel();
        $rezeptModel = new RezeptModel();
        $kategorieModel = new KategorieModel();
        $getAllModel = new GetAllModel();
        
        $view = new View('profil_index');
        $view->title = 'Profil';
        $view->rezepte = $getAllModel->readRezeptAndKommentarProfil('202');
        $view->display();
        
        
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

    public function kommentieren()
    {
            $getAllModel = new GetAllModel();
            $text = $_POST['text'];
            $id = $_POST['id'];
            $getAllModel->kommentieren($text, $id);
            header("Location: /home/rezeptAnzeigen?id=$id");

        // Anfrage an die URI /user weiterleiten (HTTP 302)
    }

    public function delete()
    {
        $userModel = new UserModel();
        $userModel->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
