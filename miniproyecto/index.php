<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Básico</title>
    <link rel="stylesheet" href="styles.css">
    <style>

        body{
            background-color: #f0f0f0;
            font-family: sans-serif;
            margin: 0;
        }

        .form {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form__title {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form__group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .form__label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form__input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        .form__button {
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form__button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="form">
        <h1 class="form__title">Formulario de Contacto</h1>
        <form class="form__form" action="Controller/regController.php" method="post">
            <div class="form__group">
                <label class="form__label" for="nombre">Nombre:</label>
                <input class="form__input" type="text" id="nombre" name="nombre">
            </div>

            <div class="form__group">
                <label class="form__label" for="apellido">Apellido:</label>
                <input class="form__input" type="text" id="apellido" name="apellido">
            </div>

            <div class="form__group">
                <label class="form__label" for="email">Correo Electrónico:</label>
                <input class="form__input" type="email" id="email" name="email">
            </div>

            <button class="form__button" type="submit">Enviar</button>
        </form>
    </div>
</body>


</html>