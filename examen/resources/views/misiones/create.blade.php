<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Misión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #2c3e50;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], button {
            background-color: #3498db;
            color: white;
            cursor: pointer;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #2980b9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input[type="checkbox"] {
            width: auto;
        }
    </style>
</head>
<body>
    <h1>Crear Misión</h1>
    <div class="container">
        <form action="{{ route('misiones.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label for="fecha_lanzamiento">Fecha de Lanzamiento:</label>
                <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" value="{{ old('fecha_lanzamiento') }}" required>
            </div>

            <div class="form-group">
                <label for="tripulacion">Tripulación:</label>
                <input type="number" name="tripulacion" id="tripulacion" value="{{ old('tripulacion') }}" required>
            </div>

            <div class="form-group">
                <label for="activo">Activo:</label>
                <input type="checkbox" name="activo" id="activo" value="1" checked>
            </div>

            <div class="form-group">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>
