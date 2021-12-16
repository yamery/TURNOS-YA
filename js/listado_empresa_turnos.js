/*global Sly */
jQuery(function($) {
    $('#prev').hide();
    $('#next').hide();
    'use strict';

    // Detect IE.
    // Feature detection of "transform-style: preserve-3d" doesn't work, so this
    // is the only way how to fall back to a 2D front page example in IE that
    // doesn't have a full support of 3D transforms across the board.
    document.getElementsByTagName('html')[0].className += ' ' +
        (~window.navigator.userAgent.indexOf('MSIE') ? 'ie' : 'no-ie');

    // ==========================================================================
    //   Header example
    // ==========================================================================
    var $example = $('#example');
    var $frame = $('#emp');
    window.frr = $frame;
    var sly = new Sly($frame, {
        horizontal: 1,
        itemNav: 'basic',
        activateMiddle: 1,
        smart: 1,
        activateOn: 'click',
        mouseDragging: 1,
        touchDragging: 1,
        releaseSwing: 1,
        startAt: 1,
        scrollBar: $example.find('.scrollbar'),
        scrollBy: 1,
        pagesBar: $example.find('.pages'),
        speed: 200,
        moveBy: 100,
        elasticBounds: 1,
        dragHandle: 1,
        dynamicHandle: 1,
        clickBar: 1,
        // Buttons

        prev: $example.find('.backward'),
        next: $example.find('.forward'),

    }).init();
    var $frame = $('#emp');
    // -------------------------------------------LISTADO DE EMPRESAS -----------------------------------------
    $.ajax({
        url: 'list-empresas.php',
        type: 'GET',
        success: function(response) {
            let empresas = JSON.parse(response);
            let template = '';
            empresas.forEach(empresa => {
                template +=
                    `<li class="empresa" id="${empresa.id}" >		                    
                <div class="card mb-0 tarjetaTurn " >
                    <h3 class="tit card-header" style="text-transform: uppercase;">${empresa.nombre_empresa}</h3>
                     <img class="rounded mx-auto my-auto d-block img-card" style=" display: block;" src="data:image/jpg;base64,${empresa.img}" alt="Card image">
                </div>
			</li>`

            });

            $frame.sly('add', template);


        }
    });

    //--------------------------------------------------- LISTA TAQUILLAS ---------------------------------------------------

    (function() {
        var $taquilla = $('#taqui');
        var $frameT = $('#taq');
        window.frr = $frameT;
        var sly = new Sly($frameT, {
            horizontal: 1,
            itemNav: 'basic',
            activateMiddle: 1,
            smart: 1,
            activateOn: 'click',
            mouseDragging: 1,
            touchDragging: 1,
            releaseSwing: 1,
            startAt: 1,
            scrollBar: $taquilla.find('.scrollbar'),
            scrollBy: 1,
            pagesBar: $taquilla.find('.pages'),
            speed: 200,
            moveBy: 100,
            elasticBounds: 1,
            dragHandle: 1,
            dynamicHandle: 1,
            clickBar: 1,
            // Buttons

            prev: $taquilla.find('.backward'),
            next: $taquilla.find('.forward'),

        }).init();
    }());

    // --------------------------------------------       LISTAR TURNOS VERTICAL     --------------------------------------------------------

    (function() {
        var $frame = $('#smart');
        var $slidee = $frame.children('ul').eq(0);
        var $wrap = $frame.parent();

        // Call Sly on frame
        $frame.sly({
            itemNav: 'basic',
            smart: 1,
            activateOn: 'click',
            mouseDragging: 1,
            touchDragging: 1,
            releaseSwing: 1,
            startAt: 3,
            scrollBar: $wrap.find('.scrollbar'),
            scrollBy: 1,
            pagesBar: $wrap.find('.pages'),
            activatePageOn: 'click',
            speed: 200,
            elasticBounds: 1,
            easing: 'easeOutExpo',
            dragHandle: 1,
            dynamicHandle: 1,
            clickBar: 1,

            prev: $wrap.find('#prev'),
            next: $wrap.find('#next'),
        });

    }());





});

// --------------------------- LISTADO TURNOS SEGUN LA EMPRESA -------------------------------

// --------------------------- FUNCION TEMPORIZADOR ------------------------------------------
function temporizador() {

    crono = "#T1";
    // hoy = new Date();
    // console.log(hoy.getMinutes() + 2)
    $(crono).timer('remove');
    $(crono).timer({
        countdown: true,
        duration: 10, // The time to countdown from. `seconds` and `duration` are mutually exclusive
        callback: function() {

            $('#C1').removeClass("bg-c-blue");
            $('#C1').addClass("bg-c-pink");
            document.querySelector(".T1").setAttribute("data-target", "#");
        },
        format: '%H:%M:%S', // Format to show time in



    });


}

//--------------------------------------------- LISTAR TAQUILLAS SEGUN LA EMPRESA-----------------------------------------------------------


$(document).on("click", ".empresa", function() {

    apar_Nempre = $($(this).find(".tit")).text();

    var $frame = $('#taq');
    $('#prev').hide();
    $('#next').hide();
    $("#taquis").empty();
    $("#tarjetas").empty();

    let idsearch = $(this).attr("id");


    $.ajax({
        url: 'list_taquillas.php',
        type: 'POST',
        data: { idsearch },
        success: function(response) {
            console.log(response);
            if (response != "[]") {
                let taquillas = JSON.parse(response);
                let template = '';


                taquillas.forEach(taquilla => {


                    template +=
                        `<li class="taquilla taq" id="${taquilla.id}" >		                    
                
               <div class="card mb-0 tarjetaTurn " >
                <h3 class="card-body center pt-5 tit" style="text-transform: uppercase; ">${taquilla.titulo}</h3>
                 
            </div>
			</li>`;





                });



                $frame.sly('add', template);


            } else {

                let template = `<li class="taq">		                    
                
                <div class="card mb-0 " >
                <h3 class="card-body center " style="text-transform: uppercase;">No hay taquillas disponibles</h3>
                 
            </div>
			</li>`;





                $frame.sly('add', template);

            }


        }





    })





});


//------------------------------------------------------------------------------------------------------
var $frame = $('#smart');



$(document).on("click", ".turno", function() {
    let idTurno = $(this).attr("id");

    $(document).on("click", ".apartar", function() {


        $('#C' + idTurno).removeClass("bg-c-blue");
        $('#C' + idTurno).addClass("bg-c-green ");
    });
});





$(document).on("click", ".taquilla", function() {

    apar_Ntaqui = $($(this).find(".tit")).text();


    $('#prev').show();
    $('#next').show();
    $("#tarjetas").empty();

    let idsearch = $(this).attr("id");

    console.log(idsearch);

    $.ajax({
        url: 'list_turnos.php',
        type: 'POST',
        data: { idsearch },
        success: function(response) {

            if (response != "[]") {
                let turnos = JSON.parse(response);
                let template = '';

                let tiempo;
                turnos.forEach(turno => {

                    let color = "";
                    let target = "";
                    if (turno.dispo == 0) {
                        color = "bg-c-blue";
                        target = "#modalLRForm";
                    } else {
                        color = "bg-c-yellow";
                        target = "#";
                    }

                    template += ` 	<li >
       
        <a data-toggle="modal" class="T${turno.id} turno" id="${turno.id}" data-target="${target}">
        <div class="card turn mb-0 ${color} order-card" id="C${turno.id}">
        <kbd class="tit">${turno.titulo}</kbd>
        <div class="card-body">

            <h5 > <strong>Inicio: </strong> <span class="H_ini">${turno.hora_ini} </span></h5>
            <h5 > <strong>Fin: </strong><span class="H_fin">${turno.hora_fin}</span> </h5>
            <h5 > <strong>Tiempo Restante:</strong> <span id="T${turno.id}"></span> </h5>
            
            <h5><strong>LUGAR:</strong> EJEMPLO</h5>
        </div>
        <div class="card-footer">
            <h1 style="color:white">DESCRIPCION: </h1>
             <p style="line-height: 35px; color:black">${turno.descripcion}</p>
        </div>
    </div>

        </a>
                </li>`;






                });



                $frame.sly('add', template);
                $("#turnos").show();


            } else {
                $('#prev').hide();
                $('#next').hide();
                let template = `<li>
       
                <a href="#">
                <div class="card turn mb-0  bg-c-pink order-card">
                <kbd>NO HAY TURNOS DISPONIBLES</kbd>
                <div class="card-body">
        
                    <h1 > <strong>ESTA TAQUILLA ACTUALMENTE NO TIENE TURNOS </strong>  </h1>
                    <img src="img/busqueda.png" style="width:30%"></img>
            
                    
                   
                </div>
                
            </div>
        
                </a>
                        </li>`





                $frame.sly('add', template);
                $("#turnos").show();
            }


        }





    })





});

var apar_Nempre = "";
var apar_Ntaqui = "";


$(document).on("click", ".turno", function() {
    let user_id = $(".correo_user").attr('id');
    let turn_id = $(this).attr('id');
    $('.indi_turno').val($(this).attr('id'));


    if ($("#apartar_login span").length > 0) {
        $("#apar_empre").empty();
        $("#apar_taqui").empty();
        $("#apar_horaini").empty();
        $("#apar_horafin").empty();
        $("#apar_empre").append(apar_Nempre);
        $("#apar_taqui").append(apar_Ntaqui);
        $("#apar_horaini").append($($(this).find(".H_ini")).text());
        $("#apar_horafin").append($($(this).find(".H_fin")).text());

        $("#con_apar").on("click", function() {

            console.log(user_id, turn_id);
            $.ajax({
                url: 'apartar_turno.php',
                type: 'POST',
                data: { 'id_user': user_id, 'id_turn': turn_id },
                success: function(response) {

                    if (response.estado == "true") {
                        $("body").overhang({
                            type: "success",
                            message: "Apartando turno...",
                            callback: function() {
                                location.reload();
                            }
                        });
                        $('.indi_turno').val("");
                    } else {
                        $("body").overhang({
                            type: "error",
                            message: "Error en el apartado"
                        });
                    }
                }
            });
        });



    }
});



$(document).on("show", '#modal_turno', function() {
    console.log(ID_turno_select);
});