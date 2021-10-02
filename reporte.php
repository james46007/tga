<?php include('db.php');

$nombres = mysqli_query($conn, "SELECT nombre FROM preguntas GROUP BY nombre")->fetch_all();
$nombresCount = mysqli_query($conn, "SELECT COUNT(nombre) FROM preguntas GROUP BY nombre")->fetch_all();
$genero = mysqli_query($conn, "SELECT genero FROM preguntas GROUP BY genero")->fetch_all();
$generoCount = mysqli_query($conn, "SELECT COUNT(genero) FROM preguntas GROUP BY genero")->fetch_all();
$hobby = mysqli_query($conn, "SELECT hobby FROM preguntas GROUP BY hobby")->fetch_all();
$hobbyCount = mysqli_query($conn, "SELECT COUNT(hobby) FROM preguntas GROUP BY hobby")->fetch_all();
$tiempos = mysqli_query($conn, "SELECT tiempo FROM preguntas GROUP BY tiempo")->fetch_all();
$tiemposCount = mysqli_query($conn, "SELECT COUNT(tiempo) FROM preguntas GROUP BY tiempo")->fetch_all();
$tabla = mysqli_query($conn, "SELECT Nombre,Genero,Hobby,Tiempo,COUNT(*) as Cantidad FROM `preguntas` GROUP BY nombre,genero,hobby,tiempo");


?>

<?php include('./includes/header.php') ?>

<?php

// echo json_encode($preguntas);

// foreach($preguntas as $pregunta){
//     // echo $pregunta['hobby'];

//     echo "<br>";
// }

?>

<div style="position: relative; height:20%; width:40%; margin: 1em auto 2em;">
    <h3>Pregunta 1: nombre</h3>
    <canvas id="nombres" height="10vh" width="20vw"></canvas>
    <h3>Pregunta 2: Genero</h3><canvas id="generos" height="10vh" width="20vw"></canvas>
    <h3>Pregunta 3: Hobby</h3><canvas id="hobbies" height="10vh" width="20vw"></canvas>
    <h3>Pregunta 4: Tiempo dedicado hobby</h3><canvas id="tiempos" height="10vh" width="20vw"></canvas>
    <h1>Tabla resumen</h1>
    <table id="tabla" class="rwd-table">
        <tr>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Hobby</th>
            <th>Tiempo</th>
            <th>Cantidad</th>
        </tr>
        <tr>
            <?php
                foreach($tabla as $fila){
                    echo "<tr>";
                    echo "<td data-th='$fila[Nombre]'>$fila[Nombre]</td>";
                    echo "<td data-th='$fila[Genero]'>$fila[Genero]</td>";
                    echo "<td data-th='$fila[Hobby]'>$fila[Hobby]</td>";
                    echo "<td data-th='$fila[Tiempo]'>$fila[Tiempo]</td>";
                    echo "<td data-th='$fila[Cantidad]'>$fila[Cantidad]</td>";
                    echo "</tr>";
                }
            ?>
        </tr>
    </table>
    <input type="button" onclick="tableToExcel('tabla', 'Tabla resumen')" value="Exportar a Excel" class="btn-bootstrap">
</div>





<script>
    var ctx = document.getElementById('nombres').getContext('2d');
    var nombres = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: (<?php echo json_encode($nombres); ?>),
            datasets: [{
                label: 'Tipos de nombres',
                data: (<?php echo json_encode($nombresCount); ?>),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('generos').getContext('2d');
    var generos = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: (<?php echo json_encode($genero); ?>),
            datasets: [{
                label: 'Tipos de generos',
                data: (<?php echo json_encode($generoCount); ?>),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('hobbies').getContext('2d');
    var hobbies = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: (<?php echo json_encode($hobby); ?>),
            datasets: [{
                label: 'Tipos de hobbies',
                data: (<?php echo json_encode($hobbyCount); ?>),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('tiempos').getContext('2d');
    var tiempos = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: (<?php echo json_encode($tiempos); ?>),
            datasets: [{
                label: 'Tiempos de hobbies',
                data: (<?php echo json_encode($tiemposCount); ?>),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script type="text/javascript">
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,',
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
            base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            },
            format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {
                worksheet: name || 'Worksheet',
                table: table.innerHTML
            }
            window.location.href = uri + base64(format(template, ctx))
        }
    })()
</script>