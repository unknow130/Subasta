<?php
        require_once "./Base.php";
        $array = Base::verPeticiones();
        echo json_encode($array);   
?>