$(document).ready(function() {
    // Advertencia de registrar Empresa
$(document).on('click', '.advertencia', function(e) {

    e.preventDefault(); // Para que no recargue la pag


    var formulario = document.getElementById("formUser");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'ModuleAdmin/addUser.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
          // console.log(datosTraidos);
          
           if(datosTraidos == '1'){
               location.href="?menu=clients";
           } else if(datosTraidos == '23'){
               location.href="?menu=administrators";
            }else if(datosTraidos == '4') {
               location.href="?menu=readers";
            }else if(datosTraidos == '5') {
                location.href="?menu=authors";
            }else if(datosTraidos == '6') {
                location.href="?menu=editorials";
             }else{
                $('.toast-body').html(datosTraidos);
                $('.toast').toast('show');  
            }
        }
    });
});

$(document).on('click', '.advertencia2', function(e) {

    e.preventDefault(); // Para que no recargue la pag


    var formulario = document.getElementById("editUser");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'ModuleAdmin/editUsers.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
          // console.log(datosTraidos);

           if(datosTraidos == '1'){
            location.href="?menu=clients";
        } else if(datosTraidos == '23'){
            location.href="?menu=administrators";
         }else if(datosTraidos == '4') {
            location.href="?menu=readers";
         }else if(datosTraidos == '5') {
             location.href="?menu=authors";
         }else if(datosTraidos == '6') {
             location.href="?menu=editorials";
          }else{
             $('.toast-body').html(datosTraidos);
             $('.toast').toast('show');  
         }
        }
    });
});
});
