 <?php
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Document.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Document_Type.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument_Type.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Book.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoBook.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Presentation.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoPresentation.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Article.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoArticle.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoUser.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/User.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Editorial.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoEditorial.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/State.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoState.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoAuthor_Document.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoCategory.php';
 

 $obj = new Conexion();
 $conexion = $obj->conectarDB();

 ManejoDocument::setConexionBD($conexion);
 ManejoDocument_Type::setConexionBD($conexion);
 ManejoBook::setConexionBD($conexion);
 ManejoPresentation::setConexionBD($conexion);
 ManejoArticle::setConexionBD($conexion);
 ManejoUser::setConexionBD($conexion);
 ManejoEditorial::setConexionBD($conexion);
 ManejoState::setConexionBD($conexion);
 ManejoAuthor_Document::setConexionBD($conexion);
ManejoCategory::setConexionBD($conexion);

 $_SESSION['list'] = array();
 $_SESSION['listCat'] = array();
 $_SESSION['editorialAct'] = new Editorial();
 
 $tipos = ManejoDocument_Type::getList();

 $categorias = ManejoCategory::obtenerLista();

 
 ?>
 <style type="text/css">
     .sc{
            width: 100%;
            overflow-y: scroll;
            height: 768px;
     }

 </style>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <!-- Start main Content -->
        <section class="wn__checkout__area section-padding--lg bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12  sc">
                        <div class="customer_details">
                            <h3>Create a New Document</h3>
                            <form method="POST" action="ModuleUser/crearDocumento.php">
                            <div class="customar__field">
                                <div class="input_box">
                                    <label>Document Title <span>*</span></label>
                                    <input type="text" id="title" name="title">
                                </div>
                                <div class="input_box">
                                    <label>Document Type<span>*</span></label>
                                    <select class="select__option" onchange="selectTipo()" required id="tipo" name="tipo">
                                        <option value="0">Select a Type</option>
                                        <?php
                                        foreach ($tipos as $t) {
                                            echo '<option value="'.$t->getCod_t_documento().'">'.$t->getNom_t_documento().'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="customar__field" id="espacioTipo" name="espacioTipo">

                            	</div>
                                <div class="margin_between">
                                    <div class="input_box space_between" >
                                        <label>Category</label>
                                        <input type="text" id="categoria" name="categoria" >
                                    </div>
                                    <div class="input_box space_between">
                                        <label>Add the Category</label>
                                        <span class="btn btn-sm btn-success btn_addCat"  name="btn_addCat" id="btn_addCat">Add</span>
                                    </div>
                                </div>
                                <div class="input_box ">
                                    <label>Select the Category</label>
                                    <select class="select__option" id="resCategoria" disabled>
                                        
                                    </select>
                                </div>
                                <div class="input_box" name="categorias" id="categorias">
                                    
                                </div>
                                <div class="margin_between">
                                    <div class="input_box space_between">
                                        <label>Search Author</label>
                                        <input type="text"  id="autor" name="autor">
                                    </div>
                                    <div class="input_box space_between">
                                        <label>Add the Author</label>
                                        <span class="btn btn-sm btn-success btn_addAut" name="btn_addAut" id="btn_addAut">Add</span>
                                    </div>
                                </div>

                                <div class="input_box">
                                	<label>Select the Autor</label>
                                    <select class="select__option" id="respAutor" disabled>
                                    	
                                    </select>
                                </div> 
                                <div class="input_box" name="autores" id="autores">
                                    
                                </div>
                                <div class="margin_between">
                                    <div class="input_box space_between">
                                        <label>Editorial <span>*</span></label>
                                        <input type="text" id="editorial" name="editorial" placeholder="">
                                    </div>
                                    <div class="input_box space_between">
                                        <label>Add the Editorial</label>
                                        <span class="btn btn-sm btn-success btn_addEdi" id="btn_addEdi" name="btn_addEdi" id="btn_addEdi">Add</span>
                                    </div>
                                </div>
                               	<div class="input_box">
                               		<label>Select the Editorial</label>
                                    <select class="select__option" id="respEdi" name="respEdi"disabled>
                                    	
                                    </select>
                                </div>
                                <div class="input_box" name="editoriales" id="editoriales">
                                    <input type="hidden" id="numEdit" name="numEdit" value="">
               						                 	

                                </div>     
                                <div class="input_box">
                                    <label>Import the File <span>(.pdf)</span></label>
                                    <input type="file" name="archivo" accept=".pdf" id="archivo" placeholder="Insert File" required onchange="PreviewImage();">
                                </div>
                                    <button type="submit">Crear</button> 
                            </div>
                            </form>
                         </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <label>Document Preview</label>
                        <div class="wn__order__box" style="clear:both">
                            <iframe id="viewer" frameborder="0" scrolling="no" width="100%" height="768"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<script>
  function selectTipo() {
  var tipo = $("#tipo").val();
  $.ajax({
    url:"ModuleUser/selectTipo.ajax.php",
    method: "POST",
    data: {
      "tipo":tipo
      },
      success: function(respuesta){
        $("#espacioTipo").html(respuesta);
      }
    })
  }
</script>

<script>
    $("#autor").on('input',function(){ 
    var autor = $("#autor").val();
            $.ajax(
                {
                url: "ModuleUser/buscarAutor.php?autor="+autor,
                method: 'GET',
                    data: {
			      "autor":autor
			      },
                success: function( data ) {
                	console.log(data.length);
                	console.log(data);
                	if (data.length == '') {
                		$("#respAutor").prop('disabled', true);
                	}else{
                		$("#respAutor").prop('disabled', false);
                		$("#respAutor").html(data);
                	}
                } 
                    
                }
            );
        }
    );

    var autoresActuales = [];
    var prueba;
    var temp = 0;
    var respAutor;
    var cod;
    $( "#respAutor" ).click( function() {
    	respAutor = $("#respAutor").val();
        
    	if (respAutor != 0){
    		var contenedor = document.getElementById('autores');
    		var x = autoresActuales.indexOf(respAutor);
            console.log('X:'+x);
   			var newLabel = document.createElement('label');
    			newLabel.innerHTML = (respAutor);
            
    		cod = newLabel.innerHTML
    		if (x == -1){
                temp++;
    			$.ajax({
    				url : "ModuleUser/listarAutores.ajax.php",
    				method : 'POST',
    				data:{
    					"cod":cod,
                        "temp":temp  
    				},
    				success: function( data ) {
						$("#autores").html(data);
                        $("#autor").val('');
                		}
    				});
    			autoresActuales.push(newLabel.innerHTML);
                console.log(autoresActuales);
                
    		}
            
		}
	});

    $(document).on('click', '.btn_borrar_Aut', function () {
        var id = $(this).attr('id');
        var cod = $('#autor'+id).val();
        var nom = $('#autorN'+id).val();
        $.ajax({
                    url : "ModuleUser/borrarAutores.ajax.php",
                    method : 'POST',
                    data:{
                        "cod":id,
                        "temp":temp,
                        "nom":nom
                    },
                    success: function( data ) {
                         $('#labelAut'+id).remove();
                         $('#autor'+id).remove();
                         $('#autorN'+id).remove();
                        let pos = autoresActuales.indexOf(cod);
                        let posN = autoresActuales.indexOf(nom);
                        console.log('pos:'+pos);
                        autoresActuales.splice(pos, id);
                        autoresActuales.splice(posN, id);
                        $("#autores").html(data);
                       }
                    });
  
    });

    $(document).on('click', '.btn_addAut', function () {
        respAutor = $("#autor").val();
        if (respAutor != 0){
            var contenedor = document.getElementById('autores');
            var x = autoresActuales.indexOf(respAutor);
            console.log('X:'+x);
            var newLabel = document.createElement('label');
                newLabel.innerHTML = (respAutor);
           
            nom = newLabel.innerHTML
            if (x == -1){
                temp++;
                $.ajax({
                    url : "ModuleUser/listarAutoresNuevos.ajax.php",
                    method : 'POST',
                    data:{
                        "nom":nom,
                        "temp":temp,
   
                    },
                    success: function( data ) {
                        $("#autores").html(data);
                        $("#autor").val('');
                        }
                    });
                autoresActuales.push(newLabel.innerHTML);
                console.log(autoresActuales);
                
            }
            
        }
    
    });
</script>

<script>
    $("#categoria").on('input',function(){ 
    var categoria = $("#categoria").val();
            $.ajax(
                {
                url: "ModuleUser/buscarCategoria.php?categoria="+categoria,
                method: 'GET',
                    data: {
                  "categoria":categoria
                  },
                success: function( data ) {
                    console.log(data.length);
                    console.log(data);
                    if (data.length == '') {
                        $("#resCategoria").prop('disabled', true);
                    }else{
                        $("#resCategoria").prop('disabled', false);
                        $("#resCategoria").html(data);
                    }
                } 
                    
                }
            );
        }
    );

    var categoriasActuales = [];
    var temp = 0;
    var resCategoria;
    var cod;
    $( "#resCategoria" ).click( function() {
        resCategoria = $("#resCategoria").val();
        if (resCategoria != 0){
            var contenedor = document.getElementById('categorias');
            var x = categoriasActuales.indexOf(resCategoria);
            console.log('X:'+x);
            var newLabel = document.createElement('label');
                newLabel.innerHTML = (resCategoria);
           
            cod = newLabel.innerHTML
            if (x == -1){
                temp++;
                $.ajax({
                    url : "ModuleUser/listarCategorias.ajax.php",
                    method : 'POST',
                    data:{
                        "cod":cod,
                        "temp":temp,
   
                    },
                    success: function( data ) {
                        $("#categorias").html(data);
                        $("#categoria").val('');
                        }
                    });
                categoriasActuales.push(newLabel.innerHTML);
                console.log(categoriasActuales);
                
            }
            
        }
    });

    
    $(document).on('click', '.btn_borrar_Cat', function () {
        var id = $(this).attr('id');
        var cod = $('#category'+id).val();
        var nom = $('#categoryN'+id).val();
        $.ajax({
                    url : "ModuleUser/borrarCategorias.ajax.php",
                    method : 'POST',
                    data:{
                        "cod":id,
                        "temp":temp,
                        "nom":nom
                    },
                    success: function( data ) {
                        $('#labelCat'+id).remove();
                        $('#category'+id).remove();
                        $('#categoryN'+id).remove();
                        let pos = categoriasActuales.indexOf(cod);
                        let posN = categoriasActuales.indexOf(nom);
                        console.log('pos:'+pos);
                        categoriasActuales.splice(pos, id);
                        categoriasActuales.splice(posN, id);
                        $("#categorias").html(data);
                       }
                    });
  
    });

    $(document).on('click', '.btn_addCat', function () {
        resCategoria = $("#categoria").val();
        if (resCategoria != 0){
            var contenedor = document.getElementById('categorias');
            var x = categoriasActuales.indexOf(resCategoria);
            console.log('X:'+x);
            var newLabel = document.createElement('label');
                newLabel.innerHTML = (resCategoria);
           
            nom = newLabel.innerHTML
            if (x == -1){
                temp++;
                $.ajax({
                    url : "ModuleUser/listarCategoriasNuevas.ajax.php",
                    method : 'POST',
                    data:{
                        "temp":temp,
                        "nom":nom
   
                    },
                    success: function( data ) {
                        $("#categorias").html(data);
                        $("#categoria").val('');
                        }
                    });
                categoriasActuales.push(newLabel.innerHTML);
                console.log(categoriasActuales);
                
            }
            
        }
     });
</script>


<script>
    $("#editorial").on('input',function(){ 
    var editorial = $("#editorial").val();
            $.ajax(
                {
                url: "ModuleUser/buscarEditorial.php?editorial="+editorial,
                method: 'GET',
                    data: {
			      "editorial":editorial
			      },
                success: function( data ) {
                	console.log(data.length);
                	console.log(data);
                	if (data.length == '') {
                		$("#respEdi").prop('disabled', true);
                	}else{
                		$("#respEdi").prop('disabled', false);
                		$("#respEdi").html(data);
                	}
                } 
                    
                }
            );
        }
    );
    var editorialesActuales = [];
    var prueba;
    var temp = 0;
    $( "#respEdi" ).click( function() {
    	var respEdi = $("#respEdi").val();
    	if (respEdi != 0){
    		var contenedor = document.getElementById('editoriales');
    		var x = editorialesActuales.indexOf(respEdi);
   			var newLabel = document.createElement('label');
    			newLabel.innerHTML = (respEdi);

    		var	cod = newLabel.innerHTML
    		if (x == -1){
    			$.ajax({
    				url : "ModuleUser/listarEditoriales.ajax.php",
    				method : 'POST',
    				data:{
    					"cod":cod
    				},
    				success: function( data ) {
						prueba = $("#editoriales").html(data);
                		}
    				});
    			temp++;
    			editorialesActuales.push(newLabel.innerHTML);
    		}
		}
	}
  );

    $(document).on('click', '.btn_borrar_Edi', function () {
          var id = $(this).attr('id');
          $('#labelEdi'+id).remove();
          $('#editorial'+id).remove();
        });

    $(document).on('click', '.btn_addEdi', function () {
        respEdi = $("#editorial").val();
        if (respEdi != 0){
            var contenedor = document.getElementById('editoriales');
            var x = editorialesActuales.indexOf(respEdi);
            console.log('X:'+x);
            var newLabel = document.createElement('label');
            newLabel.innerHTML = (respEdi);
               
            nom = newLabel.innerHTML
            if (x == -1){
                temp++;
            $.ajax({
                url : "ModuleUser/listarEditorialNueva.ajax.php",
                method : 'POST',
                data:{
                    "nom":nom,
                    "temp":temp,
                    },
                    success: function( data ) {
                    $("#editoriales").html(data);
                    $("#editorial").val('');
                    }
                });
                }
            }
    });
</script>


<script type="text/javascript">
    function crearDocumento() {
        var title = $("#title").val();
        var tipo = $("#tipo").val();
        var autor = $("#autor").val();
        var editorial = $("#editorial").val();
        $.ajax({
            url:"ModuleUser/crearDocumento.php",
            method: 'POST',
            data:{

            },
            success:function(data){

            }
        });
    }
</script>

<script type="text/javascript">
    function PreviewImage() {
        pdffile=document.getElementById("archivo").files[0];
        pdffile_url=URL.createObjectURL(pdffile);
        $('#viewer').attr('src',pdffile_url);
    }
</script>

