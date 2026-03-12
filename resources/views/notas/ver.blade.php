<x-app-layout>
    <div class="card bg-base-300 w-full shadow-sm">
        <div class="card-body">
            <h2 class="text-xl font-bold mb-4">Notas de {{ $alumno->nombre }}</h2>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th class="text-left" >Asignatura</th>
                        @foreach($cabeceras as $nombreColumna)
                        <th class="text-left">
                                {{ $nombreColumna }}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                        @foreach ($notas->groupBy('denominacion') as $nombreAsig => $grupoNotas)
                        <tr>
                            <td>
                            <a class="btn btn-sm btn-ghost btn-primary" href="{{ route('asignaturas.aprobados',['id' => $grupoNotas->first()->asignatura_id]) }}">
                                {{ $nombreAsig }}
                            </a>
                            </td>
                            @foreach($cabeceras as $columna)
                            <td>
                                @php
                                    $notasDeEstaEval = $grupoNotas->where('evaluacion', $columna);
                                @endphp
                                @if($notasDeEstaEval->isNotEmpty())
                                @foreach($notasDeEstaEval as $n)
                                    <div class="mb-1">{{ $n->nota }}/10</div>
                                @endforeach
                            @else
                                <span class="text-gray-500">-</span>
                            @endif
                            </td>
                        @endforeach
                        </tr>
                        
                        @endforeach
                </tbody>
            </table>
            <a class="btn btn-sm btn-ghost btn-primary" 
            href="{{ route('notas.cambiar',$alumno->id) 
            }}">
            Cambiar Nota</a>
            <a class="btn btn-sm btn-ghost btn-primary" 
            href="{{ route('editarnota.index',['id'=>$alumno->id]) }}">
            Cambiar Nota con livewire</a>
        </div>
    </div>
    <div class="flex-2">
    <a href="{{route('alumnos.index')}}" class="btn btn-soft btn-info">Volver</a>
</div>
</x-app-layout>
