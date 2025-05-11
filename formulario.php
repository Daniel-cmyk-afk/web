






<?php
// Iniciar sesión para manejar datos de usuario si se necesita
session_start();

// Configuración de la base de datos (comentada por ahora)
/*
$host = "localhost";
$user = "usuario";
$password = "contraseña";
$database = "costurArtes";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
*/

// Array de servicios (como alternativa a la base de datos)
$servicios = [
    [
        'id' => 1,
        'nombre' => 'Confección a Medida',
        'imagen' => 'confeccion.jpg',
        'descripcion' => '¿Tienes una idea en mente? Creamos prendas únicas y personalizadas según tus especificaciones y medidas. Desde vestidos elegantes hasta ropa casual, hacemos tus sueños realidad.',
        'caracteristicas' => [
            'Diseño personalizado',
            'Selección de tejidos de alta calidad',
            'Pruebas y ajustes',
            'Entrega impecable'
        ]
    ],
    [
        'id' => 2,
        'nombre' => 'Bordado Personalizado',
        'imagen' => 'bordado.jpg',
        'descripcion' => 'Añade un toque especial a tus prendas y textiles con nuestro servicio de bordado personalizado. Logos, nombres, diseños únicos... ¡las posibilidades son infinitas!',
        'caracteristicas' => [
            'Bordado de logotipos empresariales',
            'Personalización de prendas y accesorios',
            'Bordado de regalos especiales',
            'Amplia variedad de hilos y técnicas'
        ]
    ],
    [
        'id' => 3,
        'nombre' => 'Arreglos y Modificaciones',
        'imagen' => 'arreglos.jpg',
        'descripcion' => '¿Esa prenda que tanto te gusta necesita un ajuste? Nuestro equipo experto realiza arreglos y modificaciones para que tus prendas te queden perfectas.',
        'caracteristicas' => [
            'Ajuste de tallas',
            'Dobladillos y ruedos',
            'Cambio de cierres y botones',
            'Reparaciones generales'
        ]
    ],
    [
        'id' => 4,
        'nombre' => 'Asesoramiento de Diseño',
        'imagen' => 'asesoramiento.jpg',
        'descripcion' => '¿No estás seguro de qué estilo o tejido elegir? Te ofrecemos asesoramiento personalizado para ayudarte a tomar las mejores decisiones para tus proyectos de costura y bordado.',
        'caracteristicas' => [
            'Consulta de estilo',
            'Recomendaciones de tejidos y materiales',
            'Ideas y bocetos de diseño'
        ]
    ]
];

// Procesar formulario de solicitud de servicio
$mensajeFormulario = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['solicitar_servicio'])) {
    $nombre = htmlspecialchars($_POST['nombre'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $telefono = htmlspecialchars($_POST['telefono'] ?? '');
    $servicio_id = (int)($_POST['servicio_id'] ?? 0);
    $mensaje = htmlspecialchars($_POST['mensaje'] ?? '');
    
    // Validación básica
    $errores = [];
    
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio";
    }
    
    if (empty($email)) {
        $errores[] = "El email es obligatorio";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato de email no es válido";
    }
    
    if (empty($servicio_id)) {
        $errores[] = "Debe seleccionar un servicio";
    }
    
    // Si no hay errores, proceder con el envío (aquí iría el código para guardar en BD o enviar email)
    if (empty($errores)) {
        // Aquí podrías insertar en la base de datos o enviar un email
        
        /* Ejemplo de envío de email (comentado)
        $to = "info@costurArtes.com";
        $subject = "Nueva solicitud de servicio";
        $message = "Nombre: $nombre\nEmail: $email\nTeléfono: $telefono\nServicio: $servicio_id\nMensaje: $mensaje";
        $headers = "From: $email";
        
        if(mail($to, $subject, $message, $headers)) {
            $mensajeFormulario = "<div class='alert alert-success'>¡Gracias por tu solicitud! Nos pondremos en contacto contigo pronto.</div>";
        } else {
            $mensajeFormulario = "<div class='alert alert-danger'>Hubo un problema al enviar tu solicitud. Por favor, inténtalo de nuevo más tarde.</div>";
        }
        */
        
        // Por ahora, solo mostraremos un mensaje de éxito
        $mensajeFormulario = "<div class='alert alert-success'>¡Gracias por tu solicitud! Nos pondremos en contacto contigo pronto.</div>";
    } else {
        $mensajeFormulario = "<div class='alert alert-danger'><ul>";
        foreach ($errores as $error) {
            $mensajeFormulario .= "<li>$error</li>";
        }
        $mensajeFormulario .= "</ul></div>";
    }
}

// Función para cambiar la URL según el entorno
function get_page_url($page) {
    // Determinar si estamos en desarrollo local o en producción
    $is_local = $_SERVER['SERVER_NAME'] == '127.0.0.1' || $_SERVER['SERVER_NAME'] == 'localhost';
    
    if ($is_local) {
        return "http://127.0.0.1:5500/$page.php";
    } else {
        return "/$page.php"; // En producción usaríamos rutas relativas
    }
}
?>
