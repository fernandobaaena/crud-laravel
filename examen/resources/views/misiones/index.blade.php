<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misiones Espaciales</title>
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
        a {
            text-decoration: none;
            color: #3498db;
        }
        a:hover {
            text-decoration: underline;
        }
        .mission-list {
            list-style-type: none;
            padding: 0;
        }
        .mission-list li {
            margin: 10px 0;
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .mission-list li strong {
            color: #34495e;
        }
        button {
            padding: 5px 10px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <h1>Lista de Misiones</h1>
    <div class="container">
        <a href="{{ route('misiones.create') }}">Crear Nueva Misión</a>
        <ul class="mission-list">
            @foreach ($misiones as $mision)
                <li>
                    <div>
                        <strong>{{ $mision->nombre }}</strong><br>
                        <span>{{ $mision->fecha_lanzamiento }}</span> |
                        <span>{{ $mision->tripulacion }} astronautas</span> |
                        <span>{{ $mision->activo ? 'Activo' : 'Inactivo' }}</span>
                    </div>
                    <div>
                        <a href="{{ route('misiones.edit', $mision->id) }}">Editar</a>
                        <form action="{{ route('misiones.destroy', $mision->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
