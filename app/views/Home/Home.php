<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron header" style="">
    <div class="container text-center">
      <h1>Hola</h1>
      <p>Sabe y gana - Aplicación web</p> <?= $_SERVER['SERVER_NAME']. '/login/signin' .PHP_VERSION_ID?>
      <p><a class="btn btn-primary btn-lg button" href="/sabeygana/Login" role="button">Iniciar juego</a></p>
    </div>
  </div>
</body>
</html>