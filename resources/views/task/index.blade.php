@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row">
                        {{ __('Tasks') }}
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addTask" class="btn btn-primary">{{ __('New Task') }}</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Title') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('Done Date') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="tasksTableList">
                            @foreach($tasks as $task)
                                @include('task.components.table-item', [
                                    'task'      => $task,
                                    'action'    => 'list'
                                ])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('tasks.store') }}" id="addTaskForm">
    @csrf
    <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="addTaskLabel">{{ __('New Task') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    <div class="alert alert-success d-none fade show" role="alert" id="addTaskSuccess">
                       {{ __('Task added with success')}}
                    </div>
                    <div class="alert alert-danger d-none" role="alert" id="addTaskError"></div>

                    <label for="title" class="col-form-label">{{ __('Title') }}</label>
                    <input id="title" type="text" class="form-control" name="title" autofocus>

                    <label for="description" class="col-form-label">{{ __('Description') }}</label>
                    <textarea id="description" type="text" class="form-control" name="description"></textarea>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close')}}</button>
            <button type="submit" id="addTaskSaveButton" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
        </div>
    </div>
</form>

<form method="PATH" id="editTaskForm">
    @csrf
    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="addTaskLabel">{{ __('Edit Task') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    <div class="alert alert-success d-none fade show" role="alert" id="editTaskSuccess">
                       {{ __('Task updated with success')}}
                    </div>
                    <div class="alert alert-danger d-none" role="alert" id="editTaskError"></div>

                    <label for="titleEdit" class="col-form-label">{{ __('Title') }}</label>
                    <input id="titleEdit" type="text" class="form-control" name="title" autofocus>

                    <label for="descriptionEdit" class="col-form-label">{{ __('Description') }}</label>
                    <textarea id="descriptionEdit" type="text" class="form-control" name="description"></textarea>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close')}}</button>
            <button type="submit" id="editTaskSaveButton" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
        </div>
    </div>
</form>

<form method="DELETE" id="deleteTaskForm">
    @csrf
    <div class="modal fade" id="deleteTaskModal" tabindex="-1" aria-labelledby="deleteTaskLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="addTaskLabel">{{ __('Delete Task') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    <div class="alert alert-success d-none fade show" role="alert" id="deleteTaskSuccess">
                       {{ __('Task deleted with success')}}
                    </div>
                    <div class="alert alert-danger d-none" role="alert" id="deleteTaskError"></div>

                    <p>
                        {{__('Pay Attention, after click in Delete, it is not possible to recover')}}
                    </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close')}}</button>
            <button type="submit" id="deleteTaskSaveButton" class="btn btn-danger">{{ __('Delete') }}</button>
            </div>
        </div>
        </div>
    </div>
</form>

@endsection
