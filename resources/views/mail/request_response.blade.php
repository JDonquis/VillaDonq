

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
		
			<div class="card" >
	
				<div id="text">
					<h1>Para <b id="name_person">{{$info->name.' '.$info->last_name }}</b> <br>
					Solicitud revisada y enviada el <time>{{$info->updated_at}}</time></h1>
				</div>
			</div>
				<div class="doc">
					@if($info->request_statu_id == 2)
					<p>Buen dia, nuestros administradores han revisado su solicitud, y lamentamos notificarle que su solicitud ha sido <b>rechazada</b> por nuestros administradores debido a que no cumple con los requesitos de nuestra institucion, por favor, intentelo en el siguiente periodo de inscripcion.</p>
					@else
					<p>Buen dia, nuestros administradores han revisado su solicitud, y nos alegra informarle que su solicitud ha sido <b>aceptada</b> por nuestros administradores, felicidades, ya pertenece a nuestras instalaciones, lo esperamos. </p>

					<p>Su usuario y contraseña por defecto es su cedula, <b>por temas de seguridad le recomendamos ingresar y cambiar su contraseña por una mas de segura y de su preferencia.</b>
					@endif	
				<div>

		
		
</body>
</html>

