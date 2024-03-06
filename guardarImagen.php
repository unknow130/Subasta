<?php
if(isset($_FILES['image'])) {
    $file = $_FILES['image'];

    // Información del archivo
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Obtener la extensión del archivo
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Extensiones de archivo permitidas
    $allowedExtensions = array('jpg', 'jpeg', 'png');

    // Directorio de destino
    $uploadDir = 'user_images/';

    // Generar un nombre único para el archivo
    $newFileName = $_POST["nombreObj"] . '.' . $fileExt;

    // Ruta completa del archivo de destino
    $uploadPath = $uploadDir . $newFileName;

    // Verificar la extensión del archivo
    if (in_array($fileExt, $allowedExtensions)) {
        // Verificar si hay errores
        if ($fileError === 0) {
            // Verificar el tamaño del archivo (opcional)
            if ($fileSize < 5000000) { // 5 MB (tamaño en bytes)
                // Mover el archivo al directorio de destino
                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    echo '¡Archivo subido exitosamente!';
                } else {
                    echo 'Error al mover el archivo.';
                }
            } else {
                echo 'El archivo es demasiado grande.';
            }
        } else {
            echo 'Error al subir el archivo. Código de error: ' . $fileError;
        }
    } else {
        echo 'Extensión de archivo no permitida.';
    }
}
?>
