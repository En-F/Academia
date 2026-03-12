<?php

use Livewire\Component;
use App\Models\alumno;
use App\Models\asignatura;
use App\Models\evaluacion;
use Illuminate\Http\Request;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    
    public $alumno; 

    #[Validate('required')]
    public $asignatura_id = '';

    #[Validate('required')]
    public $evaluacion_id = '';

    #[Validate('required|numeric|min:0|max:10')]
    public $nota = '';

    #[Computed]
    public function asignaturas()
    {
        return asignatura::all();
    }

    #[Computed]
    public function evaluaciones()
    {
        return evaluacion::all();
    }

    
    public $alumno_id; 

   public function mount(Request $request){
    $id = $request->query('id');
    $this->alumno = alumno::findOrFail($id);
    $this->alumno_id = $this->alumno->id;
   }

   public function enviar(){
    $this->validate();
    $this->guardarDato();

    return redirect()->route('notas.ver', $this->alumno_id)
            ->with('success', 'Nota actualizada correctamente');
   }


   public function guardarDato(){

    DB::table('notas')->updateOrInsert(
        [
            'alumno_id'     => $this->alumno_id,
            'asignatura_id' => $this->asignatura_id,
            'evaluacion_id' => $this->evaluacion_id,
        ],
        [
            'nota' => $this->nota,
        ]
    );
   }

};  
?>

<div class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold mb-3">Cambiar nota de: {{ $alumno->nombre }}</h2>
        <form wire:submit.prevent="enviar" class="card bg-base-200 p-6 shadow">
            @csrf
            <div class="form-control w-full mb-4">
                    <label class="label">Asignatura</label>
                    <select  wire:model="asignatura_id"  class="select select-bordered w-full" required >
                        <option value="" >Selecciona una asignatura</option>
                        @foreach($this->asignaturas as $asig)
                            <option value="{{ $asig->id }}">{{ $asig->denominacion }}</option>
                        @endforeach
                    </select>
                    @error('asignatura_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="form-control w-full mb-4">
                <label class="label">Evaluacion</label>
                <select wire:model="evaluacion_id" class="select select-bordered w-full" required >
                    <option value="" >Selecciona una evaluacion</option>
                    @foreach($this->evaluaciones as $evaluacion)
                        <option value="{{ $evaluacion->id }}">{{ $evaluacion->evaluacion }}</option>
                    @endforeach
                </select>
                @error('evaluacion_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-control w-full mb-6">
                    <label class="label">Nueva Nota</label>
                    <input type="text" step="0.1"  class="input input-bordered w-full" wire:model="nota"/>
                    @error('nota') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            <div class="flex-2">
                <button class="btn btn-soft btn-success"
                    type="submit">Añadir una nueva nota</button>
                <a href="{{route('notas.ver',$alumno->id)}}" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>