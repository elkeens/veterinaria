<?php

namespace App\Http\Controllers;
use App\Models\Consulta;
use App\Models\Mascota;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMascotas = Mascota::count();

        $totalConsultas = Consulta::count();

        $consultasHoy = Consulta::whereDate(
            'fecha',
            today()
        )->count();

        $ultimasConsultas = Consulta::with('mascota')
            ->orderByDesc('fecha')
            ->orderByDesc('id')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalMascotas',
            'totalConsultas',
            'consultasHoy',
            'ultimasConsultas'
        ));
    }
}
