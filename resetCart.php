<?php
session_start();
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
    header("Location: dashboard.php");
}
header("Location: dashboard.php");
