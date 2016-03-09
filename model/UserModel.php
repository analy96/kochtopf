<?php

require_once __DIR__.'/../lib/Model.php';

/**
 * Das UserModel ist zustÃ¤ndig fÃ¼r alle Zugriffe auf die Tabelle "user".
 *
 * Die AusfÃ¼hrliche Dokumentation zu Models findest du in der Model Klasse.
 */
class UserModel extends Model
{
    /**
     * Diese Variable wird von der Klasse Model verwendet, um generische
     * Funktionen zur VerfÃ¼gung zu stellen.
     */
    protected $tableName = 'benutzer';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausfÃ¼hren des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert fÃ¼r die Spalte firstName
     * @param $lastName Wert fÃ¼r die Spalte lastName
     * @param $email Wert fÃ¼r die Spalte email
     * @param $password Wert fÃ¼r die Spalte password
     *
     * @throws Exception falls das AusfÃ¼hren des Statements fehlschlÃ¤gt
     */
    public function create($benutzername, $vorname, $nachname, $email, $jahre_alt, $geschlecht, $passwort)
    {
        $password = sha1($passwort);

        $query = "INSERT INTO $this->tableName (benutzername, vorname, nachname, email, jahre_alt, geschlecht, passwort) VALUES (?, ?, ?, ?,?,?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssiss', $benutzername,$vorname,$nachname,$email,$jahre_alt,$geschlecht,$passwort);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        
        session_start();
        $user = $this->readByUsername($_POST['benutzername']);
        $_SESSION['userid'] = $user->id;
    }
    
    public function readByUsername($benutzername){
    	// Query erstellen
        $query = "SELECT * FROM $this->tableName WHERE benutzername=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $benutzername);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        // Den gefundenen Datensatz zurÃ¼ckgeben
        return $row;
    }
    
    
    public function checkUsername($username){
    	// Query erstellen
    	$query = "SELECT * FROM benutzer WHERE benutzername=?";
    	
    	// Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
    	// und die Parameter "binden"
    	$statement = ConnectionHandler::getConnection()->prepare($query);
    	$statement->bind_param('s', $username);
    	
    	// Das Statement absetzen
    	$statement->execute();
    	
    	// Resultat der Abfrage holen
    	$result = $statement->get_result();
    	if (!$result) {
    		throw new Exception($statement->error);
    	}
    	
    	// Ersten Datensatz aus dem Reultat holen
    	$row = $result->fetch_object();
    	
    	
    	// Datenbankressourcen wieder freigeben
    	$result->close();
    	
    	
    	if (isset($row)){
    		return false;
    	}else{
    		return true;
    	}
    }
}
