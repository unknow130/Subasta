let usuarioLogeadoGlobal = "anonimo"
$(document).ready(function () {
    $("#inicio").click(function () {
        $.ajax({
            url: "./inicio.php",
            type: "GET",
            dataType: "html",
            success: function (fichero) {
                $("#contenido").html(fichero)
            }
        })
    })
    $("#verSubastas").click(function () {
        $.ajax({
            url: "./verSubastasActivas.html",
            type: "GET",
            dataType: "html",
            success: function (fichero) {
                $("#contenido").html(fichero)
            }
        })
    })
    $("#verColeccionObjetos").click(function () {
        $.ajax({
            url: "./verColeccionObjetos.php",
            type: "GET",
            dataType: "html",
            success: function (fichero) {
                $("#contenido").html(fichero)
            }
        })
    })
})

$(document).on("click", ".loginButton", function () {
    let usuario = $("#username").val()
    let password = $("#password").val()
    if (usuario.length > 0 && password.length > 0) {
        $.ajax({
            url: "./logearUsuario.php",
            data: { "usuario": usuario, "password": password },
            type: "POST",
            dataType: "JSON",
            success: function (datos) {
                //let datosJson = JSON.parse(datos)
                alert(datos)
                if (datos != "Datos incorrectos") {
                    usuarioLogeadoGlobal = usuario
                    $("#contenidoModal2").html("<div id='divLogin'><i id='iconoLogin' class='bi bi-person-circle'></i><p id='userName' style='text-decoration:underline;font-weight:bold;' class='ms-2 d-inline-block'>" + usuario + "</p></div>")
                    $("body").attr("style", "overflow: auto;")
                    $("#buttonModal2").attr("data-bs-dismiss", "modal")
                    $(".modal-backdrop").remove()
                    $("#navbarNav ul").append("<li class='nav-item me-4'><a id='verSubastas' class='nav-link' href='#'>Participar en las subastas</a></li><li class='nav-item me-3'><a id='startSubasta' class='nav-link' href='#'>Comenzar una subasta</a></li>")
                    $("#startSubasta").click(function () {
                        $.ajax({
                            url: "./comenzarSubasta.html",
                            type: "GET",
                            dataType: "html",
                            success: function (fichero) {
                                $("#contenido").html(fichero)
                            }
                        })
                    })
                    $("#verSubastas").click(function () {
                        $.ajax({
                            url: "./verSubastasActivas.html",
                            type: "GET",
                            dataType: "html",
                            success: function (fichero) {
                                $("#contenido").html(fichero)
                            }
                        })
                    })
                    if (usuario == "admin") {
                        usuarioLogeadoGlobal = usuario
                        $("#navbarNav ul").append("<li class='nav-item me-3'><a id='peticiones' class='nav-link' href='#'>Ver peticiones</a></li>")
                        $("#peticiones").click(function () {
                            $.ajax({
                                url: "./verPeticiones.html",
                                type: "GET",
                                dataType: "html",
                                success: function (fichero) {
                                    $("#contenido").html(fichero)
                                }
                            })
                        })
                    }
                    //COOKIES
                    let cookie = document.cookie
                    if (!cookie.includes("fecha")) {
                        let hoy = new Date()
                        let fecha = hoy.getDate() + '/' + (hoy.getMonth() + 1) + '/' + hoy.getFullYear() + " " + hoy.getHours() + ":" + hoy.getMinutes() + ":" + hoy.getSeconds();
                        document.cookie = "fecha=" + fecha + ";"
                        let fechaActualizada = document.cookie.split(";")[0].split("=")[1]
                        $("header").html("<i class='bi bi-alarm'></i>  Es tu primera conexion: " + fechaActualizada)
                        $("header").addClass("p-2")
                    } else {
                        let hoy = new Date()
                        let fecha = hoy.getDate() + '/' + (hoy.getMonth() + 1) + '/' + hoy.getFullYear() + " " + hoy.getHours() + ":" + hoy.getMinutes() + ":" + hoy.getSeconds();
                        document.cookie = "fecha=" + fecha + ";"
                        let fechaActualizada = document.cookie.split(";")[0].split("=")[1]
                        $("header").html("<i class='bi bi-alarm'></i>  Ultima conexion: " + fechaActualizada)
                        $("header").addClass("p-2")
                    }
                }
            }
        })
    }
})

function backToLogin() {
    divLogin = $(".modal-body2")
    let usuario = $("#username").val()
    let password = $("#password").val()
    let passwordRepeat = $("#passwordRepeat").val()

    if (usuario.length > 0 && password.length > 0 && passwordRepeat.length > 0 && password == passwordRepeat) {
        let modalRegistroConcatenado =
            "<p><b>Iniciar Sesion</b></p>\
            <span class='d-inline-block mb-2'>Usuario: </span><input type='text' id='username'><p>\
            <span>Contraseña: </span><input type='text' id='password'>\
        \
            <a onclick='registrarUsuario()' id='registerA' href='#'>Registrar nuevo usuario</a>"

        let modalFooterConcatenado =
            "<button type='button' class='btn btn-secondary'\
                data-bs-dismiss='modal'>Cerrar</button>\
            <button type='button' class='btn btn-primary'><a onclick='logearse()'>Iniciar Sesion\
                </a></button>"

        divLogin.html(modalRegistroConcatenado)
        divFooter.html(modalFooterConcatenado)
    }
    else {
        divLogin = $(".modal-body2")
        divFooter = $(".modal-footer2")
        let modalRegistroConcatenado =
            "<p><b>Iniciar Sesion</b></p>\
            <span class='d-inline-block mb-2'>Usuario: </span><p><input type='text' id='username'><p>\
            <span>Contraseña: </span><p><input type='text' id='password'><p>\
            <span>Repetir contraseña: <p></span><input type='text' id='passwordRepeat'>\
        \
            <a onclick='backToLogin()' id='registerA' href='#'>Volver al inicio de sesion</a>"

        let modalFooterConcatenado =
            "<button type='button' class='btn btn-secondary'\
                data-bs-dismiss='modal'>Cerrar</button>\
            <button type='button' class='btn btn-primary'><a onclick='backToLogin()'>Registrarse\
                </a></button>\
                <span>Error a la hora de rellenar los campos correctamente</span>"

        divLogin.html(modalRegistroConcatenado)
        divFooter.html(modalFooterConcatenado)
    }
}

function registrarUsuario() {
    divLogin = $(".modal-body2")
    divFooter = $(".modal-footer2")
    let modalRegistroConcatenado =
        "<p><b>Iniciar Sesion</b></p>\
    <span class='d-inline-block mb-2'>Usuario: </span><p><input type='text' id='username'><p>\
    <span>Apellidos: </span><p><input type='text' id='ape'><p>\
    <span>Correo Electronico: </span><p><input type='text' id='email'><p>\
    <span>Localidad: </span><p><input type='text' id='direccion'><p>\
    <span>Telefono: </span><p><input type='text' id='tlf'><p>\
    <span>Contraseña: </span><p><input type='password' id='password'><p>\
    <span>Repetir contraseña: <p></span><input type='password' id='passwordRepeat'><p>\
    \
    <a id='registerA' href=''>Volver al inicio de sesion</a>"

    let modalFooterConcatenado =
        "<button type='button' class='btn btn-secondary'\
        data-bs-dismiss='modal'>Cerrar</button>\
    <button type='button' class='registerButton btn btn-primary'><a>Registrarse\
        </a></button>"

    divLogin.html(modalRegistroConcatenado)
    divFooter.html(modalFooterConcatenado)
}


$(document).on("click", ".registerButton", function () {
    divLogin = $(".modal-body2")
    let usuario = $("#username").val()
    let apellidos = $("#ape").val()
    let email = $("#email").val()
    let direccion = $("#direccion").val()
    let tlf = $("#tlf").val()
    let password = $("#password").val()
    let passwordRepeat = $("#passwordRepeat").val()

    if (usuario.length > 0 && password.length > 0 && passwordRepeat.length > 0 && password == passwordRepeat) {
        $.ajax({
            url: "./comprobarUsuario.php",
            data: { "usuario": usuario },
            type: "POST",
            dataType: "JSON",
            success: function (datos) {
                //let datosJson = JSON.parse(datos)
                let respuestaRegistro = datos

                if (respuestaRegistro == true) {
                    alert("Este nombre de usuario ya existe , porfavor introduzca otro")
                }
                else {
                    $.ajax({
                        url: "./registrarUsuario.php",
                        data: { "usuario": usuario ,"password": password , "apellidos": apellidos , "email": email , "direccion": direccion , "tlf": tlf},
                        type: "POST",
                        dataType: "JSON",
                        success: function (datos) {
                            //let datosJson = JSON.parse(datos)
                            alert(datos)
        
                            let modalRegistroConcatenado =
                                "<p><b>Iniciar Sesion</b></p>\
                                            <span class='d-inline-block mb-2'>Usuario: </span><input type='text' id='username'><p>\
                                            <span>Contraseña: </span><input type='password' id='password'>\
                                        \
                                            <a onclick='registrarUsuario()' id='registerA' href='#'>Registrar nuevo usuario</a>\
                                            <span></span>"
                            let modalFooterConcatenado =
                                "<button type='button' class='btn btn-secondary'\
                                                data-bs-dismiss='modal'>Cerrar</button>\
                                            <button type='button' class='loginButton btn btn-primary'><a>Iniciar Sesion\
                                                </a></button>"
        
                            divLogin.html(modalRegistroConcatenado)
                            divFooter.html(modalFooterConcatenado)
                        }
                    })
                }
            }
        })
    }
    else {
        divLogin = $(".modal-body2")
        divFooter = $(".modal-footer2")
        let modalRegistroConcatenado =
            "<p><b>Iniciar Sesion</b></p>\
                <span class='d-inline-block mb-2'>Usuario: </span><p><input type='text' id='username'><p>\
                <span>Apellidos: </span><p><input type='text' id='ape'><p>\
                <span>Correo Electronico: </span><p><input type='text' id='email'><p>\
                <span>Localidad: </span><p><input type='text' id='direccion'><p>\
                <span>Telefono: </span><p><input type='text' id='tlf'><p>\
                <span>Contraseña: </span><p><input type='password' id='password'><p>\
                <span>Repetir contraseña: <p></span><input type='password' id='passwordRepeat'><p>\
            \
                <a id='registerA' href=''>Volver al inicio de sesion</a>"

        let modalFooterConcatenado =
            "<button type='button' class='btn btn-secondary'\
                    data-bs-dismiss='modal'>Cerrar</button>\
                <button type='button' class='registerButton btn btn-primary'><a>Registrarse\
                    </a></button>\
                    <span>Error a la hora de rellenar los campos correctamente</span>"

        divLogin.html(modalRegistroConcatenado)
        divFooter.html(modalFooterConcatenado)
    }
})

function mostrarNombreUsuario() {
    return usuarioLogeadoGlobal
}

function comprobarUsuario() {
    if (usuarioLogeadoGlobal != "anonimo") {
        alert("aaa")
    }
    else {
        alert("debes iniciar sesion")
    }
}
