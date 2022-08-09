<?php

namespace App\Http\Controllers;

use App\Models\Hijo;
use App\Models\Paciente;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HijoController extends Controller
{

    //listado de asignaciones
    public function index()
    {
        $hijos = Hijo::all();
        return view('admin.pacientes.hijos', [
            'hijos' => $hijos,
        ]);
    }

    // En caso de traer las asignaciones con ajax, pero verificar bien la agrupación del datatable
    /* public function data_hijos()
    {
        $hijos = Hijo::select('id', 'paciente_id', 'nombre', 'sexo', 'edad', 'user_id', 'created_at');

        return datatables($hijos)
            ->editColumn('paciente_id', function($hijos){
                return '<span class="d-none">N° de Caso:'. $hijos->paciente->caso .'</span>';
            })
            ->editColumn('user_id', function($hijos){
                if ($hijos->user_id) {
                    return '<span class="badge bg-success fst-italic small"><i class="fa-solid fa-user-tag"></i>'.$hijos->user->name.'</span>';
                } else {
                    return '<span class="badge bg-danger">Sin Encargada</span>';
                }
            })
            // ->editColumn('paciente_id', function($hijos){
            //     return '<td class="d-none">'. $hijos->paciente->nombres. '</td>';
            // })
            ->editColumn('sexo', function($hijos){
                if($hijos->sexo == 'Masculino'){
                    return '<p>'. $hijos->sexo .'<i class="fa-solid fa-mars"></i></p>';
                }else{
                    return '<p>'. $hijos->sexo .'<i class="fa-solid fa-venus"></i></p>';
                }
            })
            ->editColumn('created_at', function($hijos){
                return '<span class="bg-info small fst-italic text-white rounded-pill px-2 py-1 fw-bold">'.
                Carbon::parse($hijos->created_at)->format('d-m-Y').'<i class="fa-solid fa-calendar-check mx-1"></i></span>';
            })
            ->rawColumns(['paciente_id', 'user_id','sexo', 'created_at'])
            ->make(true);
    } */

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);

        $hijosPaciente = Hijo::where('paciente_id', '=', $paciente->id)->get(); // hijos del paciente seleccionado
        //$users = User::all()->except(auth()->user()->id);
        $users = User::where('role_id', 2)->get();
        if ($hijosPaciente->isEmpty()) {
            //dd('NO tiene Hijos creados en la BD'); // se muestra el formulario
            return view('admin.pacientes.show', [
                'paciente' => $paciente,
                'users' => $users,
                'hijosPaciente' => $hijosPaciente
            ]);
        } else {
            //dd('Tiene Hijos creados en la BD'); // osea esta sería la tabla de edit directamente
            return view('admin.pacientes.show2', [
                'paciente' => $paciente,
                'users' => $users,
                'hijo' => Paciente::findOrFail($id),
                //'hijo' => Hijo::findOrFail($id),//con esta condición, daba error 404 cuando un caso(paciente) solo tenía a un hijo..., pero ya se solucionó cambiando Hijo:: por Paciente::
            ]);
        }

    }

    public function store(Request $request)
    {
        $paciente_id = $request->paciente_id;
        $nombre = $request->nombre;
        $sexo = $request->sexo;
        $edad = $request->edad;
        $user_id = $request->user_id;
        $created_at = Carbon::now();
        // $updated_at = Carbon::now();

        foreach($paciente_id as $key => $no)
        {
            $input['paciente_id'] = $no;
            $input['nombre'] = $nombre[$key];
            $input['sexo'] = $sexo[$key];
            $input['edad'] = $edad[$key];
            $input['user_id'] = $user_id[$key];
            $input['created_at'] = $created_at;
            // $input['updated_at'] = $updated_at;
            Hijo::insert($input);
        }

        return redirect()->route('hijos')->with('success', 'Asignaciones Realizadas Correctamente!');
    }

    /* public function edit(Hijo $hijo)
    {
        $users = User::all()->except(auth()->user()->id);
        return view('admin.pacientes.edit-hijos', [
            'hijo' => $hijo,
            'users' => $users
        ]);
    } */

    /* public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $hijo  = Hijo::where($where)->first();

        return response()->json($hijo);
    } */

    public function edit(Request $request, $id)
    {
        Hijo::updateOrCreate(
        [
            'id' => $id
        ],
        [
            'paciente_id' => $request->paciente_id,
            'nombre' => $request->nombre,
            'sexo' => $request->sexo,
            'edad' => $request->edad,
            'user_id' => $request->user_id,
        ]
        );

        return response()->json([ 'success' => 'Datos actualizados correctamente!' ]);

    }

    public function update($id)
    {
    	$hijo = Hijo::findOrFail($id);

	    return response()->json([
	      'data' => $hijo
	    ]);
    }
}
