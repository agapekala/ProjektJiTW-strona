<?php
session_start();
       if(isset($_POST['submit'])){
        unset($_SESSION['nots']);
           $_SESSION['not_off']=true;
           header('Location: '.$_SERVER['HTTP_REFERER']);
        }
?>