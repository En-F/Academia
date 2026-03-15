<x-app-layout>
    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf
        <h2 class="text-2xl  font-bold mb-3">Insertar un alumno</h2>
        <label for="nombre"  class="floating-label">
            <span>Nombre:*</span>
            <input type="text" id="nombre"  name="nombre" value="{{ old('nombre') }}"><br>
        </label>

        <label for="telefono" class="floating-label">
            <span>Telefono:*</span>
            <input type="text" id="telefono"  name="telefono" value="{{ old('telefono') }}"><br>
        </label>

        <div class="flex-2">
            <button class="btn btn-soft "> Insertar</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-soft btn-info">Volver</a>
        </div>
    </form>
</x-app-layout>
