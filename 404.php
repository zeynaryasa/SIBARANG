<?php
$requested_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$page_path = $_SERVER['DOCUMENT_ROOT'] . $requested_url;

if (!file_exists($page_path)) {
    header("Location: 404.html");
    exit();
}
