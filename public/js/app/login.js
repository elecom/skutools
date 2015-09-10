mostrarMensaje = function(msg, tipo) {
    $.messageAdd({
        text: msg,
        stay: false,
        type: tipo
    });
};

validarEmail = function(email) {
    var filtro = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if (filtro.test(email)) {
        return true;
    }
    else {
        return false;
    }
};

inicio = function() {

    $("#txtFecha").datepicker({
        dateFormat: "yy-mm-dd"
    });
    
    $("#registrarse").click(function(){
       window.location = "reg_usuario.php"; 
    });

    $("#btnEntrar").button().click(function() {
        
    });
        

    $("#btnLimpiar").button().click(function() {
        $("#email, #password, #hdPagina").val("");
        $("#email").focus();
    });
    
    $("#email").keyup(function() {
        $(this).val($(this).val().toLowerCase());
    });

    $("input[type=text], input[type=password]").bind({
        "focus": function() {
            $(this).animate({backgroundColor: "#ffc"});
        },
        "blur": function() {
            $(this).animate({backgroundColor: "#fff"});
        }
    });

    $("input:button").css("font-size", "11px");
    $(".ui-widget").css("font-size", "11px");
    $("#email").focus();
};

limpiar = function(){
    $("#email, #password, #hdPagina").val("");
    $("#email").focus();
};

$(document).on("ready", function() {
    limpiar();
    inicio();
});

