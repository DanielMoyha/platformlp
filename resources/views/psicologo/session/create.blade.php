@extends('layouts.dashboard_Psico')

@section('titulo')
    Programar Sesión
@endsection

@push('styles')
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Registrar Nueva Sesión</li>
    </ol>

    <div class="card border-info">
        <div class="card-header bg-info text-center text-white fw-bold h5">Formulario de Sesión</div>
        <div class="card-body">
            <div class="row border-bottom">
                <div class="col-md-6 mb-3">
                    <span class="form-label">Paciente: {{ $hijo->nombre }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <span class="form-label">Número de Caso: {{ $hijo->paciente->caso }}</span>
                </div>
                {{--  <div class="col-md-6 mb-3">
                    <span class="form-label">
                        @if ($hijo->totalSesiones == null || empty($hijo->totalSesiones))
                        Este paciente tiene: 0 Sesiones
                        @else
                            Este paciente tiene: {{ $hijo->totalSesiones->count() }} Sesiones
                        @endif
                    </span>
                </div>  --}}
            </div>
            <div class="row mt-3">
                <form action="{{ route('session.store') }}" class="row needs-validation justify-content-around" novalidate method="POST">
                    @csrf
                    <input type="hidden" value="{{ $hijo->id }}" name="hijo_id">
                    <div class="col-md-2 mb-3">
                        <label for="num_sesion" class="form-label">Número de Sesión</label>
                        <input
                            type="number"
                            class="form-control"
                            id="num_sesion"
                            name="num_sesion"
                            required
                        >
                        <div class="invalid-feedback">
                            Por favor, digite el número de sesion.
                        </div>
                    </div>
                    {{--  <div class="col-md-2 mb-3">
                        <label for="sesion" class="form-label">Sesión:</label>
                        <input type="number" class="form-control" id="sesion" name="sesion" required>
                        <div class="invalid-feedback">
                            Por favor, indique la sesion.
                        </div>
                    </div>  --}}
                    <div class="col-md-3 mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                        <div class="invalid-feedback">
                            Por favor, indique la fecha.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="proxima_fecha" class="form-label">Próxima Fecha</label>
                        <input type="date" class="form-control" id="proxima_fecha" name="proxima_fecha" required>
                        <div class="invalid-feedback">
                            Por favor, indique la fecha.
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="desarrollo" class="form-label">Desarrollo de la sesión:</label>
                        <textarea
                            name="desarrollo"
                            id="desarrollo"
                            class="form-control"
                            rows="5"
                            placeholder="Describa todo el desarrollo de la sesión..."
                            required
                        ></textarea>
                        <div class="invalid-feedback">
                            Por favor, describa el desarrollo.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tareas" class="form-label">Tareas:</label>
                        <textarea
                            name="tareas"
                            id="tareas"
                            class="form-control"
                            rows="4"
                            placeholder="Describa las tareas que vio pertinentes realizar..."
                            required
                        ></textarea>
                        <div class="invalid-feedback">
                            Por favor, describa las tareas.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="observacion" class="form-label">Observaciones:</label>
                        <textarea
                            name="observacion"
                            id="observacion"
                            class="form-control"
                            placeholder="Describa las observaciones que rescata de la sesión..."
                            rows="4"
                            required
                        ></textarea>
                        <div class="invalid-feedback">
                            Por favor, describa las observaciones.
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('casos.list') }}" class="btn btn-danger fw-bold mx-2">Cancelar</a>
                        <button class="btn btn-success fw-bold" type="submit">Guardar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endpush
