<?php

function getAbout()
{
  global $DB_con;
  $stmt = $DB_con->prepare("SELECT * FROM about");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBanners()
{
  global $DB_con;
  $stmt = $DB_con->prepare("SELECT * FROM banners");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDoctors()
{
  global $DB_con;
  $stmt = $DB_con->prepare("SELECT * FROM doctors order by id desc");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPosts()
{
  global $DB_con;
  $stmt = $DB_con->prepare("SELECT * FROM posts order by id desc");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAlbum()
{
  global $DB_con;
  $stmt = $DB_con->prepare("SELECT * FROM posts where type = 'fotos' order by id desc");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

