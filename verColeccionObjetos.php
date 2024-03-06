<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subastas</title>
    <!-- Agregar los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
    <style>
        #contenido {
            background-image: url("images/background.jpg");
            
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        .container {
            text-align: center;
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .auction {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .auction-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .auction-description {
            margin-bottom: 10px;
        }

        .auction-details {
            font-size: 14px;
            margin-top: 20px;
        }

        .images {
            width: 200px;
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Subastas</h1>
    </header>
    <div class="container">
        <?php
        require_once "./Base.php";
        // Array de datos con información de subastas
        $subastas = Base::verHistoricoSubastas();

        foreach ($subastas as $subasta) {
            echo '<div class="auction">';
            echo '<h2 class="auction-title">' . $subasta["titulo"] . '</h2>';
            echo '<p class="auction-description">' . $subasta["descripcion"] . '</p>';
            echo '<div class="auction-details">';
            echo '<p class="mb-1"><strong>Fecha de inicio:</strong> ' . $subasta["fecha_inicio"] . '</p>';
            echo '<p class="mb-1"><strong>Fecha de fin:</strong> ' . $subasta["fecha_fin"] . '</p>';
            echo '<p class="mb-1"><strong>Precio Inicial:</strong> ' . $subasta["precio_inicial"] . '</p>';
            echo '<p class="mb-1"><strong>Precio Final:</strong> ' . $subasta["precio_actual"] . '</p>';

            // Comprobar si la imagen existe en el directorio con diferentes extensiones
            $extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $imagePath = '';
            foreach ($extensions as $extension) {
                $imagePath = 'user_images/' . $subasta["titulo"] . '.' . $extension;
                if (file_exists($imagePath)) {
                    break;
                }
            }

            if (file_exists($imagePath)) {
                echo '<img src="' . $imagePath . '" alt="Imagen de la subasta" class="images">';
            } else {
                echo '<p>No se encontró la imagen</p>';
            }

            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</body>

</html>
