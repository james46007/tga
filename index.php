<?php include('db.php') ?>

<?php include('./includes/header.php') ?>

<?php $generos = mysqli_query($conn, "SELECT * FROM parametrizaciones WHERE TIPO='GENERO' AND state=1"); ?>
<?php $hobbies = mysqli_query($conn, "SELECT * FROM parametrizaciones WHERE TIPO='HOBBY' AND state=1"); ?>



<div class="container">
    <form id="FormPreguntas" action="save-task.php" method="post">
        <div class="row">
            <div class="col-25">
                <label for="nombre">Nombre</label>
            </div>
            <div class="col-75">
                <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" autocomplete="off">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="genero">Genero</label>
            </div>
            <div class="col-75">
                <!-- <fieldset id="genero"> -->
                    <?php
                    foreach ($generos as $genero) {
                        echo "<input type='radio' value='$genero[valor]' name='genero'>$genero[nombre]";
                    }
                    ?>
                <!-- </fieldset> -->
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="hobby">¿Tienes algún hobby?</label>
            </div>
            <div class="col-75">
                <select id="hobby" name="hobby">
                    <!-- <option value="seleccione" selected>Seleccione</option> -->
                    <?php

                    foreach ($hobbies as $hobby) {
                        echo "<option value='$hobby[valor]'>$hobby[nombre]</option>";
                    }

                    ?>
                </select>
            </div>
        </div>
        <div id="preguntaOculta" class="row">
            <div class="col-25">
                <label for="tiempo">¿Cuánto tiempo le dedicas al mes?</label>
            </div>
            <div class="col-75">
                <input type="number" name="tiempo" autocomplete="off" min="0" value="0" placeholder="Ingrese el tiempo dedicado">
            </div>
        </div>
        <div class="row">
            <input type="submit" name="save_pregunta" value="Siguiente">
        </div>
    </form>
</div>

<?php include('./includes/footer.php') ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#preguntaOculta").hide();
    });

    // add the rule here
    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");

    $("#FormPreguntas").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 3
            },
            genero: {
                required: true
            },
            hobby: {
                required: true,
            },
            tiempo: {
                required: true,
                min: 1,
                number: true
            }
        },
        messages: {
            nombre: {
                required: "El campo es obligatorio.",
                minlength: "Ingrese un minimo de tres letras."
            },
            genero: "El campo es obligatorio.",
            hobby: {
                required: "El campo es obligatorio.",
            },
            tiempo: {
                required: "El campo es obligatorio.",
                min: "Ingrese minimo 1.",
                number: "Ingrese un numero."
            }
        }
    });

    $("#hobby").change(function() {
        if ($("#hobby").val() != "Ninguno") {
            $("#preguntaOculta").show();
        } else {
            $("#preguntaOculta").hide();
        }
    });
</script>