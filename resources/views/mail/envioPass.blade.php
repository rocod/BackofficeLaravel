<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Envío de Contraseña provisoria</title>
</head>
<body>
    <p>¡Hola {{ $usuario->nombres }}!</p>
    <p>Tu contraseña provisoria es: {{ $usuario->password }}</p>
    <p>Recordá que tenés 24 horas para cambiarla. Luego de ese lapso caducará y tendrás que realizar el proceso de recupero de contraseña.</p>
    <p>Ingresa al siguiente link: <a href="https://tejiendomatria@mingeneros.gob.ar/login">https://tejiendomatria@mingeneros.gob.ar/login</a></p>
    <p>Muchas Gracias por ser parte de Tejiendo Matria</p>
   
</body>
</html>