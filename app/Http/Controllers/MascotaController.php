<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class MascotaController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $mascotas = Mascota::query()
            ->when($buscar, function ($query, $buscar) {
                $query->where(function ($subquery) use ($buscar) {
                    $subquery->where('nombre', 'like', "%{$buscar}%")
                        ->orWhere('dueno', 'like', "%{$buscar}%")
                        ->orWhere('raza', 'like', "%{$buscar}%");
                });
            })
            ->orderBy('nombre')
            ->paginate(10)
            ->withQueryString();

        return view('mascotas.index', compact('mascotas', 'buscar'));
    }

    public function create()
    {
        return view('mascotas.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'dueno' => 'required|string|max:255',
            'telefono_dueno' => 'nullable|string|max:20',
            'especie' => 'required|string|max:50',
            'raza' => 'nullable|string|max:255',
            'edad' => 'nullable|integer|min:0|max:150',
            'sexo' => 'required|in:Macho,Hembra,No especificado',
            'observaciones' => 'nullable|string|max:5000',
        ]);

        Mascota::create($datos);

        return redirect()
            ->route('mascotas.index')
            ->with('success', '¡La mascota se registró correctamente!');
    }

    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'dueno' => 'required|string|max:255',
            'telefono_dueno' => 'nullable|string|max:20',
            'especie' => 'required|string|max:50',
            'raza' => 'nullable|string|max:255',
            'edad' => 'nullable|integer|min:0|max:150',
            'sexo' => 'required|in:Macho,Hembra,No especificado',
            'observaciones' => 'nullable|string|max:5000',
        ]);

        $mascota->update($datos);

        return redirect()
            ->route('mascotas.index')
            ->with('success', 'Los datos de la mascota se actualizaron correctamente.');
    }

    public function destroy(Mascota $mascota)
    {
        $mascota->delete();

        return redirect()
            ->route('mascotas.index')
            ->with('success', 'La mascota se eliminó correctamente.');
    }

    public function expedientePdf(Mascota $mascota)
    {
    $mascota->load([
        'consultas' => function ($query) {
            $query->orderByDesc('fecha');
        }
    ]);

    $pdf = Pdf::loadView(
        'mascotas.expediente-pdf',
        compact('mascota')
    )->setPaper('a4', 'portrait');

    return $pdf->download(
        'expediente-mascota-' . $mascota->id . '.pdf'
    );
    }
}