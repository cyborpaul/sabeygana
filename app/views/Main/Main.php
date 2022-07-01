<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio</title>

<?php require "app/views/Header/Header.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">SALDO</span>
                <span class="info-box-number" id="salfi">
                  9
                  <small>Soles</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Nivel Actual</span>
                <span class="info-box-number" id="lep">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->          
         
        

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ganancia</span>
                <span class="info-box-number" id="ganancia">Ganan</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Información</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row" id="determinantefour">
          <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center form-group" style="padding:8%;">
                      <style>
                        #determinante {
  position: relative;
  cursor: pointer;
  border: none;
  padding: 15px;
  border-radius: 50px;
  background: linear-gradient(90deg, #EC37D0, #D92B2B, #FFAA0D, #EC37D0);
  background-size: 400%;
  color: #fff;
  font-size: 24px;
  letter-spacing: 4px;
}
#determinante::before {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: -1;
  background: linear-gradient(90deg, #EC37D0, #D92B2B, #FFAA0D, #EC37D0);
  background-size: 400%;
  border-radius: 50px;
  opacity: 0;
  transition: .5s;
}
#determinante:hover {
  animation: animate 10s linear infinite;
}
#determinante:hover::before {
  filter: blur(25px);
  opacity: .8;
  animation: animate 10s linear infinite;
}
@keyframes animate {
  0% {
    background-position: 0%;
  }
  100% {
    background-position: 400%;
  }
}
                      </style>
                      <input type="button" id="determinante" value=" " style="">
                      <input type="button" id="recarga" value="Recargar cuenta" style="display:none;">
                    </div>  
                </div>
                
              </div>
        </div>
          
          
        </div>

        <div class="row" id="game" style="display:none;">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">SABE Y GANA <strong>Nivel: </strong> <p id="tarjeta"> <?=$level?> </p> </h5>

                <div class="card-tools">
                    <div><h2 style="color:blue;" id="timer"></h2></div>
                </div>
              </div>
              <!-- /.card-header -->

              <div class="card-footer">
                <div class="row justify-content-center">
                  <div class="">
                    <div class="">                      
                      <h3 class="description-header" id="question"></h3>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body">
                  
                  <div class="row justify-content-center form-group">

<div class="col-12 col-sm-6 col-md-6">
  <div class="custom-control custom-radio">
    <input class="radioin custom-control-input" type="radio" id="customRadio1" name="customRadio" value="1">
    <label for="customRadio1" class="custom-control-label" id="optiona"></label>
  </div>
</div>


<div class="col-12 col-sm-6 col-md-6">
  <div class="custom-control custom-radio">
    <input class="radioin custom-control-input" type="radio" id="customRadio2" name="customRadio" value="2">
    <label for="customRadio2" class="custom-control-label" id="optionb"></label>
  </div>
</div>


<div class="col-12 col-sm-6 col-md-6">
  <div class="custom-control custom-radio">
    <input class="radioin custom-control-input" type="radio" id="customRadio3" name="customRadio" value="3">
    <label for="customRadio3" class="custom-control-label" id="optionc"></label>
  </div>
</div>

<div class="col-12 col-sm-6 col-md-6">
  <div class="custom-control custom-radio">
    <input class="radioin custom-control-input" type="radio" id="customRadio4" name="customRadio" value="4" >
    <label for="customRadio4" class="custom-control-label" id="optiond"></label>
  </div>
</div>
</div>

<div class="row justify-content-center">

<div class="col-12 col-sm-6 col-md-6">
  <div class="custom-control custom-radio">
    <input class="radioin custom-control-input" type="radio" id="customRadio5" name="customRadio" value="5">
    <label for="customRadio5" class="custom-control-label" id="optione"></label>
  </div>
</div>
</div>



</div>




<!-- ./card-body -->
<div class="card-footer">
<div class="row justify-content-center">
<div class="">
  <input type="text" style="display:none;" id="nivel" value="<?=$level?>">
  <input type="text" style="display:none;" id="saldo" value="">
  <input type="hidden" style="display:none;" id="mtsbt34" value="">
  
<input type="button" class="btn btn-success" style="" id="next" value="Siguiente">
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <!-- /.col -->

                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>SABE Y GANA</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="app/assets/plugins/jquery/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

        $(document).on('click', '#determinante', function(){ 
          setTimeout(() => {
            $('#game').attr('style'," ");
            $('#determinantefour').attr('style',"display:none;"); 
            var info="complete";
            actualizarTiempo(info);
            question();        
          }, 1000);

        });
              
        function actualizarTiempo(info){ 
          //INICIO CRONOMETRO
          let vart=info;
          let numero=6;
          var checks = document.querySelectorAll('.radioin');

          let lanzamiento=setInterval(() => {            
            numero--;  
            $('#timer').html('Tiempo: '+ numero);
            $('#timer').attr('style',"color:red;");

            //INICIO VALIDACIÓN
          const button = document.querySelector("#next");  
          button.addEventListener("click", function(evento){
	          // Aquí todo el código que se ejecuta cuando se da click al botón
            //validar
            checks.forEach((e)=>{
            var gtuans= $('#mtsbt34').val(); 
            if(e.checked==true){
              var ans23= e.value;
              if(gtuans==ans23){                
                Swal.fire('Correcto');
                var sal= $('#saldo').val(); 
                var saldoor=parseFloat(sal);
                actualizar(saldoor);
                
                $('#determinantefour').attr('style'," "); 
                $('#game').attr('style',"display:none;"); 
                clearInterval(lanzamiento);               
                
              }else{
                Swal.fire('Incorrecto');
                $('#nivel').attr('value', "0"); 
                var sal= $('#saldo').val(); 
                var saldoor=parseFloat(sal)-1;
                actualizar(saldoor);
                $('#game').attr('style',"display:none;");
                $('#determinantefour').attr('style'," ");
                clearInterval(lanzamiento);
                allData(); 
                
              }
              
            }

          });
            //validar
            
              button.disabled = true;
              $('customRadio').attr('checked',"false"); 
              $('#next').attr('value',"Verificando ... ");            
              setTimeout(() => {
               button.disabled = false;
               $('#next').attr('value',"Siguiente ");                                           
               $('#next').attr('class',"btn btn-success");
               allData(); 
              var inputs = document.querySelectorAll('.radioin');
              for (var i = 0; i < inputs.length; i++) {
                  inputs[i].checked = false;
              }          
              }, 1000); 
          }
          
          
          ); 

          if(numero==0){
                Swal.fire(
                  'Se agotó el tiempo',
                  'Por favor continue',
                  'error'
                );
                $('#nivel').attr('value', "0"); 
                var sal= $('#saldo').val(); 
                var saldoor=parseFloat(sal)-1;
                actualizar(saldoor);                               
                $('#game').attr('style',"display:none;");
                $('#determinantefour').attr('style'," "); 
                $('#timer').html('Se agotó el tiempo :c');
                $('#next').attr('style',"");
                $('#next').attr('value',"Volver a intentarlo");              
                clearInterval(lanzamiento);
                setTimeout(() => {
                  allData(); 
         
                }, 500);
                
                                           
                
                
              } 
                         

          }, 1000); 
          
             
        
          
        }
        
         

    function actualizar(saldoor){  

        var start=2;      
        var id_user = <?= $usuario ?>;
        var level= $('#nivel').val(); 
        if(level<=1){
          var result=0;          
        }else{
          var result=Math.pow(parseFloat(start),parseFloat(level));
        }
        var saldower=saldoor;         

        $.ajax({
            method:"POST",
            dataType : "json",
            data:{'id_jugador': <?= $usuario ?>, 'nivel_jugador': level, 'question':1, 'answer':"hola", 'saldo': saldower, 'ganancia': result},
            url: 'Home/level/',
            success: function(response){ 
              console.log(response);
            }
        }); 
        
        setTimeout(() => {
                  allData(); 
         
                }, 300);
    } 

    function allData(){
        
        $.ajax({
            method:"GET",
            dataType: "json",
            url:'Home/user/<?= $usuario ?>',
            success: function(response){
                var data=""
                var saldo=""
                var ganancia=""
                $.each(response, function(key, value){
                  console.log(response);
                    data=data +value.nivel,
                    saldo=saldo+value.saldo,
                    ganancia=ganancia+value.ganancia
                                                   
                })                
                $('#tarjeta').html(data);
                $('#nivel').attr('value', data); 
                $('#lep').html(data); 
                $('#salfi').html(saldo);
                $('#saldo').attr('value', saldo);
                $('#sald').attr('value', saldo);
                $('#ganancia').html(ganancia);
                                
                if(saldo<=0){
                  $('#determinante').attr('style',"display:none;"); 
                  $('#recarga').attr('style'," "); 
                  Swal.fire({
                    title: 'No cuentas con saldo en esta cuenta, para continuar ve a recargas.',
                    width: 600,
                    padding: '3em',
                    color: '#716add',
                    showDenyButton: true,
                    denyButtonText: `Recargar ahora :c`,
                    background: '#fff url(/sabeygana/app/assets/img/fondo.jpg)',
                    backdrop: `
                      rgba(0,0,123,0.4)
                      url("/sabeygana/app/assets/img/game.gif")
                      left top
                      no-repeat
                    `
                  })

                }if(ganancia==128){
                  $('#determinante').attr('style',"display:none;"); 
                  $('#recarga').attr('style'," "); 
                  $('#recarga').attr('value',"Solicitar retiro"); 

                  Swal.fire({
                    title: 'Ganaste!!! ',
                    width: 600,
                    padding: '3em',
                    color: '#716add',
                    showDenyButton: true,
                    denyButtonText: `Solicitar retiro`,
                    background: '#fff url(/sabeygana/app/assets/img/fondo.jpg)'
                  })

                }
                
                
                
            }
        }) 
             
    }allData();




    function data(){
      var data= $('#nivel').val();
      console.log(data);
      if(data==0){
        $('#determinante').attr('value',"Iniciar juego"); 
      }else{
        $('#determinante').attr('value',"Continuar con el juego");
      }
    }data(); 




    function question(){
        $.ajax({
            method:"GET",
            dataType: "json",
            url:'Main/question/1',
            success: function(params){
                var data=""
                var optiona=""
                var optionb=""
                var optionc=""
                var optiond=""
                var optione=""
                var answww=""
                
                $.each(params, function(key, value){
                  console.log(params);
                    data=data +"<span class='description-percentage text-success'>Pregunta: </span>"+value.pregunta,
                    optiona=optiona+ value.optiona,
                    optionb=optionb+ value.optionb,
                    optionc=optionc+ value.optionc,
                    optiond=optiond+ value.optiond,
                    optione=optione+ value.optione,
                    answww=answww+value.ontiy
                    
                                
                })
                $('#question').html(data);
                $('#optiona').html(optiona);
                $('#customRadio1').attr('value', optiona);
                $('#optionb').html(optionb);
                $('#customRadio2').attr('value', optionb);
                $('#optionc').html(optionc);
                $('#customRadio3').attr('value', optionc);
                $('#optiond').html(optiond);
                $('#customRadio4').attr('value', optiond);
                $('#optione').html(optione);
                $('#customRadio5').attr('value', optione);
                $('#mtsbt34').attr('value', answww);
                
                
                
            }
        })
    }



    
    

</script>
<!-- Bootstrap -->
<script src="app/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="app/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="app/assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="app/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="app/assets/plugins/raphael/raphael.min.js"></script>
<script src="app/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="app/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="app/assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="app/assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="app/assets/dist/js/pages/dashboard2.js"></script>
</body>
</html>
