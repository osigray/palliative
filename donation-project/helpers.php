<?php

function redirect(string $url, int $status = 301){
    header('Location: ' . $url, true, $status);
    exit();
}


?>