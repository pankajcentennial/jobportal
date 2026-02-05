<?php
require "db.php";

$stmt = $pdo->query("SELECT NOW()");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

echo "Server Time: " . $row["now"];
?>
