<x-app-layout>
    <div class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold mb-3">Cambiar nota de: {{ $alumno->nombre }}</h2>
        <form action="{{ route('notas.actualizar') }}" method="POST"
            class="card bg-base-200 p-6 shadow">
            @csrf
            <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
            <div class="form-control w-full mb-4">
                    <label class="label">Asignatura</label>
                    <select name="asignatura_id" class="select select-bordered w-full" required>
                        <option disabled selected>Selecciona una asignatura</option>
                        @foreach($asignaturas as $asig)
                            <option value="{{ $asig->id }}">{{ $asig->denominacion }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="form-control w-full mb-4">
                <label class="label">Evaluacion</label>
                <select name="evaluacion_id" class="select select-bordered w-full" required>
                    <option disabled selected>Selecciona una evaluacion</option>
                    @foreach($evaluaciones as $evaluacion)
                        <option value="{{ $evaluacion->id }}">{{ $evaluacion->evaluacion }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-control w-full mb-6">
                    <label class="label">Nueva Nota</label>
                    <input type="text" step="0.1" name="nota"  class="input input-bordered w-full" required />
            </div>
            <div class="flex-2">
                <button class="btn btn-soft btn-success"
                    type="submit">Cambiar</button>
                <a href="{{route('notas.ver',$alumno->id)}}" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
