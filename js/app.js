$(document).ready(function() {

    $("#loginForm").bind("submit", function() {

        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function() {
                $("#loginForm button[type=submit]").html("enviando...");
                $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },

            success: function(response) {
                console.log(response);
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario encontrado, te estamos redirigiendo...",
                        callback: function() {
                            location.reload();
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "su usuario o contraseña es incorrecto"
                    });
                }
                $("#loginForm button[type=submit]").html("INICIAR");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "su usuario o contraseña es incorrecto"
                });
                $("#loginForm button[type=submit]").html("INICIAR");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
        });
        return false;
    });

    // --------------------------------------- iniciar sesion modal --------------------------------

    $("#loginForm2").bind("submit", function() {

        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            beforeSend: function() {
                $("#loginForm2 button[type=submit]").html("enviando...");
                $("#loginForm2 button[type=submit]").attr("disabled", "disabled");
            },

            success: function(response) {
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario encontrado, te estamos redirigiendo...",
                        callback: function() {
                            location.reload();
                        }
                    });
                    $('.indi_turno').val("");
                } else if (response.estado == "Apartado") {

                    $("body").overhang({
                        type: "success",
                        message: "Apartando Turno...",
                        callback: function() {
                            location.reload();
                        }
                    });
                    $('.indi_turno').val("");
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "su usuario o contraseña es incorrecto"
                    });
                }
                $("#loginForm2 button[type=submit]").html("LOGIN");
                $("#loginForm2 button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "su usuario o contraseña es incorrecto"
                });
                $("#loginForm2 button[type=submit]").html("LOGIN");
                $("#loginForm2 button[type=submit]").removeAttr("disabled");
            }
        });
        return false;
    });

    // --------------------------------------- REGISTRAR Usuario --------------------------------

    $(document).ready(function() {

        $("#regis_user").bind("submit", function() {
            // var formData = new FormData();
            // var file = $('#validatedCustomFile')[0].files[0];
            // formData.append('logo', file);
            if (!$('#regis_usertre').prop('disabled')) {

                $.ajax({


                    type: $(this).attr("method"),
                    url: "registroCode.php",
                    data: $(this).serialize(),

                    beforeSend: function() {
                        $("#RegisEmp button[type=submit]").html("enviando...");
                        $("#RegisEmp button[type=submit]").attr("disabled", "disabled");
                        console.log("SANDIA");

                    },

                    success: function(response) {
                        console.log("SANDIA2");
                        console.log(response);
                        console.log(response.estado);


                        if (response.estado == "true") {
                            console.log(response);
                            $("body").overhang({
                                type: "success",
                                message: "Creando Usuario...",
                                callback: function() {
                                    location.reload();
                                }

                            });
                            $('.indi_turno').val("");
                        } else if (response.estado == "existe") {

                            $("body").overhang({
                                type: "error",
                                message: "El correo ingresado ya existe"
                            });
                            $('.indi_turno').val("");
                        } else if (response.estado == "Apartado") {

                            $("body").overhang({
                                type: "success",
                                message: "Apartando Turno...",
                                callback: function() {
                                    location.reload();
                                }
                            });
                            $('.indi_turno').val("");
                        } else {

                            $("body").overhang({
                                type: "error",
                                message: "entro aqui..."
                            });

                        }

                        $("#RegisEmp button[type=submit]").html("REGISTRAR");
                        $("#RegisEmp button[type=submit]").removeAttr("disabled");
                    },
                    error: function() {
                        $("body").overhang({
                            type: "error",
                            message: "el usuario ya existe..."
                        });
                        $("#RegisEmp button[type=submit]").html("REGISTRAR");
                        $("#RegisEmp button[type=submit]").removeAttr("disabled");
                    }
                });
                return false;
            }

        });
    });



    // --------------------------------------- REGISTRAR EMPRESA --------------------------------

    $(document).ready(function() {

        $("#RegisEmp").on("submit", function() {
            // var formData = new FormData();
            // var file = $('#validatedCustomFile')[0].files[0];
            // formData.append('logo', file);
            if (!$('#regis').prop('disabled')) {

                $.ajax({


                    type: $(this).attr("method"),
                    url: "registrar_empresa.php",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $("#RegisEmp button[type=submit]").html("enviando...");
                        $("#RegisEmp button[type=submit]").attr("disabled", "disabled");
                        console.log("SANDIA");

                    },

                    success: function(response) {
                        console.log("SANDIA2");
                        console.log(response);
                        console.log(response.estado);


                        if (response.estado == "true") {
                            console.log(response);
                            $("body").overhang({
                                type: "success",
                                message: "Creando Usuario...",
                                callback: function() {
                                    location.reload();
                                }
                            });
                        } else if (response.estado == "existe") {

                            $("body").overhang({
                                type: "error",
                                message: "El correo ingresado ya existe"
                            });

                        } else {

                            $("body").overhang({
                                type: "error",
                                message: "entro aqui..."
                            });

                        }

                        $("#RegisEmp button[type=submit]").html("REGISTRAR");
                        $("#RegisEmp button[type=submit]").removeAttr("disabled");
                    },
                    error: function() {
                        $("body").overhang({
                            type: "error",
                            message: "el usuario ya existe..."
                        });
                        $("#RegisEmp button[type=submit]").html("REGISTRAR");
                        $("#RegisEmp button[type=submit]").removeAttr("disabled");
                    }
                });
                return false;
            }

        });
    });


});


// --------------------------------------------- VISTA PREVIA IMAGEN ----------------------------

function readImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result); // Renderizamos la imagen
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#validatedCustomFile").change(function() {
    // Código a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
});