<?php

namespace App\Http\Controllers;

use App\Models\Anamnesis;
use App\Models\Hijo;
use App\Models\Session;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use NumberFormatter;

class SessionController extends Controller
{
    public function index()
    {
        $sesiones = Session::all();

        return view('psicologo.session.index', [
            'sesiones' => $sesiones
        ]);
    }

    public function create($id)
    {
        $hijo = Hijo::findOrFail($id);
        $totalSesiones = Session::where('hijo_id', $hijo->id)->get();
        // dd($totalSesiones->count());

        return view('psicologo.session.create', [
            'hijo' => $hijo,
            'totalSesiones' => $totalSesiones
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'hijo_id' => ['required'],
            'fecha' => ['required'],
            'proxima_fecha' => ['required'],
            'num_sesion' => ['required'],
            // 'sesion' => ['required'],
            'desarrollo' => ['required'],
            'tareas' => ['required'],
            'observacion' => ['required'],
        ]);

        Session::insert([
            'hijo_id' => $request->hijo_id,
            'fecha' => $request->fecha,
            'proxima_fecha' => $request->proxima_fecha,
            'num_sesion' => $request->num_sesion,
            // 'sesion' => $request->sesion,
            'desarrollo' => $request->desarrollo,
            'tareas' => $request->tareas,
            'observacion' => $request->observacion,
        ]);

        return redirect()->route('session')->with("success", "Sesión Registrada Exitosamente!");
    }

    public function show(Session $sesion)
    {
        $totalSesiones = Session::where('hijo_id',$sesion->hijo->id)->get();
        return view('psicologo.session.show', [
            'sesion' => $sesion,
            'totalSesiones' => $totalSesiones
        ]);
    }

    public function edit(Session $sesion)
    {
        return view('psicologo.session.edit', [
            'sesion' => $sesion
        ]);
    }

    public function update(Request $request, Session $sesion)
    {
        //dd($request->all());
        $request->validate([
            'hijo_id' => ['required'],
            'fecha' => ['required'],
            'proxima_fecha' => ['required'],
            'num_sesion' => ['required'],
            'desarrollo' => ['required'],
            'tareas' => ['required'],
            'observacion' => ['required'],
        ]);
        $sesion->update($request->all());
        return redirect()->route('session')->with('success', 'Sesión Actualizada Correctamente!');

    }

    public function destroy(Session $sesion)
    {
        $sesion->delete();
        return redirect()->route('session')->with('success', 'Sesión Eliminada Correctamente!');
    }
}
