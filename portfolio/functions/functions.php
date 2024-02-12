<?php
function getPdo(){
  try{
  $pdo = new PDO('mysql:host=localhost;dbname=my_portfolio', 'root', 'root');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
} catch (PDOException $e) {
  echo "Impossible de se connecter à la base de donnée : " . $e->getMessage();
  die();
}

}

