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
        $view->kategorien = $kategorieModel->readKategorie();
        $view->rezepte = $getAllModel->readRezeptAndKommentarProfil($_SESSION['id']);
        $view->display();
        
    }
    public function neu()
    {
        $getAllModel = new GetAllModel();
        
        $dropDown=$_POST['dropDown'];
        $text=$_POST['text'];
        $titel=$_POST['titel'];
        
        $view = new View('profil_index');
        $view->title = 'Profil';    
        $getAllModel->neu($_SESSION['id'],$text,$titel,$dropDown);
        header('Location: /profil');     
    }
    
    public function rezeptAnzeigen()
    {
        $getAllModel = new GetAllModel();
        
        $view = new View('homeAnzeige_index');
        $view->title = 'Rezept';    
        $view->rezept = $getAllModel->readRezeptAndKommentar($_GET['id']);
        $view->display();
    }
    
    public function rezeptLoeschen()
    {
        $getAllModel = new GetAllModel();
        
        $view = new View('profil_index');
        $view->title = 'Profil';    
        $getAllModel->rezeptLoeschen($_GET['id']);
        header('Location: /profil'); 
    }
    public function bearbeiten()
    {
        $getAllModel = new GetAllModel();
        $id=$_POST['id'];
        $text=$_POST['text'];
        $view = new View('profil_index');
        $view->title = 'Profil';    
        $getAllModel->rezeptBearbeiten($id,$text);
        header('Location: /profil'); 
    }
}
