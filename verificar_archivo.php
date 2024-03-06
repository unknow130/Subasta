<?php
$filename = $_POST['filename'];
$directory = './user_images/';
$pathCompleto = "";

$allowed_extensions = array('.jpg', '.jpeg', '.png', '.gif');

for ($i = 0 ; $i < count($allowed_extensions) ; $i++) {
    if (file_exists($directory."".$filename."".$allowed_extensions[$i])) {
        $pathCompleto = $directory."".$filename."".$allowed_extensions[$i];
        header('Content-Type: application/json');
        echo json_encode($pathCompleto);       
    }
}
?>
