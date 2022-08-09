<?php

namespace App\Http\Controllers;

use App\Models\Anamnesis;
use App\Models\Hijo;
use App\Models\Paciente;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnamnesisController extends Controller
{

    public function index()
    {
        /*
            $idUser = auth()->user()->caso_hijo->pluck('user_id')->toArray();
            $anamnesis3 = Hijo::whereIn('user_id', $idUser)->get();
        */

        /* $anamnesis = Anamnesis::all();
        $anamnesiss = Anamnesis::where('hijo_id', 1)->get();
        dd($anamnesiss->toArray()); */

        /* $hijos = Hijo::where('user_id', auth()->user()->id)->get();
        $anamnesis = Anamnesis::where('hijo_id', );
        dd($hijos->toArray()); */

        /* $anamnesisP = Anamnesis::find(1);

        if($anamnesisP->hijo->user_id === auth()->user()->id)
        {
            dd($anamnesisP->hijo->user->name);
        } */

        $anamnesis = Anamnesis::where('user_id', auth()->user()->id)->get();

        return view('psicologo.anamnesis.index', [
            'anamnesis' => $anamnesis
        ]);
    }

    public function create($id)
    {
        $hijo = Hijo::findOrFail($id);
        $existAnamnesis = Hijo::findOrFail($id)->anamnesis;

        /* if(!$existAnamnesis){
            dd('NO TIENE');
        }
        dd($existAnamnesis->id); */

        return view('psicologo.anamnesis.create', [
            'hijo' => $hijo,
            // 'anamnesis' => Anamnesis::findOrFail($id)
            'existAnamnesis' => $existAnamnesis,
            //'anamnesi' => Anamnesis::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'hijo_id' => ['required'],
            'user_id' => ['required'],
            'em_duracion' => ['required'],
            'em_enfermedades' => ['required'],
            'em_planificacion' => ['required'],
            'em_genero_esperado' => ['required'],
            'em_lesiones' => ['required'],
            'em_estado_emocional' => ['required'],
            'em_alimentacion' => ['required'],
            'em_seguimiento_medico' => ['required'],
            'pr_lugar_atencion' => ['required'],
            'pr_atendido_por' => ['required'],
            'pr_duracion' => ['required'],
            'pr_estado' => ['required'],
            'pr_complicaciones' => ['required'],
            'pr_tipo' => ['required'],
            'rn_apgar' => ['required'],
            'rn_peso' => ['required'],
            'rn_color' => ['required'],
            'rn_llorar' => ['required'],
            'rn_incubadora' => ['required'],
            'rn_posicion_mano' => ['required'],
            'rn_llorar_movimientos' => ['required'],
            'pi_edad_sost_cabeza' => ['required'],
            'pi_edad_sentarse' => ['required'],
            'pi_edad_gateo' => ['required'],
            'pi_edad_caminar' => ['required'],
            'pi_edad_primeras_palabras' => ['required'],
            'pi_edad_primeras_frases' => ['required'],
            'pi_edad_lactacion' => ['required'],
            'pi_lesiones' => ['required'],
            'pi_enfermedades' => ['required'],
            'pi_temperatura' => ['required'],
            'pi_operacion_quirurgica' => ['required'],
            'da_enfermedad' => ['required'],
            'da_problemas_hablar' => ['required'],
            'da_lateralidad' => ['required'],
            'da_moja_orina' => ['required'],
            'da_miedo' => ['required'],
            'da_disciplina' => ['required'],
            'da_relacion_hermanos' => ['required'],
            'da_responsabilidad_hogar' => ['required'],
            'da_motivacion_hijo' => ['required'],
            'da_conductas_hijo' => ['required'],
            'acf_respeto' => ['required'],
            'acf_emociones_hermano' => ['required'],
            'acf_gusto_trato' => ['required'],
            'acf_comportamiento_hijo' => ['required'],
            'acf_intereses_hijo' => ['required'],
            'acf_profesion_hijo' => ['required'],
            'acf_problemas_preocupantes_hijo' => ['required'],
            'ef_estado_civil' => ['required'],
            'ef_tiempo' => ['required'],
            'ef_causa' => ['required'],
            'ef_hijo_vive' => ['required'],
            'ef_abandono_hogar' => ['required'],
            'af_ambiente_casa' => ['required'],
            'af_causa_discusiones' => ['required'],
            'ace_autoridad' => ['required'],
            'ace_proteccion' => ['required'],
        ]);

        Anamnesis::insert([
            'hijo_id' => $request->hijo_id,
            'user_id' => $request->user_id,
            'em_duracion' => $request->em_duracion,
            'em_enfermedades' => $request->em_enfermedades,
            'em_planificacion' => $request->em_planificacion,
            'em_genero_esperado' => $request->em_genero_esperado,
            'em_lesiones' => $request->em_lesiones,
            'em_estado_emocional' => $request->em_estado_emocional,
            'em_alimentacion' => $request->em_alimentacion,
            'em_seguimiento_medico' => $request->em_seguimiento_medico,
            'pr_lugar_atencion' => $request->pr_lugar_atencion,
            'pr_atendido_por' => $request->pr_atendido_por,
            'pr_duracion' => $request->pr_duracion,
            'pr_estado' => $request->pr_estado,
            'pr_complicaciones' => $request->pr_complicaciones,
            'pr_tipo' => $request->pr_tipo,
            'rn_apgar' => $request->rn_apgar,
            'rn_peso' => $request->rn_peso,
            'rn_color' => $request->rn_color,
            'rn_llorar' => $request->rn_llorar,
            'rn_incubadora' => $request->rn_incubadora,
            'rn_posicion_mano' => $request->rn_posicion_mano,
            'rn_llorar_movimientos' => $request->rn_llorar_movimientos,
            'pi_edad_sost_cabeza' => $request->pi_edad_sost_cabeza,
            'pi_edad_sentarse' => $request->pi_edad_sentarse,
            'pi_edad_gateo' => $request->pi_edad_gateo,
            'pi_edad_caminar' => $request->pi_edad_caminar,
            'pi_edad_primeras_palabras' => $request->pi_edad_primeras_palabras,
            'pi_edad_primeras_frases' => $request->pi_edad_primeras_frases,
            'pi_edad_lactacion' => $request->pi_edad_lactacion,
            'pi_lesiones' => $request->pi_lesiones,
            'pi_enfermedades' => $request->pi_enfermedades,
            'pi_temperatura' => $request->pi_temperatura,
            'pi_operacion_quirurgica' => $request->pi_operacion_quirurgica,
            'da_enfermedad' => $request->da_enfermedad,
            'da_problemas_hablar' => json_encode($request->da_problemas_hablar),
            'da_lateralidad' => $request->da_lateralidad,
            'da_moja_orina' => $request->da_moja_orina,
            'da_miedo' => $request->da_miedo,
            'da_disciplina' => $request->da_disciplina,
            'da_relacion_hermanos' => $request->da_relacion_hermanos,
            'da_responsabilidad_hogar' => $request->da_responsabilidad_hogar,
            'da_motivacion_hijo' => $request->da_motivacion_hijo,
            'da_conductas_hijo' => json_encode($request->da_conductas_hijo),
            'acf_respeto' => $request->acf_respeto,
            'acf_emociones_hermano' => $request->acf_emociones_hermano,
            'acf_gusto_trato' => $request->acf_gusto_trato,
            'acf_comportamiento_hijo' => $request->acf_comportamiento_hijo,
            'acf_intereses_hijo' => $request->acf_intereses_hijo,
            'acf_profesion_hijo' => $request->acf_profesion_hijo,
            'acf_problemas_preocupantes_hijo' => $request->acf_problemas_preocupantes_hijo,
            'ef_estado_civil' => $request->ef_estado_civil,
            'ef_tiempo' => $request->ef_tiempo,
            'ef_causa' => $request->ef_causa,
            'ef_hijo_vive' => $request->ef_hijo_vive,
            'ef_abandono_hogar' => $request->ef_abandono_hogar,
            'af_ambiente_casa' => $request->af_ambiente_casa,
            'af_causa_discusiones' => $request->af_causa_discusiones,
            'ace_autoridad' => $request->ace_autoridad,
            'ace_proteccion' => $request->ace_proteccion,
        ]);

        return redirect()->route('anamnesis')->with('success', 'Anamnesis Creado Correctamente!');
    }

    public function show($id)
    {
        return view('psicologo.anamnesis.show', [
            'anamnesis' => Anamnesis::findOrFail($id),
        ]);
    }

    public function destroy(Anamnesis $anamnesis)
    {
        $anamnesis->delete();
        $anamnesis = Session::where('hijo_id', $anamnesis->hijo->id)->delete();
        return redirect()->route('anamnesis')->with('success', 'Anamnesis Eliminado Correctamente!');
    }
}
