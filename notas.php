<?php
// Comprobar si se ha recibido una nota
if(isset($_POST['nota'])) {
    $nota = $_POST['nota'];
    
    // Guardar la nota en el archivo notas.txt
    file_put_contents('notas.txt', $nota.PHP_EOL, FILE_APPEND);
}

// Leer el contenido de notas.txt
$notas = file('notas.txt');

// Mostrar las notas
foreach ($notas as $key => $nota) {
    echo ($key + 1) . ". " . htmlspecialchars($nota) . "<br>";
}
?>
