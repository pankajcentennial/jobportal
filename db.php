<?php

$databaseUrl = getenv("DATABASE_URL");

if (!$databaseUrl) {
    die("DATABASE_URL not set!");
}

$dbparts = parse_url($databaseUrl);

$host = $dbparts['dpg-d624k7sr85hc73dd8nig-a'];
$port = $dbparts[5432];
$user = $dbparts['jobportal_uxkc_user'];
$pass = $dbparts['8d2VAR3Zg1z9J46VDB4z2tuesMBaorAN'];
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
