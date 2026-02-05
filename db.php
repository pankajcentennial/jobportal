<?php

$databaseUrl = getenv("DATABASE_URL");

if (!$databaseUrl) {
    die("DATABASE_URL not set!");
}

$dbparts = parse_url($databaseUrl);

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

    // Connected
    // echo "Connected Successfully";

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
