<x-app-layout>
    <div class="card bg-base-300 w-full shadow-sm">
        <div class="card-body">
            <h2 class="text-xl font-bold mb-4">La Asignatura es : {{ $asignatura->denominacion }}</h2>
            <table class="table w-full">
                <thead>
                    <th>Nombre</th>
                    <th>Nota</th>
                </thead>
                    @foreach ($aprobado as $apro)
                    <tr>
                        <th>
                            {{ $apro->nombre }}
                        </th>
                        <th>{{ $apro->promedio }}</th>
                    </tr>
                    @endforeach                
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
