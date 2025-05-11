<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mensaje Enviado</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #ecf0f1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .mensaje {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      max-width: 500px;
      text-align: center;
    }

    .mensaje h2 {
      color: #27ae60;
      margin-bottom: 15px;
    }

    .mensaje p {
      color: #333;
      font-size: 16px;
    }

    .back-btn {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      background-color: #3498db;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      transition: background 0.3s ease;
    }

    .back-btn:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>
  <div class="mensaje">
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $nombre = htmlspecialchars($_POST["nombre"]);
          $email = htmlspecialchars($_POST["email"]);
          $telefono = htmlspecialchars($_POST["telefono"]);
          $mensaje = htmlspecialchars($_POST["mensaje"]);


          echo "<h2>¡Gracias, $nombre!</h2>";
          echo "<p>Hemos recibido tu mensaje:</p>";
          echo "<p><strong>Email:</strong> $email</p>";
          echo "<p><strong>Teléfono:</strong> $telefono</p>";
          echo "<p><strong>Mensaje:</strong><br>$mensaje</p>";
      } else {
          echo "<p>Ha ocurrido un error al procesar el formulario.</p>";
      }
    ?>
    <a class="back-btn" href="index.html">Volver al formulario</a>
  </div>
</body>
</html>
