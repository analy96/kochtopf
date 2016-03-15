<?php

require_once 'lib/Model.php';

/**
 * Das UserModel ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Models findest du in der Model Klasse.
 */
class RezeptModel extends Model
{
    /**
     * Diese Variable wird von der Klasse Model verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'rezept';

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
     public function readRezept($where,$order)
     {
        // Query erstellen
        $query = "SELECT * FROM $this->tableName ".$where." ".$order." LIMIT 0, 100";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
     }

    public function readRezeptById($rezeptId){
    	// Query erstellen
        $query = "SELECT * FROM `rezept` WHERE id = $rezeptId";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
     }


     public function bewerten($bewertung,$rezeptId){
       $rezept = $this->readRezeptById($rezeptId);
       $db_bewertung = $rezept->bewertung;
       $db_anzahl = $rezept->anzahl_bewertung;

       $neu_anzahl = $db_anzahl + 1;
       $neu_bewertung = (($db_bewertung*$db_anzahl)+$bewertung)/$neu_anzahl;

       //Bewertung
       $query = "UPDATE rezept SET bewertung =?";

       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('f', $neu_bewertung);

       if (!$statement->execute()) {
           throw new Exception($statement->error);
       }

       //Anzahl Bewertung
       $query = "UPDATE rezept SET anzahl_bewertung =?";

       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('i', $neu_anzahl);

       if (!$statement->execute()) {
           throw new Exception($statement->error);
       }

     }
}
