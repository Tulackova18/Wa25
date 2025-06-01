<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../Views/auth/login.php");
    exit();
}

require_once '../Models/database.php';
require_once '../Models/comments.php';

$commentModel = new Comment($pdo);

if (isset($_POST['comment_id'])) {
    $commentModel->delete($_POST['comment_id']);
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
