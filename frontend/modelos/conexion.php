<?php

class Conexion
{

  static public function conectar()
  {
    $conn = 'mysql:host=localhost;dbname=malefashion';
    $user = 'root';
    $pass = '';
    $link = new PDO(
      $conn,
      $user,
      $pass,
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      ]
    );

    return $link;
  }
}
