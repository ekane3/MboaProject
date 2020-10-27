<?php
session_start();
unset($_SESSION['nom']);
unset($_SESSION['login']);
unset($_SESSION['password']);
session_destroy();
header('Location: index.php');
/*$sql = "UPDATE users SET name=?, surname=?, sex=? WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$name, $surname, $sex, $id]);*/
