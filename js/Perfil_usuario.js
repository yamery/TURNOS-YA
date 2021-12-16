// ----------------------------------------- CAMBIAR CONTRASEÑA ----------------------------------------------------

$(document).on("click", "#change_pass", function() {
    $("#pass_id").val($(".correo_user").attr("id"));
    $("#Cambiar_contra").modal("show");

});

$(document).on("submit", "#up_pass", function() {
    if (!$('#confirm_change_pass').prop('disabled')) {
        $.ajax({
            url: 'Actualizar_info_empresa.php',
            type: 'POST',
            data: $("#up_pass").serialize(),
            success: function(response) {

                console.log(response);
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Informacion actualizada",
                        callback: function() {
                            location.reload();
                        }
                    });

                } else if (response.estado == "false") {
                    $("body").overhang({
                        type: "error",
                        message: "La contraseña ingresada es incorrecta",

                    });
                }


            }



        });
    } else {
        $("body").overhang({
            type: "error",
            message: "Verifique los datos ingresados",

        });
    }
});


// ------------------------------------------- LISTAR RESERVAS -----------------------------------------------

$(document).ready(function() {
    // var now = new Date(Date.now());
    // var formatted = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
    // alert(now.toLocaleDateString() + formatted);

    let user_id = $(".correo_user").attr('id');

    $.ajax({
        url: 'Listar_reservas.php',
        type: 'POST',
        data: { 'user_id': user_id },
        success: function(response) {




            if (response != "[]") {
                let turnos = JSON.parse(response);
                let template = '';

                ides = Array();
                turnos.forEach(turno => {


                    template += ` 	 <li class="item">
                    <div class="card mb-0 text-black" style="height: 100%; width: 100%;" id="CT${turno.ID_reserva}"> 
              
                    <div class="card-header">
                      <h1 class="card-title title_reser text-dark" >${turno.Nombre_turno}</h1>
                    </div>
              
                    <div class="card-body " >
                    <div class=" col-md-11 col-lg-11 "> 
                                <table class="table ">
                                  <tbody>
                                    <tr>
                                      <th >Empresa:</th>
                                      <td> ${turno.Nombre_empresa}</td>
                                    </tr>
                                    <tr>
                                      <th>Fecha inicio:</th>
                                      <td>${turno.Hora_ini}</td>
                                    </tr>
                                    <tr>
                                      <th>Fecha fin:</th>
                                      <td>${turno.Hora_fin}</td>
                                    </tr>
                                    <tr>
                                      <th>Telefono:</th>
                                      <td>${turno.Telefono}</td>
                                    </tr>
                                    <tr>
                                      <th>Direccion:</th>
                                      <td>${turno.Direccion}</td>
                                    </tr>
                                    <tr>
                                      <th>Tiempo Restante:</th>
                                      <td ><div class="habilited" id="T${turno.ID_reserva}"></div></td>
                                    </tr>

                                   
                                  </tbody>
                                </table>
                              
                                
                                </div>
                    </div>
                  </div></li>`;

                    // CALCULO DIFERENCIA DE FECHAS
                    var fecha_fin = moment(turno.Hora_fin);
                    var hoy = moment();


                    time = fecha_fin.diff(hoy, "seconds");

                    id = "T" + turno.ID_reserva;
                    console.log(fecha_fin.diff(hoy, "days"))
                    var reserva = new Object();
                    reserva.id = id;
                    reserva.time = time;
                    ides.push(reserva);


                });
                $("#reservas").html(template);
                temporizador(ides);





            } else {

            }

        }



    });

});

/*//////////////////////////////////////////////
consulta para buscar la info de los turnos que aparta el usuario
select Nombre_turno,Hora_ini,Hora_fin,Nombre_empresa from turnos join reservaciones on reservaciones.Turnos_ID_turnos=turnos.ID_turnos join taquillas on turnos.Taquillas_ID_taquilla=taquillas.ID_taquilla join empresas on taquillas.Empresas_ID_empresa=empresas.ID_empresa join usuarios on reservaciones.Usuarios_ID_usuario=usuarios.ID_usuario where usuarios.ID_usuario=6

*/ /////////////////


//---------------------------------------  Cambiar informacion personal ----------------------------------

$(document).on("click", "#update_info", function() {

    $("#modal_Update_info").modal("show");

    $("#Form_upnamme").val($("#Name_user").html());
    $("#Form_upnapellido").val($("#Apell_user").html());

    $("#Form_uptel").val($("#Up_tel").html());

    console.log($("#Nemp").html());

});

$(document).on("click", "#confirm_upinfo", function() {

    $("#up_id").val($(".correo_user").attr("id"));
    console.log("sandoa");
    $.ajax({
        url: 'Actualizar_info_usuario.php',
        type: 'POST',
        data: $("#form_update").serialize(),
        success: function(response) {

            console.log(response);
            if (response.estado == "true") {
                $("body").overhang({
                    type: "success",
                    message: "Informacion actualizada",
                    callback: function() {
                        location.reload();
                    }
                });
            }



        }
    });

});

function temporizador(reserv) {
    reserv.forEach(reser => {

        console.log(reser.time);
        crono = "#" + reser.id;
        if (Math.sign(reser.time) != "-1") {
            if ($(crono).hasClass("habilited")) {
                // hoy = new Date();
                // console.log(hoy.getMinutes() + 2)
                $(crono).timer('remove');
                $(crono).timer({
                    countdown: true,
                    duration: reser.time, // The time to countdown from. `seconds` and `duration` are mutually exclusive
                    callback: function() {
                        $(crono).timer('remove');
                        $(crono).removeClass('habilited');
                        $("#C" + reser.id).addClass("bg-danger text-white ");
                        $(crono).html('<h2>TURNO VENCIDO</h2>');


                    },
                    format: '%D %H:%M:%S', // Format to show time in

                });
            }
        } else {
            $("#C" + reser.id).addClass("text-white bg-danger");
            $(crono).html('<h2>TURNO VENCIDO</h2>');
        }


    });






}