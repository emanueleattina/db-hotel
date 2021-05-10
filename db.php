<?php
    // file db in cui vado a fare la connessione

    // dati necessari per accedere la database
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'db_hotel';

    // connessione con mysqli
    $conn = new mysqli($servername, $username, $password, $dbname);

    // controllo connessione
    if($conn && $conn->connect_error) {
        echo "Connection failed " . $conn->connect_error;
    }

?>