<?php

namespace App\Http\Controllers;

use App\Models\Veterinario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VeterinarioController extends Controller
{
    public function index()
    {
        $veterinarios = Veterinario::orderBy('nombre')
            ->paginate(10);

        return view('veterinarios.index', compact('veterinarios'));
    }

    public function create()
    {
        return view('veterinarios.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:150',
            'cedula' => 'required|string|max:50|unique:veterinarios,cedula',
            'telefono' => 'nullable|string|max:20',
        ]);

        Veterinario::create($datos);

        return redirect()
            ->route('veterinarios.index')
            ->with('success', 'El veterinario se registró correctamente.');
    }

    public function edit(Veterinario $veterinario)
    {
        return view('veterinarios.edit', compact('veterinario'));
    }

    public function update(Request $request, Veterinario $veterinario)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:150',
            'cedula' => [
                'required',
                'string',
                'max:50',
                Rule::unique('veterinarios', 'cedula')->ignore($veterinario->id),
            ],
            'telefono' => 'nullable|string|max:20',
        ]);

        $veterinario->update($datos);

        return redirect()
            ->route('veterinarios.index')
            ->with('success', 'Los datos del veterinario se actualizaron correctamente.');
    }

    public function destroy(Veterinario $veterinario)
    {
        $veterinario->delete();

        return redirect()
            ->route('veterinarios.index')
            ->with('success', 'El veterinario se eliminó correctamente.');
    }
}