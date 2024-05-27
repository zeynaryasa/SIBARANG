<?php
// config.php
$requested_url = $_SERVER['REQUEST_URI'];
$page_path = $_SERVER['DOCUMENT_ROOT'] . $requested_url;

if (!file_exists($page_path)) {
    header("Location: 404.html");
    exit();
}
