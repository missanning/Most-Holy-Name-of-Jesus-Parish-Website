<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$allowed = ['home','about','mass-schedule','sacraments','ministries','news','gallery','flipbook','resources','donate','contact','login','signup','admin'];
if (!in_array($page, $allowed)) $page = 'home';
include 'includes/header.php';
include "pages/$page.php";
include 'includes/footer.php';
?>
