<?php

namespace App\Http\Controllers;

use App\Models\Hijo;
use App\Models\Role;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Pasante;
use App\Models\Session;
use App\Models\Voluntario;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /** Ver pacientes o casos */
    public function index()
    {
        $pacientes = Paciente::all();
        $hijos = Hijo::all();
        $pacientesCreated = Paciente::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

        $months = Paciente::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $key => $month) {
            $datas[$month-1] = $pacientesCreated[$key];
        }

        $masculino = Paciente::select(DB::raw("COUNT(*) as count"))
            ->where('sexo', 0)
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $femenino = Paciente::select(DB::raw("COUNT(*) as count"))
            ->where('sexo', 1)
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $pacientesMasculinos = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $pacientesFemeninos = array(0,0,0,0,0,0,0,0,0,0,0,0);

        if (!$masculino->isEmpty() || !$femenino->isEmpty()) {
            //dd('No está vacío');
            /* $monthsMasculino = Paciente::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month'); */

            foreach ($months as $key => $month) {
                $pacientesMasculinos[$month-1] = $masculino[$key]??null;
            }

            /* $monthsFemenino = Paciente::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month'); */

            foreach ($months as $key => $month) {
                $pacientesFemeninos[$month-1] = $femenino[$key]??null;
            }
        }


        /** Masculinos por mes */
        /* $masculino = Paciente::select(DB::raw("COUNT(*) as count"))
            ->where('sexo', 'masculino')
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $pacientesMasculinos = array(0,0,0,0,0,0,0,0,0,0,0,0);
        // El if es para comprobar si está vacío o no la consulta, en sí es para que no de errores de "undefined array key 0"
        if (!$masculino->isEmpty()) {
            //dd('No está vacío');
            $monthsMasculino = Paciente::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');

            foreach ($monthsMasculino as $key => $month) {
                $pacientesMasculinos[$month-1] = $masculino[$key];
            }
        } */
        //dd('Vacío Masculino');
        /** Femenino por mes */
        /* $femenino = Paciente::select(DB::raw("COUNT(*) as count"))
            ->where('sexo', 'femenino')
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $pacientesFemeninos = array(0,0,0,0,0,0,0,0,0,0,0,0);
        if (!$femenino->isEmpty()) {
            //dd('No está vacío');
            $monthsFemenino = Paciente::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');

            foreach ($monthsFemenino as $key => $month) {
                $pacientesFemeninos[$month-1] = $femenino[$key];
            }
        } */
        //dd('Vacío Femenino');


        /** Nuevo highcharts */
        /* $pacientesCreated = Paciente::select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count');
        //dd($pacientesCreated);


        $pacientesMasculinos = Paciente::select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->where('sexo', 0)
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count');
                            //48,52
       //dd($pacientesMasculinos->count());


        $pacientesFemeninos = Paciente::select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->where('sexo', 1)
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count'); */
       //dd($pacientesFemeninos);

                /** Nuevo highcharts */

        /** Conteo de casos asignados y sin asignar */
        $asignados = $hijos->where('user_id', !null)->count();
        $sin_asignar = $hijos->where('user_id', null)->count();

        /** Conteo del plantel institucional */
        $administrativos = User::all();
        $pasantes = Pasante::all();
        $voluntarios = Voluntario::all();

        $totalPlantel = $administrativos->count() + $pasantes->count() + $voluntarios->count();

        return view('home',[
            'pacientes' => $pacientes,
            'datas' => $datas,
            'pacientesMasculinos' => $pacientesMasculinos,
            'pacientesFemeninos' => $pacientesFemeninos,
            'asignados' => $asignados,
            'sin_asignar' => $sin_asignar,
            'hijos' => $hijos,
            'totalPlantel' => $totalPlantel,
        ]);
    }

    public function data_casos()
    {
        //$paciente = Paciente::all();
        $casos = Paciente::select('id','caso', 'fecha', 'nombres', 'edad', 'sexo', 'telefono', 'estado_civil', 'nombre_esposo', 'grado_instruccion','cantidad_hijos', 'ocupacion', 'ingreso_mensual')->get();

        // return $casos;
        return datatables($casos)
            ->addColumn('', '')
            ->addColumn('view', function($casos){
                return '<a href="'.route('paciente.show', ['paciente'=>$casos->id]).'" class="btn btn-info py-1"><i class="fa-solid fa-eye"></i></a>';
            })
            ->addColumn('edit', function($casos){
                return '<a href="'.route('paciente.edit', ['paciente'=>$casos->id]).'" class="btn btn-warning py-1"><i class="fa-solid fa-file-pen"></i></a>';
            })
            ->editColumn('sexo', function($casos){
                if($casos->sexo == 0){
                    return 'Masculino';
                }
                return 'Femenino';
            })
            ->editColumn('caso', function($casos){
                return 'N°'.' '.$casos->caso;
            })
            ->editColumn('cantidad_hijos', function($casos){
                // $casos->cantidad_hijos .'-';
                return $casos->cantidad_hijos .' '.'<a href="'.route('paciente.hijos.show', ['id' => $casos]).'"><i class="fa-solid fa-eye mx-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Ver Hijos"></i></a>';
            })
            ->rawColumns(['', 'edit', 'cantidad_hijos', 'view', 'sexo'])
            ->make(true);
    }

    /** Ver Usuarios del personal */
    public function users_personal()
    {
        $users = User::all()->except(auth()->user()->id);
        $pasantes = Pasante::all();
        $voluntarios = Voluntario::all();

        return view('admin.personal.index', [
            'users' => $users,
            'pasantes' => $pasantes,
            'voluntarios' => $voluntarios,
        ]);
    }

    public function changeStatePersonal(Request $request)
    {
        $personal = User::findOrFail($request->id)->update(['estado' => $request->estado]);

        if($request->estado == 0)  {
            $newStatusPe = '<span class="badge bg-danger">Inactivo</span>';
        }else{
            $newStatusPe ='<span class="badge bg-success">Activo</span>';
        }
        return response()->json(['var'=>''.$newStatusPe.'']);
    }

    /** Vista crear Usuarios del personal */
    public function create_personal()
    {
        $roles = Role::all();

        return view('admin.personal.create', [
            'roles' => $roles
        ]);
    }

    /** CREAR Usuarios del personal */
    public function store_personal(Request $request)
    {
        //dd($request->all());
        $request->request->add(['username' => Str::slug($request->username)]);
        // Validación
        $this->validate($request, [
            'name' => ['required', 'string', 'max:70', 'min:3'],
            'username' => ['required', 'unique:users', 'max:15', 'min:3'],
            'role_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'telefono' => ['required', 'max:8'],
            'direccion' => ['required', 'string', 'max:255'],
            'ci' => ['required', 'string', 'max:10'],
            //'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'ci' => $request->ci,
            'password' => Hash::make($request->password),
        ]);

        /* if ($request->role_id === '4') {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:70', 'min:3'],
                'username' => ['nullable'],
                'role_id' => ['required'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                'telefono' => ['required', 'max:8'],
                'direccion' => ['required', 'string', 'max:255'],
                'ci' => ['required', 'string', 'max:10'],
                'universidad' => ['required', 'string', 'max:40'],
                'password' => ['nullable'],
            ]);
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'ci' => $request->ci,
                'universidad' => $request->universidad,
                'password' => Hash::make($request->password),
            ]);
        }
        if ($request->role_id === '5') {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:70', 'min:3'],
                'role_id' => ['required'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                'telefono' => ['required', 'max:8'],
                'direccion' => ['required', 'string', 'max:255'],
                'ci' => ['required', 'string', 'max:10'],
                'profesion' => ['required', 'string', 'max:30'],
                'password' => ['nullable'],
            ]);
            User::create([
                'name' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'ci' => $request->ci,
                'profesion' => $request->profesion,
                'password' => Hash::make($request->password),
            ]);
        } */

        /** Para iniciar sesión automáticamente */
        // auth()->attempt($request->only('email', 'password'));

        return redirect()->route('personal');
    }

    /** Pasantes */
    public function pasante()
    {
        $pasantes = Pasante::all();
        return view('admin.personal.pasantes', [
            'pasantes' => $pasantes,
        ]);
    }

    public function changeStatePasante(Request $request)
    {
        $pasante = Pasante::findOrFail($request->id)->update(['estado' => $request->estado]);

        if($request->estado == 0)  {
            $newStatusP = '<span class="badge bg-danger">Inactivo</span>';
        }else{
            $newStatusP ='<span class="badge bg-success">Activo</span>';
        }
        return response()->json(['var'=>''.$newStatusP.'']);
    }

    public function create_pasante()
    {
        return view('admin.personal.create-pasante');
    }

    // START AJAX PASANTE
    /* public function store_pasante(Request $request)
    {
        $pasante = Pasante::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'universidad' => $request->universidad,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_final' => $request->fecha_final,
                // 'estado' => $request->estado,
            ]
        );

        if ($pasante) {
            return response()->json(['status' => 'success', 'data' => $pasante]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Pasante not created']);
    } */

    /* public function edit_pasante(Pasante $pasante)
    {
        return response()->json(['status' => 'success', 'data' => $pasante]);
        // return response()->json(['status' => 'failed', 'message' => 'No post found']);
    } */

    /* public function destroy_pasante(Pasante $pasante)
    {
        $pasante->delete();
        return response()->json(['status' => 'success', 'data' => $pasante]);
    } */
    // END AJAX PASANTE


    public function store_pasante(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => ['required', 'string', 'max:70', 'min:3'],
            'telefono' => ['required', 'max:8'],
            'direccion' => ['required', 'string', 'max:255'],
            'universidad' => ['required', 'max:60', 'min:2'],
            'fecha_inicio' => ['required'],
            'fecha_final' => ['required'],
        ]);

        Pasante::create([
            'name' => $request->name,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'universidad' => $request->universidad,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
        ]);

        return redirect()->route('pasante')->with("success", "Pasante registrado correctamente!");
    }

    public function edit_pasante(Pasante $pasante)
    {
        return view('admin.personal.edit-pasante', [
            'pasante' => $pasante
        ]);
    }

    public function update_pasante(Request $request, Pasante $pasante)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:70', 'min:3'],
            'telefono' => ['required', 'max:8'],
            'direccion' => ['required', 'string', 'max:255'],
            'universidad' => ['required', 'max:60', 'min:2'],
            'fecha_inicio' => ['required'],
            'fecha_final' => ['required'],
        ]);
        $pasante->update($request->all());
        return redirect()->route('pasante')->with('success', 'Datos Actualizados Correctamente!');
    }

    public function destroy_pasante(Pasante $pasante)
    {
        $pasante->delete();
        return redirect()->route('pasante')->with('success', 'Pasante Eliminado Correctamente!');
    }
    /** END pasantes */

    /** Voluntario */

    public function voluntario()
    {
        $voluntarios = Voluntario::all();
        return view('admin.personal.voluntarios', [
            'voluntarios' => $voluntarios,
        ]);
    }

    public function changeState(Request $request)
    {
        $voluntario = Voluntario::findOrFail($request->id)->update(['estado' => $request->estado]);

        if($request->estado == 0)  {
            $newStatus = '<span class="badge bg-danger">Inactivo</span>';
        }else{
            $newStatus ='<span class="badge bg-success">Activo</span>';
        }
        return response()->json(['var'=>''.$newStatus.'']);
    }

    public function create_voluntario()
    {
        return view('admin.personal.create-voluntario');
    }

    public function store_voluntario(Request $request)
    {
        // dd($request->all());
        // Validación
        $this->validate($request, [
            'name' => ['required', 'string', 'max:70', 'min:3'],
            'telefono' => ['required', 'max:8'],
            'direccion' => ['required', 'string', 'max:255'],
            'profesion' => ['required', 'max:60', 'min:2'],
        ]);

        Voluntario::create([
            'name' => $request->name,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'profesion' => $request->profesion,
        ]);

        return redirect()->route('voluntario')->with("success", "Voluntario registrado correctamente!");
    }

    public function edit_voluntario(Voluntario $voluntario)
    {
        return view('admin.personal.edit-voluntario', [
            'voluntario' => $voluntario
        ]);
    }

    public function update_voluntario(Request $request, Voluntario $voluntario)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:70', 'min:3'],
            'telefono' => ['required', 'max:8'],
            'direccion' => ['required', 'string', 'max:255'],
            'profesion' => ['required', 'max:60', 'min:2'],
        ]);
        $voluntario->update($request->all());
        return redirect()->route('voluntario')->with('success', 'Datos Actualizados Correctamente!');
    }

    public function destroy_voluntario(Voluntario $voluntario)
    {
        $voluntario->delete();

        return redirect()->route('voluntario')->with('success', 'Voluntario Eliminado Correctamente!');
    }

    /** END voluntario */

    /** START SEGUIMIENTO - SESIONES */
    public function sesiones()
    {
        //$pacientes = Hijo::all();
        /* //$pacienteID = $pacientes->pluck('id');
        //$sesiones = Session::whereIn('hijo_id', $pacienteID)->get();
        $sesiones = Session::all();
        foreach($pacientes as $paciente)
        {
            $paciente = Hijo::where('user_id', '!=', NULL)->get();//pacientes con encargada
            $pacienteID = $paciente->pluck('id');//id de los pacientes
            $PacienteSesiones = Session::whereIn('hijo_id', $pacienteID)->get();//los paciente que tienen sesiones

            foreach($PacienteSesiones as $sesion){
                if($sesion->fecha != null){
                    $fecha = $sesion->fecha;
                }
            }
        } */
        $pacientes = DB::select("SELECT DISTINCT hijos.nombre as nombre, pacientes.caso as num_caso ,users.`name` as encargada,  COUNT(sessions.num_sesion) as num_sesion, Max(sessions.fecha) as ultima_fecha FROM hijos INNER JOIN sessions ON hijos.id = sessions.hijo_id INNER JOIN users ON  hijos.user_id = users.id INNER JOIN pacientes ON hijos.paciente_id = pacientes.id GROUP BY sessions.hijo_id, hijos.id");


        return view('admin.sessions.index', [
            'pacientes' => $pacientes,//hijos
        ]);
    }
    /** END SEGUIMIENTO - SESIONES */

    /** PROFILE */
    public function profile()
    {
        return view('admin.profile.profile');
    }

    public function editProfile(User $user)
    {
        return view('admin.profile.edit-profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request, User $user)
    {
        // $user = User::findOrFail($user);
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            // 'email' => 'required',
            // 'role_id' => 'required',
            'ci' => 'required',
        ]);
        $user->update($request->all());
        // return back()->with("status", "Datos actualizados correctamente!");
        return redirect()->route('profile')->with("status", "Datos actualizados correctamente!");
    }

    public function changePassword()
    {
        return view('change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "La contraseña antigua no coincide!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('profile')->with("status", "Contraseña actualizada correctamente!");
        // return back()->with("status", "Contraseña actualizada correctamente!");
    }
    /** END PROFILE */
}
