<?php
session_start();
if(empty($_SESSION['activeC'])){
  header('Location: ./');
}
?>