<?php
require 'auth_conf.php';
require 'config.php';

if (isset($_POST['submitProfileSistem'])) {
    $id = $_POST['idProfileSistem'];
    $nameApp = $_POST['appName'];
    $companyName = $_POST['companyName'];

    $stmt = $db->prepare("UPDATE profile SET appName =:appName, companyName=:companyName WHERE id =:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':appName', $nameApp);
    $stmt->bindParam(':companyName', $companyName);
    $stmt->execute();
    header("Location: profile.php");
    exit;
}
