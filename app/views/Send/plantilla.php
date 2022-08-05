<html>
<head>
<style type='text/css'>
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(http://themes.googleusercontent.com/static/fonts/opensans/v6/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
}
body {
	color: #333;
	font-family: 'Open Sans', sans-serif;
	margin: 0px;
	font-size: 16px;
}
.pie {
	font-size:12px;
	color:#999797;
}
.centro {
	font-size:16px;
}
.centro a{
	text-decoration:none;
	color: #0487b8;
}
.centro a:hover{
	text-decoration: underline;
	color: #0487b8;
}
</style>
</head>
<body>
<table width='593' height='324' border='0' align='center'>
    <tr>
        <td>
            <div style="background-color: purple; width: 100%; ">
                <div style="width: 80%; height: 55px; padding: 10px; color: white;">
                    <p><strong>SABE     Y    GANA</strong></p>
                </div>    
            </div>
        </td>

    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height='97' valign='top' class='centro'><h3>Sabe y gana código de recuperación de contraseña: 
    </h3>
   Para recuperar tu contraseña utiliza este PIN: </td>
  </tr>
  <tr>
    <td height='17' style="text-align:center;"><h2> <? echo $codigo?></h2></td>
  </tr>
  <tr>
    <td height='27' class='pie'>Este email es una notificaci&oacute;n autom&aacute;tica</td>
  </tr>
</table>
</body>
</html>