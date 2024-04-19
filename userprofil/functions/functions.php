<?php

function pdo() {
  $dbhost = $_ENV['DB_HOST']= 'localhost';
  $dbname = $_ENV['DB_NAME']='test';
  $dbuser = $_ENV['DB_USER']='root';
  $dbpassword = $_ENV['DB_PASSWORD']='root';
  try {
      $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
      return $pdo;
  } catch (PDOException $e) {
      echo'Erreur de connexion à la base de données : ' . $e->getMessage();
  }
}
?>

