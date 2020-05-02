<?php

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

require_once('includes.php');

if(isset($_GET['contarPiada'])){
    PiadaCtrl::contarPiada();
}