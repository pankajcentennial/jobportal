<?php

$databaseUrl = getenv("DATABASE_URL");

if (!$databaseUrl) {
    die("DATABASE_URL is not set in Render Environment Variables!");
}

echo $dbparts = parse_url($databaseUrl); die;

$host = $dbparts["host"];
$port = $dbparts["port"];
$user = $dbparts["user"];
$pass = $dbparts["pass"];
$dbname = ltrim($dbparts["path"], "/");

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "PostgreSQL Connected Successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
