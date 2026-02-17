<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS uas_laravel_mi23";
    $pdo->exec($sql);
    echo "Database created successfully.\n";
}
catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}
