<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: modules/dashboard/" . strtolower($_SESSION['role']) . ".php");
} else {
    header("Location: landing/index.php");
}
exit;
