<?php

session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'censo'
)or die(mysqli_error($conn));

if ($conn->connect_errno) {
    echo "¡Error! > (" . $conn->connect_errno . ")";
    die();
} else {
   //echo "¡Conexión exitosa!";
}   
