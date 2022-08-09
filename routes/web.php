<?php

use App\Http\Controllers\AnamnesisController;
use App\Http\Controllers\HijoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::controller(HomeController::class)->group( function ()
{
    Route::get('/cambiar-contraseña', 'changePassword')->name('cambiarContraseña');
    Route::post('/cambiar-contraseña', 'updatePassword')->name('update-password');
});


Route::group(['middleware' => ['admin']], function ()
{
    Route::controller(HomeController::class)->group( function ()
    {
        //los guiones (-) al último de la url es para diferenciar de los psicólogos
        Route::get('/perfil-', 'profile')->name('profile');
        Route::get('/{user}/editar-perfil-', 'editProfile')->name('profile.edit');
        Route::patch('/{user}/perfil-update-', 'updateProfile')->name('profile.update');

        Route::get('/admin', 'index')->name('home');
        Route::get('/data/casos', 'data_casos')->name('data.casos');
        Route::get('/personal', 'users_personal')->name('personal');
        Route::get('/cambiarEstadoPersonal', 'changeStatePersonal')->name('personal.estado');
        Route::get('/personal/create', 'create_personal')->name('personal.create');
        Route::post('/personal', 'store_personal')->name('personal.store');

        Route::get('/pasante', 'pasante')->name('pasante');
        Route::get('/cambiarEstadoPasante', 'changeStatePasante')->name('pasante.estado');
        // Route::post('/pasante', 'store_pasante')->name('pasante.store');

        /** START Pasantes Normal */
        Route::get('/pasante/create', 'create_pasante')->name('pasante.create');
        Route::post('/pasante', 'store_pasante')->name('pasante.store');
        Route::get('/pasante/{pasante}/edit', 'edit_pasante')->name('pasante.edit');
        Route::put('/pasante/{pasante}/update', 'update_pasante')->name('pasante.update');
        Route::delete('/pasante/{pasante}', 'destroy_pasante')->name('pasante.destroy');

        /** END Pasantes Normal */

        /** START Pasantes ajax */
        /* Route::post('/pasante', 'store_pasante')->name('pasante.store');
        Route::get('/pasante/{pasante}', 'edit_pasante')->name('pasante.edit');
        Route::delete('/pasante/{pasante}', 'destroy_pasante')->name('pasante.destroy'); */
        /** END Pasantes ajax */

        Route::get('/voluntario', 'voluntario')->name('voluntario');
        Route::get('/cambiarEstado', 'changeState')->name('voluntario.estado');
        Route::get('/voluntario/create', 'create_voluntario')->name('voluntario.create');
        Route::post('/voluntario', 'store_voluntario')->name('voluntario.store');
        Route::get('/voluntario/{voluntario}/edit', 'edit_voluntario')->name('voluntario.edit');
        Route::put('/voluntario/{voluntario}/update', 'update_voluntario')->name('voluntario.update');
        Route::delete('/voluntario/{voluntario}', 'destroy_voluntario')->name('voluntario.destroy');

        Route::get('/seguimiento/sesiones', 'sesiones')->name('seguimiento.sesiones');
    });

    // Pacientes o casos
    Route::controller(PacienteController::class)->group( function ()
    {
        Route::get('/casos/create', 'create')->name('paciente.create');
        // Route::post('/casos', 'store')->name('paciente.store');//con ajax
        Route::post('/casos', 'store')->name('paciente.store');//prueba sin ajax
        Route::get('/validate-caso','validateCaso')->name('paciente.validar.caso');
        Route::get('/casos/{paciente}/edit', 'edit')->name('paciente.edit');
        Route::patch('/casos/{paciente}/update', 'update')->name('paciente.update');
        Route::get('/casos/{paciente}', 'showCaso')->name('paciente.show');
    });

    Route::controller(HijoController::class)->group( function ()
    {
        Route::get('/asignaciones', 'index')->name('hijos');
        //Route::get('/data/asignaciones', 'data_hijos')->name('hijos.data');//para datatable ajax
        Route::get('/casos-hijo/{id}', 'show')->name('paciente.hijos.show');
        Route::post('/casos-hijo', 'store')->name('paciente.hijos.store');
        /* Route::get('/casos-hijo/{hijo}/edit', 'edit')->name('paciente.hijos.edit');
        Route::patch('/casos-hijo/{hijo}/update', 'update')->name('paciente.hijos.update'); */
        /* Route::get('/edit-hijo', 'edit')->name('hijo.edit');
        Route::post('/update-hijo', 'update')->name('hijo.update'); */
        Route::get('/casos-hijo/{id}/edit', 'update')->name('hijo.update');
        Route::post('/casos-hijo/{id}', 'edit')->name('hijo.edit');

    });

});


Route::group(['middleware' => ['psicologo']], function ()
{
    /** PSICÓLOGOS */
    Route::controller(UserController::class)->group(function ()
    {
        Route::get('/perfil', 'profile')->name('psicologo.profile');
        Route::get('/{user}/editar-perfil', 'editProfile')->name('psicologo.profile.edit');
        Route::patch('/{user}/perfil-update', 'updateProfile')->name('psicologo.profile.update');
    });
    // Route::get('/psico', [AnamnesisController::class, 'index'])->name('psicologo')->middleware('psicologo');
    Route::controller(PacienteController::class)->group( function ()
    {
        Route::get('/psico', 'casos_asignados')->name('casos.list');
        Route::get('/psico/caso/{id}', 'show')->name('caso.show');
        //Route::get('/psico/caso/{id}', 'showCaso')->name('');
    });
    // Route::get('/psico/{id}', [PacienteController::class, 'mostrarAnamnesi']);

    Route::controller(AnamnesisController::class)->group( function ()
    {
        Route::get('/anamnesis', 'index')->name('anamnesis');
        Route::get('/anamnesis/create/{id}', 'create')->name('anamnesis.create');
        Route::post('/anamnesis', 'store')->name('anamnesis.store');
        Route::get('/anamnesis/{id}', 'show')->name('anamnesis.show');
        Route::delete('/anamnesis/{anamnesis}', 'destroy')->name('anamnesis.destroy');
    });

    /* Route::controller(SessionController::class)->group( function ()
    {
        Route::get('/sesion', 'index')->name('sesion');
        Route::get('/sesion/create', 'create')->name('session.create');
        Route::get('/sesion', 'store')->name('session.store');
    }); */
    Route::get('/sesion', [SessionController::class, 'index'])->name('session');
    Route::get('/sesion/create/{id}', [SessionController::class, 'create'])->name('session.create');
    Route::post('/sesion', [SessionController::class, 'store'])->name('session.store');
    Route::get('/sesion/{sesion}', [SessionController::class, 'show'])->name('session.show');
    Route::get('/sesion/{sesion}/edit', [SessionController::class, 'edit'])->name('session.edit');
    Route::put('/sesion/{sesion}/update', [SessionController::class, 'update'])->name('session.update');
    Route::delete('/sesion/{sesion}', [SessionController::class, 'destroy'])->name('session.destroy');
});
