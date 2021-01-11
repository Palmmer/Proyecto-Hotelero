<?php
session_start();
if(empty($_SESSION['activeH'])){
  header('Location: ./');
}
?>