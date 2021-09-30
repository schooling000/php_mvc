<?php
    function debug($Valueble){
        echo '<pre>';
        var_dump($Valueble);
        echo '</pre>';
    }

    function var_dump_die($valueble){
        echo '<pre>';
        var_dump($valueble);
        echo '</pre>';
        die('');
    }