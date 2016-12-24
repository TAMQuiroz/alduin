<!-- resources/views/index.blade.php -->

@extends('layouts.app')

@section('title', 'Mantenimiento de Tareas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <h4>Mantenimiento de Tareas</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('task.create')}}">
                                {{Form::button('<i class="fa fa-plus"></i> Crear', ['class' => 'btn btn-success pull-right'])}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Tareas actuales</b>
                    </div>

                    <div class="panel-body">
                        @if(count($tasks) > 0)
                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th colspan="2" class="text-center">Acciones</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <!-- Task Name -->
                                            <td>
                                                <div>{{ $task->name }}</div>
                                            </td>

                                            <td>
                                                <div>{{ $task->date}}</div>
                                            </td>

                                            <td>
                                                <a href="{{route('task.show',$task->id)}}">
                                                    {{Form::button('<i class="fa fa-search"></i> Ver', ['class' => 'btn btn-primary pull-right'])}}
                                                </a>
                                            </td>    

                                            <!-- Delete Button -->
                                            <td>
                                                {{Form::button('<i class="fa fa-trash"></i> Eliminar', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#task'.$task->id])}}
                                                @include('modals.delete', ['id'=> 'task'.$task->id, 'message' => '¿Esta seguro que desea eliminar esta tarea?', 'route' => route('task.delete', $task->id)])
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $tasks->links() }}
                        @else
                            No se encontraron tareas
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection