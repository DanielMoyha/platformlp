<?php

namespace App\Http\Controllers;

use App\Models\Anamnesis;
use App\Models\Hijo;
use App\Models\Paciente;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Foreach_;

class PacienteController extends Controller
{
    public function index()
    {
        /* $pacientes = Paciente::all();

        return view('home',[
            'pacientes' => $pacientes
        ]); */
    }

    public function create()
    {
        /* $users = User::all()->except(auth()->user()->id);
        return view('admin.pacientes.create', [
            'users' => $users
        ]); */

        return view('admin.pacientes.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'caso' => ['required', 'unique:pacientes',],
            'fecha' => 'required',
            'hora' => 'required',
            'nombres' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',
            'telefono' => ['required', 'max:8'],
            'telefono_referencia' => ['required', 'max:8'],
            'estado_civil' => 'required',
            'anios' => 'required',
            'nombre_esposo' => 'required',
            'edad_esposo' => 'required',
            'grado_instruccion' => 'required',
            'cantidad_hijos' => 'required',
            'ocupacion' => 'required',
            'ingreso_mensual' => 'required',
            'motivo_consulta' => 'required',
            'historia_familiar' => 'required',
            'tipo_familia' => 'required',
            'tipo' => 'required',
            'conyugal' => 'required',
            'materno' => 'required',
            'paterno' => 'required',
            'fraterno' => 'required',
            'diagnostico_social' => 'required',
            'acciones' => 'required',
            // 'user_id' => 'nullable'
        ]);

        Paciente::create([
            'caso' => $request->caso,
            // 'codigo_paciente' => $request->codigo_paciente,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'nombres' => $request->nombres,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'telefono_referencia' => $request->telefono_referencia,
            'estado_civil' => $request->estado_civil,
            'anios' => $request->anios,
            'nombre_esposo' => $request->nombre_esposo,
            'edad_esposo' => $request->edad_esposo,
            'grado_instruccion' => $request->grado_instruccion,
            'cantidad_hijos' => $request->cantidad_hijos,
            'ocupacion' => $request->ocupacion,
            'ingreso_mensual' => $request->ingreso_mensual,
            'motivo_consulta' => $request->motivo_consulta,
            'historia_familiar' => $request->historia_familiar,
            'tipo_familia' => $request->tipo_familia,
            'tipo' => $request->tipo,
            'conyugal' => $request->conyugal,
            'materno' => $request->materno,
            'paterno' => $request->paterno,
            'fraterno' => $request->fraterno,
            'diagnostico_social' => $request->diagnostico_social,
            'acciones' => $request->acciones,
        ]);

        return redirect()->route('home')->with('success', 'Caso Registrado Correctamente');
        // return response()->json(['success' => 'Paciente creado correctamente.', "redirect_url" => route('home')]);
    }

    /* public function store(Request $request)
    {
        // dd($request);

        $validator = $this->validate($request, [
            'caso' => ['required', 'unique:pacientes',],
            // 'codigo_paciente' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'nombres' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'telefono_referencia' => 'required',
            'estado_civil' => 'required',
            'anios' => 'required',
            'nombre_esposo' => 'required',
            'edad_esposo' => 'required',
            'grado_instruccion' => 'required',
            'cantidad_hijos' => 'required',
            'ocupacion' => 'required',
            'ingreso_mensual' => 'required',
            'motivo_consulta' => 'required',
            'historia_familiar' => 'required',
            'tipo_familia' => 'required',
            'tipo' => 'required',
            'conyugal' => 'required',
            'materno' => 'required',
            'paterno' => 'required',
            'fraterno' => 'required',
            'diagnostico_social' => 'required',
            'acciones' => 'required',
            // 'user_id' => 'nullable'
        ]);

        Paciente::create([
            'caso' => $request->caso,
            // 'codigo_paciente' => $request->codigo_paciente,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'nombres' => $request->nombres,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'telefono_referencia' => $request->telefono_referencia,
            'estado_civil' => $request->estado_civil,
            'anios' => $request->anios,
            'nombre_esposo' => $request->nombre_esposo,
            'edad_esposo' => $request->edad_esposo,
            'grado_instruccion' => $request->grado_instruccion,
            'cantidad_hijos' => $request->cantidad_hijos,
            'ocupacion' => $request->ocupacion,
            'ingreso_mensual' => $request->ingreso_mensual,
            'motivo_consulta' => $request->motivo_consulta,
            'historia_familiar' => $request->historia_familiar,
            'tipo_familia' => $request->tipo_familia,
            'tipo' => $request->tipo,
            'conyugal' => $request->conyugal,
            'materno' => $request->materno,
            'paterno' => $request->paterno,
            'fraterno' => $request->fraterno,
            'diagnostico_social' => $request->diagnostico_social,
            'acciones' => $request->acciones,
            //'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $request->created_at)->locale('is_IS')->isoFormat('Do MMM YYYY'),
            // 'user_id' => $request->user_id,
        ]);

        return response()->json(['success' => 'Paciente creado correctamente.', "redirect_url" => route('home')]);
    } */

    public function edit(Paciente $paciente)
    {
        return view('admin.pacientes.edit', [
            'paciente' => $paciente,
        ]);
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            // 'caso' => 'required|unique:pacientes,caso,'.$paciente->id,
            'caso' => 'required',
            // 'codigo_paciente' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'nombres' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'telefono_referencia' => 'required',
            'estado_civil' => 'required',
            'anios' => 'required',
            'nombre_esposo' => 'required',
            'edad_esposo' => 'required',
            'grado_instruccion' => 'required',
            'cantidad_hijos' => 'required',
            'ocupacion' => 'required',
            'ingreso_mensual' => 'required',
            'motivo_consulta' => 'required',
            'historia_familiar' => 'required',
            'tipo_familia' => 'required',
            'tipo' => 'required',
            'conyugal' => 'required',
            'materno' => 'required',
            'paterno' => 'required',
            'fraterno' => 'required',
            'diagnostico_social' => 'required',
            'acciones' => 'required',
            // 'user_id' => 'nullable'
        ]);
        $paciente->update($request->all());
        return redirect()->route('home')->with('success', 'Paciente actualizado correctamente!');
    }

    public function showCaso(Paciente $paciente)
    {
        return view('admin.pacientes.show-caso', [
            'paciente' => Paciente::findOrFail($paciente->id),
        ]);
    }

    /* public function update(Request $request, $id)
    {
        $request->validate([
            // 'caso' => 'required|unique:pacientes,caso,'.$paciente->id,
            'caso' => 'required',
            // 'codigo_paciente' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'nombres' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'telefono_referencia' => 'required',
            'estado_civil' => 'required',
            'anios' => 'required',
            'nombre_esposo' => 'required',
            'edad_esposo' => 'required',
            'grado_instruccion' => 'required',
            'cantidad_hijos' => 'required',
            'ocupacion' => 'required',
            'ingreso_mensual' => 'required',
            'motivo_consulta' => 'required',
            'historia_familiar' => 'required',
            'tipo_familia' => 'required',
            'tipo' => 'required',
            'conyugal' => 'required',
            'materno' => 'required',
            'paterno' => 'required',
            'fraterno' => 'required',
            'diagnostico_social' => 'required',
            'acciones' => 'required',
            // 'user_id' => 'nullable'
        ]);
        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());
        return redirect()->route('home')->with('success', 'Paciente actualizado correctamente!');
    } */


    public function validateCaso(Request $request)
    {
        $caso = Paciente::where('caso', $request->caso)->first('caso');

        if ($caso) {
            // $return =  false;
            return response()->json(['msg' => 'true']);
        }

        return response()->json(['msg' => 'false']);
    }

    /** PISCÓLOGO */
    public function casos_asignados()
    {
        $hijos = Hijo::where('user_id', auth()->user()->id)->get();

        /* $anamnesisCreado = Anamnesis::all();
        $hijo = Hijo::pluck('id')->toArray();

        $anamnesisCreado = Anamnesis::where('hijo_id', $hijo)->exists();

        if ($anamnesisCreado) {
            // dd('Tiene');
            $a = 'tiene';
        } else {
            $a = 'No tiene';
        } */

        //$anamnesis = Anamnesis::where('hijo_id', $hijo);
        return view('psicologo.casos.index', [
            'hijos' => $hijos,
            // 'anamnesis' => Anamnesis::findOrFail($id),
            // 'anamnesisCreado' => $anamnesisCreado,
            // 'anamnesisCreado' => $a,
        ]);
    }

    public function show($id)
    {
        return view('psicologo.casos.ver-caso', [
            'paciente' => Paciente::findOrFail($id),
        ]);
    }

    /** END PISCÓLOGO */
}
