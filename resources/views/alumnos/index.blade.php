<x-app-layout>
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Telefono</th>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>
                        <a class="link link-primary"
                           href="{{route('notas.ver', $alumno->id)}}">
                            {{ $alumno->nombre }}
                        </a>
                    </td>
                    <td>{{ $alumno->telefono }}</td>
                    <td>
                        <div class="flex gap-2">
                            <a
                                class="btn btn-sm btn-ghost btn-info"
                                href="{{ route('alumnos.edit', $alumno) }}"
                            >
                                Editar
                            </a>
                                <form
                                    method="POST"
                                    action="{{ route('alumnos.destroy', $alumno) }}"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-ghost btn-error"
                                        onclick="return confirm('¿Está seguro de que desea eliminar este alumno?')"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                        </td>
                    </div>
                </tr>
            @endforeach
        </tbody>
    </table>
        <a class="btn btn-sm btn-ghost btn-primary" href="{{ route('alumnos.create') }}">Dar de alta un nuevo alumno</a>

</x-app-layout>

