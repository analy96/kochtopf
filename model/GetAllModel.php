<?php

require_once 'lib/Model.php';

/**
 * Das UserModel ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Models findest du in der Model Klasse.
 */
class GetAllModel extends Model
{
    /**
     * Diese Variable wird von der Klasse Model verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableNameKat = 'kategorie';
    protected $tableNameBen = 'benutzer';
    protected $tableNameKom = 'kommentar';
    protected $tableNameRez = 'rezept';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
     public function readRezeptAndKommentar($rezeptId)
     {
        // Query erstellen
        $query = "select r.id, r.titel, b.benutzername, r.rezept, r.bewertung, ka.kategorie, ko.kommentar from $this->tableNameBen as b,
        $this->tableNameKat as ka, $this->tableNameRez as r left join $this->tableNameKom as ko on ko.rezept_id=r.id where r.benutzer_id=b.id and r.kategorie_id=ka.id and r.id=?" ;

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$rezeptId);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        $result = $statement->get_result();
        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
     }
     
        public function readRezeptAndKommentarProfil($uId)
     {
        // Query erstellen
        $query = "select r.rezept,r.titel, r.id, r.bewertung, ka.kategorie from $this->tableNameRez as r, $this->tableNameBen as b,
                    $this->tableNameKat as ka WHERE r.benutzer_id=b.id and r.kategorie_id=ka.id and b.id=?" ;

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$uId);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
 $result = $statement->get_result();
        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
     }
     
        public function kommentieren($text,$rezeptId){
    	// Query erstellen
        $query = "INSERT INTO $this->tableNameKom (kommentar,rezept_id) VALUES (?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('si',$text,$rezeptId);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        }
        
        public function rezeptLoeschen($rid){
        // Query erstellen
        $query = "DELETE FROM $this->tableNameRez WHERE id=?" ;

         $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$rid);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        }
        
        public function neu($uId,$text,$titel,$kategorie){
        // Query erstellen
        $query = "INSERT INTO $this->tableNameRez (`titel`, `rezept`, `kategorie_id`, `benutzer_id`) VALUES (?,?,?,?)" ;

         $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssii',$titel,$text,$kategorie,$uId);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        }
     
     public function rezeptBearbeiten($id,$text){
        // Query erstellen
        $query = "UPDATE $this->tableNameRez SET `rezept`=? WHERE id=?" ;

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('si',$text,$id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        }

}