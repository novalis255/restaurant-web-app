<?php
session_start();

// cek login
if (!isset($_SESSION['login'])) {
    header("Location: /auth/login.php");
    exit;
}

function only($roles)
{
    if (!is_array($roles)) {
        $roles = [$roles];
    }

    if (!in_array($_SESSION['role'], $roles)) {
        header("Location: ../dashboard/" . strtolower($_SESSION['role']) . ".php");
        exit;
    }
}
