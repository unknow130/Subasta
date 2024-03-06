<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/miscript.js"></script>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css");
    </style>
    <title>Document</title>
</head>

<body>
    <header class="bg-warning text-center">
        <img id="logo" src="./images/logo.png" alt="">
    </header>
    <nav id="navegation" class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid col-lg-12">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-md-8 collapse navbar-collapse text-end justify-content-start" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item ms-2 me-4">
                        <a id="inicio" class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item me-4">
                        <a id="verColeccionObjetos" class="nav-link" href="#">Ver Coleccion de Objetos</a>
                    </li>
                </ul>
            </div>
            <div id="registro">
                <div id="contenidoModal2">
                    <!-- Button trigger modal -->
                    <button id="buttonModal2" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Iniciar Sesion/Registrarse
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog2">
                            <div class="modal-content modal-content2">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Iniciar sesion O registrar
                                        nuevo usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body modal-body2">
                                    <p><b>Iniciar Sesion</b></p>
                                    <span>Usuario: </span><input type="text" id="username">
                                    <p>
                                        <span>Contraseña: </span><input type="password" id="password">

                                        <a onclick="registrarUsuario()" id="registerA" href="#">Registrar nuevo
                                            usuario</a>
                                </div>
                                <div class="modal-footer modal-footer2">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary loginButton">Iniciar
                                        sesion</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="contenido">
        <section id="hero" class="container-fluid d-flex align-items-center">
            <div class="col-10 col-lg-7 offset-2">
                <h1>¿Quieres dejar en buenas manos tus objetos de valor?</h1>
                <p class="mt-3">No te preocupes! , has visitado el sitio correcto, nuestro servicio de subastas te hara
                    ganar un buen dinero con tus objetos historicos que ya no quieres que sigan ocupando espacio en tu hogar
                </p>
                <button id="start_subasta" class="btn btn-dark">Comienza con tu primera subasta<i
                        class="bi bi-cash-coin ms-2"></i></button>
            </div>
        </section>
        <section id="info" class="w-100">
            <div class="container text-center">
                <div class="row d-flex align-items-center">
                    <div class="col-md-12 col-lg-3 pt-5">
                        <p>+ 786.500€</p>
                        <span>Ganancias Totales en subastas</span>
                    </div>
                    <div class="col-md-12 col-lg-3 pt-5">
                        <p>+310</p>
                        <span>Objetos Subastados</span>
                    </div>
                    <div class="col-md-12 col-lg-3 pt-5">
                        <p>+150</p>
                        <span>Comentarios</span>
                    </div>
                    <div class="col-lg-3 pt-5">
                        <p>+311</p>
                        <span>Usuarios Registrados</span>
                    </div>
                </div>
            </div>
        </section>
        <section id="explorar">
            <div id="informacion" class="offset-1 col-10 text-center">
                <h2>Listado de subastas Activas</h2>
                <span>En esta seccion podras observar algunas de las subastas que astan activas en estos momentos, puedes
                    participar en ellas ahora mismo! no pierdas el tiempo y adelantate a los demas. <p><br> Si no estas
                        registrado puedes hacerlo ahora</span>
            </div>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <img src="./images/object1.png" class="card-img-top" alt="...">
                            <div class="card-body align-content-lg-start">
                                <h6 class="card-title">Anillo de mas de mil años</h6>
                                <p class="card-text tempo">Anillo perdido hace mas de 1 siglo </p>
                                <p class="card-text d-inline-block">Precio inicial 2200€ -></p>
                                <p class="card-text d-inline-block">Precio actual: 5200€</p>
                            </div>
                        </div>
                        <button class="btn mt-3">Realizar una puja</button>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <img src="./images/object2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">Corona de reina antigua</h6>
                                <p class="card-text tempo">Corona que pertenecia a la realeza (reina desconocida)</p>
                                <p class="card-text d-inline-block">Precio inicial 9000€ -></p>
                                <p class="card-text d-inline-block">Precio actual: 11.000€</p>
                            </div>
                        </div>
                        <button class="btn mt-3">Realizar una puja</button>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <img src="./images/object3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">Vasijas Hechas en el antiguo Egipcio</h6>
                                <p class="card-text tempo">Vasijas restauradas y en perfecto estado, encontradas en una
                                    excavacion</p>
                                <p class="card-text d-inline-block">Precio inicial de 300€ -></p>
                                <p class="card-text d-inline-block">Precio actual: 600€</p>
                            </div>
                        </div>
                        <button class="btn mt-3">Realizar una puja</button>
                    </div>
                </div>
            </div>
        </section>
        <section id="preguntas" class="text-center">
            <h1>Preguntas frecuentes</h1>
            <div class="container">
                <div class="row">
                    <div class="col-6 text-start">
                        <h6>¿Hay todos los dias subastas?</h6>
                        <p>Por supuesto , todos los dias ofrecemos subastas para todos nuestros usuarios</p>
                        <h6 class="secondH6">¿Hace falta estar registrado para participar?</h6>
                        <p>Si, todo aquel que quiera participar en una subasta debe de estar registrado previamente</p>
                    </div>
                    <div class="col-6 text-start">
                        <h6>¿Puedo subastar cualquier tipo de objeto?</h6>
                        <p>No, solo se podran subastar los objetos que tengan una historia detras de ellos mismos , no
                            importa que sea diamante o cobre , nos importa que sea un objeto antiguo y eso es lo que le da
                            su valor</p>
                        <h6 class="secondH6">¿Que requisitos tiene que seguir mi objeto para que sea subastado?</h6>
                        <p>Debe ser antiguo y debes especificar su historia y de donde lo sacastes</p>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="container-fluid">
                <div class="row text-center ">
                    <div class="col-4 offset-4 d-flex justify-content-center">
                        <p class="d-inline-block me-5">Registrate</p>
                        <p class="d-inline-block me-5">Foro</p>
                        <p class="d-inline-block me-5">Afiliate</p>
                        <p class="d-inline-block me-5">FAQ </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4 d-flex justify-content-center">
                        <p class="d-inline-block me-5"><i class="bi bi-facebook"></i></p>
                        <p class="d-inline-block me-5"><i class="bi bi-twitter"></i></p>
                        <p class="d-inline-block me-5"><i class="bi bi-youtube"></i></p>
                        <p class="d-inline-block me-5"><i class="bi bi-linkedin"></i> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="d-inline-block me-2">Todos los derechos reservados &copy; 2023 Subastas en Línea</p>
                        <p class="d-inline-block me-2">Dirección: Calle Principal, Ciudad, País</p>
                    </div>
                    <div class="col-sm-12 text-center">
                        <p class="d-inline-block me-2">Teléfono: +1234567890</p>
                        <p class="d-inline-block me-2">Email: info@subastasenlinea.com</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>