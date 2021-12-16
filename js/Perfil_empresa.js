let id_empresa = "";
jQuery(function($) {


    let iduser = $(".correo_user").attr("id");
    $.ajax({
        url: 'Busq_empresa.php',
        type: 'POST',
        data: { iduser },
        success: function(response) {

            if (response != "[]") {
                let empresas = JSON.parse(response);


                empresas.forEach(empresa => {

                    document.getElementById('Nempre').innerHTML = empresa.nombre_empresa;
                    document.getElementById('Nemp').innerHTML = empresa.nombre_empresa;
                    $template = `<img class="avatar img-circle img-thumbnail" style="width:80%" alt="avatar" src="data:image/jpg;base64,${empresa.img}" ></img>`
                    document.getElementById('logEmp').innerHTML = $template;
                    document.getElementById('Direc').innerHTML = empresa.Direccion;
                    id_empresa = empresa.id;
                    Taquillas(id_empresa);

                    Turnos(id_empresa);




                });





            }


        }





    })



});

// -----------------------  mostrar boton crear y ocultar el de editar  ---------------------------------

$(document).on("click", "#add_taqui", function() {
    $(".registrar_taq").show();
    $(".edit_taq").hide();
});

//---------------------   Evento envio de formulario para crear un TURNO   ----------------------------

$(document).on("click", "#crear_turno", function() {
    if (($('#nombre_turno').val().length != 0) && ($('#Descrip').val().length != 0) && ($('#Hora_ini').val().length != 0) && ($('#Hora_fin').val().length != 0) && ($('#taq_busq').val().length != 0)) {
        $.ajax({
            url: 'Crear_turno.php',
            type: 'POST',
            data: $('#registrar_turno').serialize(),
            success: function(response) {

                Taquillas(id_empresa);
                $('#modal_turno').modal('hide');
                Listar_turnos(taq);
                $('#registrar_turno')[0].reset();
                $('#taq_busq').val("");
                $("#plus").remove();





            }

        })

    }
});




// ------------------------------------------   REGISTRAR TAQUILLA  ----------------------------------------

$(document).on("click", "#registrar_taqui", function() {

    if ($('#nombre_taq').val().length != 0) {
        $.ajax({
            url: 'CRUD_Taquilla.php',
            type: 'POST',
            data: $('#registrar_taquilla').serialize(),
            success: function(response) {

                Taquillas(id_empresa);
                $('#modal_taquilla').modal('hide');
                $('#registrar_taquilla')[0].reset();



            }

        });
    }


});


// ------------------------------     LISTAR TAQUILLAS EN TABLA   ------------------

function Taquillas($ID_empresa) {
    let idsearch = $ID_empresa;

    $.ajax({
        url: 'CRUD_Taquilla.php',
        type: 'POST',
        data: { idsearch },
        success: function(response) {

            if (response != "[]") {
                let Taquillas = JSON.parse(response);

                document.getElementById('Num_taq').innerHTML = Taquillas.length;
                let template = "";
                let select = ` <option class="hidden" selected disabled>Seleccionar Taquilla...</option>;`;

                Taquillas.forEach(Taquilla => {

                    template += `
                    <tr>
                    <td>${Taquilla.titulo}</td>
                    
                    <td><button id="${Taquilla.id}" name="${Taquilla.titulo}" class="btn btn-secondary ml-1 edit_taqui">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i></button>
                    <button  id="${Taquilla.id}" name="${Taquilla.titulo}" class="btn btn-danger ml-1 delete_taqui">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    </td>
                    </tr>
                    
                    `;
                    select += `
                    <option value="${Taquilla.id}">${Taquilla.titulo}</option>
                    `;



                });

                document.getElementById('taqui_info').innerHTML = template;
                document.getElementById('list_taquis').innerHTML = select;

            } else {
                document.getElementById('Num_taq').innerHTML = 0;

            }

        }

    })

}

//--------------------------------------------  EDITAR TAQUILLA  -------------------------------------------------
let id_taq;
$(document).on("click", ".edit_taqui", function() {


    $("#nombre_taq").val($(this).attr("name"));
    $("#modal_taquilla").modal("show");
    $(".registrar_taq").hide();
    $(".edit_taq").show();
    id_taq = $(this).attr("id");


});

$(document).on("click", "#edit_taqui", function() {
    if ($('#nombre_taq').val().length != 0) {
        let new_name = $('#nombre_taq').val();
        $.ajax({
            url: 'CRUD_Taquilla.php',
            type: 'POST',
            data: { 'id': id_taq, 'new_name': new_name },
            success: function(response) {

                Taquillas(id_empresa);
                $('#modal_taquilla').modal('hide');
                $('#registrar_taquilla')[0].reset();




            }

        })
    }


});

//------------------------------------------   actualizar lista de taquillas  ---------------------------
taq = "";
$(document).ready(function() {
    $('#list_taquis').change(function() {
        let boton = "";
        boton = `
                   
                    <a href="#" class="btn btn-info ml-1 " id="plus" data-toggle="modal" data-target="#modal_turno" >
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                              Agregar Turno
                    </a>
                    
                    `;
        document.getElementById('agregar_turno').innerHTML = boton;
        $('#taq_busq').val($('#list_taquis').val());
        Listar_turnos($('#list_taquis').val());
        taq = $('#list_taquis').val();


    });



});




// ------------------------------------------  MOSTRAR CANTIDAD DE TURNOS  -----------------------------

function Turnos($ID_empresa) {
    let id_taqui = $ID_empresa;
    let ocupados = 0;
    $.ajax({
        url: 'Busq_empresa.php',
        type: 'POST',
        data: { id_taqui },
        success: function(response) {

            if (response != "[]") {
                let Turnos = JSON.parse(response);

                document.getElementById('Num_turn').innerHTML = Turnos.length;

                Turnos.forEach(Turno => {

                    if (Turno.Disponibilidad == 1) {
                        ocupados = ocupados + 1;
                    }


                });
                document.getElementById('Num_soli').innerHTML = ocupados;

            } else {
                document.getElementById('Num_turn').innerHTML = 0;
                document.getElementById('Num_soli').innerHTML = ocupados;

            }


        }





    })

}

//-----------------------------------------------  LISTAR TURNOS EN TABLA   -----------------------------------

function Listar_turnos($ID_Taquilla) {
    let id_taqui_list = $ID_Taquilla;

    $.ajax({
        url: 'Busq_empresa.php',
        type: 'POST',
        data: { id_taqui_list },
        success: function(response) {

            if (response != "[]") {
                let Turnos = JSON.parse(response);

                let template = "";
                Turnos.forEach(Turno => {
                    let disp = "";
                    if (Turno.Disponibilidad == 0) {
                        disp = `
                        <i class="fa fa-check-circle-o"   aria-hidden="true" style="font-size: 2em; color: green"></i> 
                         `
                    } else {
                        disp = `
                        
                        <i class="fa fa-times-circle-o"  style="font-size: 2em; color: red" aria-hidden="true"></i>`
                    }


                    template += `
                    <tr>
                    <td class="info">${Turno.Nombre_turn}</td>
                    <td class="info">${Turno.Descripcion}</td>
                    <td class="info">${Turno.Hora_ini}</td>
                    <td class="info">${Turno.Hora_fin}</td>
                    <td class="Dispo_turn ${Turno.Disponibilidad}">${disp}</td>

                    
                    <td><button id="${Turno.ID_turno}" class="btn btn-secondary ml-1 edit_turn">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i> </button>
                    <button id="${Turno.ID_turno}" class="btn btn-danger ml-1 delete_turn">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    </td>
                    </tr>
                    
                    `






                });
                document.getElementById('turn_info').innerHTML = template;

            } else {
                $("#turn_info tr").remove();
            }


        }





    })

}

// ------------------------------------------  EDITAR TURNOS -----------------------------

Up_IDturn = "";
$(document).on("click", ".edit_turn", function() {
    console.log($(this).attr('id'));
    Up_IDturn = $(this).attr('id');
    dato = "";
    $(this).parents("tr").find(".Dispo_turn").each(function() {
        // valores += $(this).html() + "\n";
        dato = $(this);
    });
    if (dato.hasClass("0")) {
        $('#modal_turno').modal('show');
        $("#crear_turno").hide();
        $("#editar_turno").show();

        var valores = "";

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        Info = Array();
        $(this).parents("tr").find(".info").each(function() {
            // valores += $(this).html() + "\n";
            Info.push($(this).html());
        });

        $("#nombre_turno").val(Info[0]);
        $("#Descrip").val(Info[1]);
        var fecha1 = Info[2].split(" ");
        var H_ini = fecha1[0] + "T" + fecha1[1];
        $("#Hora_ini").val(H_ini);
        var fecha2 = Info[3].split(" ");
        var H_fin = fecha2[0] + "T" + fecha2[1];
        $("#Hora_fin").val(H_fin);


    } else {
        $("body").overhang({
            type: "error",
            message: "Turno apartado, no es posible editar",

        });
    }



});

// -----------------------------------------   EDITAR TURNO ----------------------------------------

$(document).on("click", "#editar_turno", function() {

    Up_nombre = $("#nombre_turno").val();
    Up_descrip = $("#Descrip").val();
    Up_Hini = $("#Hora_ini").val();
    Up_Hfin = $("#Hora_fin").val();
    console.log(Up_Hfin);
    $.ajax({
        url: 'Crear_turno.php',
        type: 'POST',
        data: { 'Up_nombre': Up_nombre, 'Up_descrip': Up_descrip, 'Up_Hini': Up_Hini, 'Up_Hfin': Up_Hfin, 'Up_IDturn': Up_IDturn },
        success: function(response) {

            console.log(response);
            if (response.estado == "true") {
                $("body").overhang({
                    type: "success",
                    message: "Turno actualizado",

                });
            } else {
                $("body").overhang({
                    type: "error",
                    message: "su usuario o contraseña es incorrecto"
                });
            }

            Taquillas(id_empresa);
            $('#modal_turno').modal('hide');
            Listar_turnos(taq);
            $('#registrar_turno')[0].reset();


        }





    })

});

$(document).on("click", "#plus", function() {

    $("#crear_turno").show();
    $("#editar_turno").hide();
    $('#registrar_turno')[0].reset();

});

// ------------------------------------- ELIMINAR TAQUILLA ---------------------------------
taqui_delete = "";
$(document).on("click", ".delete_taqui", function() {
    taqui_delete = $(this).attr('id');
    console.log($(this).attr('id'));
    $('#confirm_delete').modal('show');
    $("#dele_name_taqui").html($(this).attr("name"));

});

$(document).on("click", "#cancelar_delete", function() {
    $('#confirm_delete').modal('hide');
});

$(document).on("click", "#confirmar_delete", function() {
    console.log(taqui_delete);
    $.ajax({
        url: 'CRUD_Taquilla.php',
        type: 'POST',
        data: { 'taqui_delete': taqui_delete },
        success: function(response) {

            console.log("mira " + response);
            if (response == "true") {
                $("body").overhang({
                    type: "success",
                    message: "Taquilla eliminada",

                });
                Taquillas(id_empresa);
                $('#confirm_delete').modal('hide');
            } else if (response == "warm") {
                $("body").overhang({
                    type: "warn",
                    message: "No se puede elimar, existen turnos para esta taquilla"
                });
            }



        }
    })
});

//      --------------------------- Eliminar Turno --------------------------------
dato = "";
ID_delteturn = "";
$(document).on("click", ".delete_turn", function() {
    ID_delteturn = $(this).attr('id');
    $(this).parents("tr").find(".Dispo_turn").each(function() {
        // valores += $(this).html() + "\n";
        dato = $(this);
    });
    $('#confirm_delete_turn').modal('show');

    Info = Array();
    $(this).parents("tr").find(".info").each(function() {
        // valores += $(this).html() + "\n";
        Info.push($(this).html());
    });



    $("#Del_nom").html(Info[0]);
    $("#Del_desc").html(Info[1]);
    $("#Del_Hini").html(Info[2]);
    $("#Del_fin").html(Info[3]);

});

$(document).on("click", "#cancelar_delete_turn", function() {
    $('#confirm_delete_turn').modal('hide');
});

$(document).on("click", "#confirm_delet_turn", function() {

    if (dato.hasClass("0")) {
        $.ajax({
            url: 'Crear_turno.php',
            type: 'POST',
            data: { 'ID_delteturn': ID_delteturn },
            success: function(response) {

                console.log(response);
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Turno eliminado",

                    });
                    Taquillas(id_empresa);
                    console.log($('#taq_busq').val());
                    Listar_turnos(taq);
                    $('#confirm_delete_turn').modal('hide');

                }



            }
        });
    } else {
        $("body").overhang({
            type: "warn",
            message: "No se puede elimar, el turno esta apartado"
        });
    }
});

//---------------------------------------  Cambiar informacion personal ----------------------------------

$(document).on("click", "#update_info", function() {

    $("#modal_Update_info").modal("show");

    $("#Form_upnamme").val($("#Name_user").html());
    $("#Form_upnapellido").val($("#Apell_user").html());
    $("#Form_upnameempre").val($("#Nemp").html());
    $("#Form_updirect").val($("#Direc").html());
    $("#Form_uptel").val($("#Up_tel").html());

    console.log($("#Nemp").html());

});

$(document).on("click", "#confirm_upinfo", function() {

    $("#up_id").val($(".correo_user").attr("id"));

    $.ajax({
        url: 'Actualizar_info_empresa.php',
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