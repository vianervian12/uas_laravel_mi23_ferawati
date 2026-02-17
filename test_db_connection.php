<?php
try {
    $dsn = "mysql:host=127.0.0.1;port=3306;dbname=uas_laravel_mi23";
    $username = "root";
    $password = "";

    echo "Attempting connection to $dsn...\n";

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully to database.\n";

    // Check if sessions table exists
    $result = $pdo->query("SHOW TABLES LIKE 'sessions'");
    if ($result->rowCount() > 0) {
        echo "Table 'sessions' exists.\n";
    }
    else {
        echo "Table 'sessions' does NOT exist.\n";
    }


}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
    exit(1);
}
