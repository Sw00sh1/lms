<?php
try {
    $db = new PDO("sqlite:library_system.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    die("DB Error: ".$e->getMessage());
}
?>