@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card text-bg-secondary">
                <div class="card-header">Tarefas Criadas</div>
                <div class="card-body">
                  <h5 class="card-title"><center>{{$tasks}}</center></h5>
                  <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-success">
                <div class="card-header">Tarefas Concluídas</div>
                <div class="card-body">
                    <h5 class="card-title"><center>{{$tasksDone}}</center></h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-warning">
                <div class="card-header">Tarefas Não Concluídas</div>
                <div class="card-body">
                  <h5 class="card-title"><center>{{$tasksNotDone}}</center></h5>
                  <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
