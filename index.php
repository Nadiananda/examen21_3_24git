<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Notas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        #container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        #notasContainer {
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Aplicación de Notas</h1>
        <form id="notaForm">
            <label for="nota">Escribe tu nota:</label><br>
            <textarea id="nota" name="nota" rows="4" cols="50"></textarea><br>
            <button type="submit">Guardar Nota</button>
        </form>

        <h2>Notas Guardadas:</h2>
        <div id="notasContainer">
            <!-- Aquí se mostrarán las notas -->
        </div>
    </div>

    <script>
        // Función para cargar las notas mediante AJAX
        function cargarNotas() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("notasContainer").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "notas.php", true);
            xhttp.send();
        }

        // Llamamos a la función al cargar la página para mostrar las notas
        cargarNotas();

        // Manejador de evento para enviar la nota mediante AJAX
        document.getElementById("notaForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    cargarNotas(); // Recargar las notas después de guardar
                    document.getElementById("nota").value = ''; // Limpiar el campo de texto
                }
            };
            xhttp.open("POST", "notas.php", true);
            xhttp.send(formData);
        });
    </script>
</body>
</html>
