<?php

namespace App\Http\Controllers;
use App\Models\Consulta;
use App\Models\Mascota;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $consultas = Consulta::with('mascota')
            ->when($buscar, function ($query, $buscar) {
                $query->where(function ($subquery) use ($buscar) {
                    $subquery->where('diagnostico', 'like', "%{$buscar}%")
                        ->orWhere('motivo_consulta', 'like', "%{$buscar}%")
                        ->orWhere('procedimiento_realizado', 'like', "%{$buscar}%")
                        ->orWhereHas('mascota', function ($mascotas) use ($buscar) {
                            $mascotas->where('nombre', 'like', "%{$buscar}%")
                                ->orWhere('dueno', 'like', "%{$buscar}%");
                        });
                });
            })
            ->orderByDesc('fecha')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('consultas.index', compact('consultas', 'buscar'));
    }

    public function create()
    {
        $mascotas = Mascota::orderBy('nombre')->get();

        return view('consultas.create', compact('mascotas'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'fecha' => 'required|date',
            'motivo_consulta' => 'nullable|string|max:5000',
            'diagnostico' => 'nullable|string|max:5000',
            'procedimiento_realizado' => 'nullable|string|max:5000',
            'tratamiento' => 'nullable|string|max:5000',
            'observaciones' => 'nullable|string|max:5000',
        ]);

        Consulta::create($datos);

        return redirect()
            ->route('consultas.index')
            ->with('success', 'La consulta veterinaria se registró correctamente.');
    }

    public function edit(Consulta $consulta)
    {
        $mascotas = Mascota::orderBy('nombre')->get();

        return view('consultas.edit', compact('consulta', 'mascotas'));
    }

    public function update(Request $request, Consulta $consulta)
    {
        $datos = $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'fecha' => 'required|date',
            'motivo_consulta' => 'nullable|string|max:5000',
            'diagnostico' => 'nullable|string|max:5000',
            'procedimiento_realizado' => 'nullable|string|max:5000',
            'tratamiento' => 'nullable|string|max:5000',
            'observaciones' => 'nullable|string|max:5000',
        ]);

        $consulta->update($datos);

        return redirect()
            ->route('consultas.index')
            ->with('success', 'La consulta se actualizó correctamente.');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();

        return redirect()
            ->route('consultas.index')
            ->with('success', 'La consulta se eliminó correctamente.');
    }
}
