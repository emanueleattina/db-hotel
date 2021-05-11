<?php
    // file per collegarmi al database

    include 'db.php';

    header('Content-Type: application/json');

    if(!empty($_GET) && $_GET['id']) {
        $id = $_GET['id']; // nel caso in cui è presente l'id creo un array vuoto "result"
        $result = [];

        $stmt = $conn->prepare("SELECT * FROM stanze WHERE id = ?"); // preparo lo statement (query)
        $stmt->bind_param("i", $id); // sostituisce i dati della chiamata ajax

        $stmt->execute(); // eseguo lo statement (il codice sql)
        $rows = $stmt->get_result(); // salvo i risultati in una variabile
        while($row = $rows->fetch_assoc()) { // ciclo i risultati e li trasforma in array associativi
            $result[] = $row; // push nell'array associativo in un array di risultati
        }

        echo json_encode([
            "response" => $result,
            "success" => true,
        ]);
    } else {
        $sql = "SELECT * FROM stanze";
        $rows = $conn->query($sql);

        $result = [];

        if($rows && $rows->num_rows > 0) {
            while($row = $rows->fetch_assoc()) {
                $result[] = $row;
            }
        }
        echo json_encode([
            "response" => $result,
            "success" => true,
        ]);
    }


?>