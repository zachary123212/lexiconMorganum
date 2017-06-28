<?php
    require 'vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    include 'convert.php';
    include 'lexicon.php';
?>
