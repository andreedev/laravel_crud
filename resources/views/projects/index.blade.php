@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">{{ __("Listado de proyectos") }}</h1>
                <a href="{{ route("projects.create") }}" class="btn btn-success">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    {{ __("Crear proyecto") }}
                </a>
            </div>
        </div>
    
        <div class="row my-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __("Nombre") }}</th>
                        <th>{{ __("Autor") }}</th>
                        <th>{{ __("Alta") }}</th>
                        <th>{{ __("Acciones") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            {{-- <td scope="row">{{ $project->name }}</td> --}}
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->user->name }}</td>
                            <td>{{ date_format($project->created_at, "d/m/Y") }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route("projects.edit", ["project" => $project]) }}" role="button">
                                    <i class="fas fa-edit"></i>
                                    {{ __("Editar") }}
                                </a>
                                <a 
                                    class="btn btn-danger" 
                                    role="button"
                                    onclick="event.preventDefault();document.getElementById('delete-project-{{ $project->id }}-form').submit();"
                                >
                                <i class="fas fa-trash-alt"></i>
                                {{ __("Eliminar") }}
                                </a>
                            <form id="delete-project-{{ $project->id }}-form" action="{{ route("projects.destroy", ["project" => $project]) }}" method="POST" class="hidden">
                                @method("DELETE")
                                @csrf
                            </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ __("No hay proyectos") }}</strong>
                                    <span>{{ __("Todavía no hay nada que mostrar aquí.") }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($projects->count())
                <div class="my-2">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection