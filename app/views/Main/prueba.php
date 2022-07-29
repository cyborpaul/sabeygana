<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="text" name="customRadio" value="1">
    <input type="text" name="customRadio" value="2">
    <input type="text" name="customRadio" value="3">
    <input type="text" name="customRadio" value="4">
    <button id="next">lIMPIAR</button>

    
<script src="app/assets/plugins/jquery/jquery.min.js"></script>
<script>
    var value="";
    const button = document.querySelector("#next"); 
    button.addEventListener("click", function(evento){
        value =$('input[name="customRadio"]:checked').val(); 
    });

    let numero=6;
    let lanzamiento=setInterval(() => {            
        numero--;    
        if(value=="1"){
            console.log('Enviar');
            clearInterval(lanzamiento);
        }
        if(value=="2"){
            console.log('Enviar');
            clearInterval(lanzamiento);
        }
        if(numero=="0"){
            console.log('Limpiar completo');
            clearInterval(lanzamiento);
        }
                  

    }, 1000); 
</script>
    
</body>

</html>
