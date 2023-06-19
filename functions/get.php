<?php

function getAbout()
{
  global $DB_con;
  $stmt = $DB_con->prepare("SELECT * FROM about");
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

