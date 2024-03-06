<?php
require_once "./Base.php";
        $array = Base::verSubastasActivas();
        echo json_encode($array);   
?>