<?php

require_once __DIR__.'/../model/UserModel.php';

/**
 * Der Controller ist der Ort an dem es fÃ¼r jede Seite, welche der Benutzer
 * anfordern kann eine Methode gibt, welche die dazugehÃ¶rende Businesslogik
 * beherbergt.
 *
 * Welche Controller und Funktionen muss ich erstellen?
 *   Es macht sinn, zusammengehÃ¶rende Funktionen (z.B: User anzeigen, erstellen,
 *   bearbeiten & lÃ¶schen) gemeinsam in einem passend benannten Controller (z.B:
 *   UserController) zu implementieren. Nicht zusammengehÃ¶rende Features sollten
 *   jeweils auf unterschiedliche Controller aufgeteilt werden.
 *
 * Was passiert in einer Controllerfunktion?
 *   Die Anforderungen an die einzelnen Funktionen sind sehr unterschiedlich.
 *   Folgend die gÃ¤ngigsten:
 *     - DafÃ¼r sorgen, dass dem Benutzer eine View (HTML, CSS & JavaScript)
 *         gesendet wird.
 *     - Daten von einem Model (VerbindungsstÃ¼ck zur Datenbank) anfordern und
 *         der View Ã¼bergeben, damit diese Daten dann fÃ¼r den Benutzer in HTML
 *         Code umgewandelt werden kÃ¶nnen.
 *     - Daten welche z.B. von einem Formular kommen validieren und dem Model
 *         Ã¼bergeben, damit sie in der Datenbank persistiert werden kÃ¶nnen.
 */
class DefaultController
{
    /**
     * Die index Funktion des DefaultControllers sollte in jedem Projekt
     * existieren, da diese ausgefÃ¼hrt wird, falls die URI des Requests leer
     * ist. (z.B. http://mvc.local/). Weshalb das so ist, ist und wann welchr
     * Controller und welche Methode aufgerufen wird, ist im Dispatcher
     * beschrieben.
     */
    public function index()
    {
        // In diesem Fall mÃ¶chten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        if(isset($_SESSION['id'])){
            header('Location: /home');
        }else{
        $view = new View('login_index');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
        }

    }

    public function login(){
        $benutzername = $_POST['name'];
        $passworteingabe  = $_POST['passwort'];
        $passworteingabe = sha1($passworteingabe);

      	$user = new UserModel();
      	$user->table = 'benutzer';
      	$userinfo = $user->readByUsername($benutzername);
  	     $passwort = $userinfo->passwort;

        if($passwort != $passworteingabe){
          $_POST['name'] = $benutzername;
          $_POST['fehler'] = 'true';
          $this->index();
        }else{
            $_SESSION['id'] = $userinfo->id;
            header('Location: /home');
        }


}
}
