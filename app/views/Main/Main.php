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
                <span class="info-box-number">
                  3
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
                <span class="info-box-number">41,410</span>
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
                <span class="info-box-text">Progreso</span>
                <span class="info-box-number">760</span>
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
          <?php
          $level;
          if($level=="1"){
            $string="Iniciar juego";            
          }else{
            $string="Continuar con el juego";
          }
          ?>
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
                      <input type="button" id="determinante" value="<?= $string?>">
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
    <input class="radioin custom-control-input" type="radio" id="customRadio4" name="customRadio" value="4">
    <label for="customRadio4" class="custom-control-label" id="optiond"></label>
  </div>
</div>
</div>

<div class="row justify-content-center">

<div class="col-12 col-sm-6 col-md-6">
  <div class="custom-control custom-radio">
    <input class="radioin custom-control-input" type="radio" id="customRadio5" name="customRadio" value="5" >
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
  <input type="text" style="" id="counter" value="20">
<input type="button" class="btn btn-success" id="next" value="Siguiente">
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

<script>


        $(document).on('click', '#determinante', function(){ 
          $('#game').attr('style'," ");
          $('#determinantefour').attr('style',"display:none;"); 

          actualizarTiempo();

        });

        $(document).on('click', '#next', function(){           
          let button = document.querySelector("#next");
          button.disabled = true;
          $('customRadio').attr('checked',"false"); 
          $('#next').attr('value',"Verificando ... ");
          $('#counter').attr('id',"counter2"); 
          $('#counter2').attr('value',"30"); 
                    
          actualizar();    
          setTimeout(() => {
            button.disabled = false;
            $('#next').attr('value',"Siguiente ");
            
            allData();
            question();            
          }, 2000);          

        });  



        var count= $('#counter').val(); 
        var cont2=$('#counter2').val();
        if(count==20){
          var segundos=count;
        }if(count==15){
          var segundos=count2;
        }
         
        function actualizarTiempo(){     
          
            $('#timer').html('Tiempo: '+ segundos);
            if(segundos==0){
              let button = document.querySelector("#next");
              button.disabled = true;
              $('#next').attr('class',"btn btn-danger");
              $('#next').attr('value',"Perdiste :( ");
              alert('Se termino el tiempo');

            }else if(segundos<5){
              $('#timer').attr('style',"color:red;");
              segundos--; 
              setTimeout(() => {
                actualizarTiempo();              
              }, 1000);

            }else{
              segundos--; 
              setTimeout(() => {
                actualizarTiempo();              
              }, 1000);

            }

                    
        }      

        

    function actualizar(){        
        var id_user = <?= $usuario ?>;
        var level= $('#nivel').val();
        $.ajax({
            method:"POST",
            dataType : "json",
            data:{'id_jugador': <?= $usuario ?>, 'nivel_jugador': level, 'question':1, 'answer':"hola"},
            url: 'home/level/',
            success: function(response){ 
              console.log(response);
            }


        }); 
        

        
    } 
    

    function allData(){
        
        $.ajax({
            method:"GET",
            dataType: "json",
            url:'home/user/<?= $usuario ?>',
            success: function(response){
                var data=""
                $.each(response, function(key, value){
                  console.log(response);
                    data=data +value.nivel                                
                })
                $('#tarjeta').html(data);
                $('#nivel').attr('value', data);  
                
                
            }
        })       
    }




    function question(){
        $.ajax({
            method:"GET",
            dataType: "json",
            url:'main/question/1',
            success: function(params){
                var data=""
                var optiona=""
                var optionb=""
                var optionc=""
                var optiond=""
                var optione=""
                
                $.each(params, function(key, value){
                  console.log(params);
                    data=data +"<span class='description-percentage text-success'>Pregunta: </span>"+value.pregunta,
                    optiona=optiona+ value.optiona,
                    optionb=optionb+ value.optionb,
                    optionc=optionc+ value.optionc,
                    optiond=optiond+ value.optiond,
                    optione=optione+ value.optione
                    
                                
                })
                $('#question').html(data);
                $('#optiona').html(optiona);
                $('#optionb').html(optionb);
                $('#optionc').html(optionc);
                $('#optiond').html(optiond);
                $('#optione').html(optione);
                
            }
        })
    }
    question();
    

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
