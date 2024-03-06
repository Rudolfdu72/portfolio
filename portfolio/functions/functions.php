<?php
function getPdo()
{
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=my_portfolio', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  } catch (PDOException $e) {
    echo "Impossible de se connecter à la base de donnée : " . $e->getMessage();
    die();
  }

}

function logout()
{
  if (session_status() !== PHP_SESSION_ACTIVE) 
    session_start();

    unset($_SESSION['user']);
    header('location:' . BASE_URL . '/auth/login.php');
  
}

function destroyingSession()
{
  if(!isset($_SESSION['user'])){
    header("Location:". BASE_URL."/auth/login.php");
    exit();
  }
  
}

