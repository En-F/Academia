<x-app-layout>
    <form action="{{ route('alumnos.update',$alumno) }}" method="POST">
        @method('PUT')
        @csrf
        <h2 class="text-2xl  font-bold mb-3">Modificar alumno</h2>
        <label for="nombre"  class="floating-label">
            <span>Nombre:*</span>
            <input type="text" id="nombre"  name="nombre" value="{{ old('nombre',$alumno->nombre) }}"><br>
        </label>

        <label for="telefono" class="floating-label">
            <span>Precio:*</span>
            <input type="text" id="telefono"  name="telefono" value="{{old('telefono',$alumno->telefono)}}"><br>
        </label>
        <br>
        <div class="flex-2">
            <button class="btn btn-soft "> Modificar</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-soft btn-info">Volver</a>
        </div>
    </form>
</x-app-layout>
