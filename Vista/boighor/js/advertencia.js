$(document).ready(function() {

$(document).on('click', '.adRegistroUser', function(e) {

    e.preventDefault(); // Para que no recargue la pag

    var formulario = document.getElementById("formRegistro");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'registrarUsuario.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
            
            if(datosTraidos==1){
                
                $('.overlay').addClass('active');
                $('.popup').addClass('active');
            }else{
               
                $('.toast-body').html(datosTraidos);
                $('.toast').toast('show');
                
            }
        }
    });
});


$(document).on('click', '.devolver-popup', function(e) {
    window.location.href="login.php";
});

$(document).on('click', '.advertenciaLogin', function(e) {
    
    e.preventDefault(); // Para que no recargue la pag


    var formulario = document.getElementById("formLogin");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'validarLogin.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
            console.log(datosTraidos);
           if(datosTraidos == 'loginUser'){
            location.href="User.php";
            
           }else if(datosTraidos == 'loginAdmin'){
            location.href="Admin.php";
           }else if (datosTraidos == 'cambiarContrasena') {
            var valor = $("#email").val();
            $("#email_cambio").val(valor);
            $('#modalCambio').modal('show');
           } else{
            $('.toast-body').html(datosTraidos);
            $('.toast').toast('show');
        }
    }
    });
});

$(document).on('click', '.modifyBook', function(e) {

    e.preventDefault(); // Para que no recargue la pag

    var formulario = document.getElementById("formModificar");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'ModuleUser/modifyBook.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
            
            if(datosTraidos==1){
                
                $('.overlay').addClass('active');
                $('.popup').addClass('active');
            }else{
               
                $('.toast-body').html(datosTraidos);
                $('.toast').toast('show');
                
            }
        }
    });
});

$(document).on('click', '.modifyArticle', function(e) {

    e.preventDefault(); // Para que no recargue la pag

    var formulario = document.getElementById("formModificar");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'ModuleUser/modifyArticle.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
            
            if(datosTraidos==1){
                
                $('.overlay').addClass('active');
                $('.popup').addClass('active');
            }else{
               
                $('.toast-body').html(datosTraidos);
                $('.toast').toast('show');
                
            }
        }
    });
});

$(document).on('click', '.modifyPresentation', function(e) {

    e.preventDefault(); // Para que no recargue la pag

    var formulario = document.getElementById("formModificar");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'ModuleUser/modifyPresentation.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
            
            if(datosTraidos==1){
                
                $('.overlay').addClass('active');
                $('.popup').addClass('active');
            }else{
               
                $('.toast-body').html(datosTraidos);
                $('.toast').toast('show');
                
            }
        }
    });
});

$(document).on('click', '.modifyUser', function(e) {

    e.preventDefault(); // Para que no recargue la pag

    var formulario = document.getElementById("formModificar");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'ModuleUser/modUser.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
            
            if(datosTraidos==1){
                
                $('.overlay').addClass('active');
                $('.popup').addClass('active');
            }else{
               
                $('.toast-body').html(datosTraidos);
                $('.toast').toast('show');
                
            }
        }
    });
});

$(document).on('click', '.adCambio', function(e) {
    
    e.preventDefault(); // Para que no recargue la pag


    var formulario = document.getElementById("formLogin");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'cambiarContrasena.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
            console.log(datosTraidos);
           if(datosTraidos == 'correcto'){
            location.href="User.php";
           }else{
            $('.toast-body').html(datosTraidos);
            $('.toast').toast('show');
        }
    }
    });
});

});

