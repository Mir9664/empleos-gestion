<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
   <!-- <link rel="shortcut icon" href="../images/Logo (Copiar).png" type="image/x-icon">-->
    <script src="../js/jquery.min.js"></script>
    <?php
        require '../seguridad/conn_mysqli.php';
        include '../includes/head.php';
     ?>
     <script >
                 $(document).ready(function() {
                //variables
                    var pass1 = $('[name=password]');
                    var pass2 = $('[name=pas]');
                    var confirmacion = "Las contraseñas si coinciden";
                    var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
                    var negacion = "No coinciden las contraseñas";
                    var vacio = "La contraseña no puede estar vacía";
                    //oculto por defecto el elemento span
                    var span = $('<span></span>').insertAfter(pass2);
                    span.hide();
                    //función que comprueba las dos contraseñas
                    function coincidePassword(){
                    var valor1 = pass1.val();
                    var valor2 = pass2.val();
                    //muestro el span
                    span.show().removeClass();
                    //condiciones dentro de la función
                    if(valor1 != valor2){
                    span.text(negacion).addClass('negacion');   
                    }
                    if(valor1.length==0 || valor1==""){
                    span.text(vacio).addClass('negacion');  
                    }
                    if(valor1.length<6 || valor1.length>10){
                    span.text(longitud).addClass('negacion');
                    }
                    if(valor1.length!=0 && valor1==valor2){
                    span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
                    }
                    }
                    //ejecuto la función al soltar la tecla
                    pass2.keyup(function(){
                    coincidePassword();
                    });
               

                   $("#g").click(function(){
                    $.ajax({
                      url: 'r.php',
                      type: 'POST',
                      data: ({
                            op: 1, 
                            rfc: $("#rfc").val(),
                            nombre: $("#nombre").val(),
                            apellido: $("#apellido").val(),
                            edad: $("#edad").val(),
                            sexo: $("#sexo").val(),
                            email: $("#email").val(),
                            telefono: $("#telefono").val(),
                            direccion: $("#direccion").val(),
                            ciudad: $("#ciudad").val(),
                            usuario: $("#usuario").val(),
                            password: $("#password").val()}),
                       beforeSend: function()
                        {
                          $("#load_ajax_sucursal").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                          $("#btn_salir_aSucursal").hide();
                        },
                        success: function(datos) {
                            $("#load_mensaje").html(datos);
                                         $("#rfc").val("");
                                         $("#nombre").val("");
                                         $("#apellido").val("");
                                         $("#edad").val("");
                                         $("#sexo").val("");
                                         $("#email").val("");
                                         $("#telefono").val("");
                                         $("#direccion").val("");
                                         $("#ciudad").val("");
                                         $("#usuario").val("");
                                         $("#password").val("");
                                    },
                                });
                            });
                     });

// Disable inspect element
   
                      $(document).bind("contextmenu",function(e){
                          e.preventDefault();
                      });
                      $(document).keydown(function(e){
                          if(e.which === 123){
                              return false;
                          }
                      });

       </script>-->
       <link rel="stylesheet" href="estilo.css" type="text/css">
    </head>

<body>


        <div class="col-xs-12 col-md-12">
                    <div class="container" >
                        <form method="post">
                            <div id="load_mensaje"></div>
                            <br/>
                            <div class="form-group">
                                <input type="text" name="rfc" id="rfc" class="form-control" 
                                placeholder="RFC O CURP" onblur="this.value=this.value.toUpperCase()">
                                <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese rfc</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nombre" id="nombre" class="form-control"
                                placeholder="Nombre (s)" onblur="this.value=this.value.toUpperCase()">
                                <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="apellido" id="apellido" class="form-control"
                                placeholder="Apellido" onblur="this.value=this.value.toUpperCase()">
                                <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                            </div>
                            <div class="form-group">
                                 <input type="number" name="edad" id="edad" min="18" max="70" class="form-control" placeholder="Edad" >
                                 <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la edad</label>
                            </div>                                              
                             <div class="form-group">
                                <select name="sexo" id="sexo" class="form-control">
                                    <option value="">Seleccione Sexo</option>
                                    <option value="H">Masculino</option>
                                    <option value="M">Femenino</option>
                                </select>
                                <label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off">
                                <label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono">
                                <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                            </div>                              
                            <div class="form-group">
                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" onblur="this.value=this.value.toUpperCase()">
                                <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad" onblur="this.value=this.value.toUpperCase()">
                                <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                            </div>
                            <div class="form-group">
                                <select name="usuario" id="usuario" class="form-control" disabled>
                                    <!--<option value="">Seleccione Tipo de Usuario</option>-->
                                    <!--<option value="1">Administrador</option>-->
                                   <!-- <option value="2">Usuario</option>
                                </select>
                                <label id="mensaje2" style="display:none;color:red">Campo Vacio /Selec una opción</label>
                            </div>         -->             
                            <div class="form-group">
                                 <input type="password" id="password" name="password" placeholder="CONTRASEÑA" autocomplete="off" tabindex="4"  class="form-control" required>
                             </div>
                                <div class="form-group">
                                <input type="password" id="pas" name="pas" placeholder="CONFIRMAR CONTRASEÑA" autocomplete="off" tabindex="5"  class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button id="g" class="btn btn-primary"><i class="fa fa-save"></i>Guardar</button>
                                <button onclick="location.href='../index.php'" class="btn btn-danger"><i class="fa fa-sign-out"></i>Salir</button>
                            </div>
                    </form>
            </div>
        </div>
</body>
<script type="text/javascript">
$(document).ready(function()
 {
   
</script>-->
</html> 