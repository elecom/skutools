mostrarMensaje = function(msg, tipo) {
    $.messageAdd({
        text: msg,
        stay: false,
        type: tipo
    });
};

inicio = function() {
    
    // Anular citas vencidas
    /*$.ajax({
        url: "servidor/modulo/operacion.php",
        type: "POST",
        dataType: "json",
        beforeSend: function() {
            $.blockUI({message: "Anulando Citas Vencidas...", overlayCSS: {backgroundColor: 'rgba(147, 207, 241, 0.84)'}});
        },
        data:{
            op:2
        }
    }).done(function(data){
        $.unblockUI();
    });*/
    
    $("#btnEntrar").button().click(function() {
        if ($("#txtLogin").val() === "") {
            mostrarMensaje("Debe ingresar el login de usuario.", "error");
            $("#txtLogin").focus();
        }
        else if ($("#txtLogin").val().length < 5) {
            mostrarMensaje("El login de usuario no puede tener una longitud m&iacute;nima de 5 car&aacute;cteres.", "error");
            $("#txtLogin").val("").focus();
        }
        else if ($("#txtLogin").val().length > 30) {
            mostrarMensaje("El login de usuario no puede tener una longitud m&aacute;xima de 30 car&aacute;cteres.", "error");
            $("#txtLogin").val("").focus();
        }
        else if ($("#passClave").val() === "") {
            mostrarMensaje("Debe ingresar la clave del usuario.", "error");
            $("#passClave").focus();
        }
        else if ($("#passClave").val().length < 6) {
            mostrarMensaje("La clave del usuario no puede tener una longitud m&iacute;nima de 6 car&aacute;cteres.", "error");
            $("#passClave").val("").focus();
        }
        else {
            $.ajax({
                url: "servidor/chequear.php",
                type: "POST",
                dataType: "json",
                beforeSend: function() {
                    $.blockUI({message: "Verificando datos...", overlayCSS: {backgroundColor: 'rgba(147, 207, 241, 0.84)'}});
                },
                data: {
                    acceso: 1,
                    login: $.trim($("#txtLogin").val()),
                    clave: $.trim($("#passClave").val())
                }
            }).done(function(data) {
                $.unblockUI();

                if (data === "" || data === undefined) {
                    mostrarMensaje("Problemas con el servidor.", "error");
                }
                else {
                    if (data["encontrado"]) {
                            $("#txtLogin, #passClave").val("");
                            /*$.map(data["datos"], function(item){
                              
                                if(item.departamento === "1"){
                                   window.location = "servidor/sistema";
                                }
                                else if(item.departamento === "2"){
                                   window.location = "servidor/coordinacion";
                                }
                                else if(item.departamento === "3"){
                                   window.location = "servidor/bioanalisis";
                                }
                                else if(item.departamento === "4"){
                                   window.location = "servidor/administracion";
                                }
                                else if(item.departamento === "5"){
                                   window.location = "servidor/recepcion";
                                   //window.location = "servidor/bioanalisis";
                                }
                            });*/
                            window.location = "servidor/modulo/";
                    }
                    else {
                        mostrarMensaje("Login/Clave inv&aacute;lida.", "error");
                        $("#txtLogin, #passClave").val("");
                        //$("#txtLogin").focus();
                    }
                }
            });
        }
    });

    $("#btnLimpiar").button().click(function() {
        $("#txtLogin, #passClave").val("");
        $("#txtLogin").focus();
    });

    $("input[type=text], input[type=password]").bind({
        "focus": function() {
            $(this).animate({backgroundColor: "#ffc"});
        },
        "blur": function() {
            $(this).animate({backgroundColor: "#fff"});
        }
    });
    
    // Campo de Texto Login
    $("#txtLogin").keypress(function(evt){
        if(evt.which === 13){
            if($(this).val() !== ""){
                $("#passClave").focus();
            }
            else{
                mostrarMensaje("Debe ingresar el login del usuario.","error");
                $(this).focus();
            }
                
        }
    });
    
    // Campo de Texto Clave
    $("#passClave").keypress(function(evt){
       if(evt.which === 13){
           if($(this).val() !== ""){
               $("#btnEntrar").focus();
           }
           else{
                mostrarMensaje("Debe ingresar la clave del usuario.","error");
                $(this).focus();
           }
       } 
    });
    
    
    
    
    //$("input[type=text],input[type=password],input[type=button]").tooltip({ position: { my: "left+15 center", at: "right center" }}, {tooltipClass: "fuente_tooltip"}, { show: { effect: "blind", duration: 400 } } );
    $("input:button").css("font-size", "11px");
    $(".ui-widget").css("font-size", "11px");
    $("#txtLogin").focus();
};

$(document).on("ready", function() {
    inicio();
});

