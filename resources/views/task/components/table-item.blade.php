@if($action != 'update')
    <tr id="item-{{$task->id}}">
@endif
        <th scope="row">{{$task->id}}</th>
        <td>{{$task->title}}</td>
        <td>{{$task->status_label}}</td>
        <td>@if($task->status == 1) {{$task->done_date->format('d/m/Y H:i')}} @else - @endif</td>
        <td>
            <button class="btn editTaskButton" action="{{ route('tasks.update', $task->id) }}" url="{{ route('tasks.edit', $task->id) }}" title="{{ __('Edit Task')}}" href="{{route('tasks.edit', $task->id)}}">
                <i class="bi bi-pencil"></i>
            </button>
            <button class="btn updateStatus" action="{{ route('tasks.update', $task->id) }}" value="{{$task->status}}" title="{{$task->status == 0 ? __('Set Done Task') : __('Unset Done Task')}}">
                <i class="bi bi-check-lg"></i>
            </button>
            <button class="btn deleteTask" action="{{route('tasks.destroy', $task->id)}}" title="{{ __('Delete Task') }}">
                <i class="bi bi-trash"></i>
            </button>
        </td>
@if($action != 'update')
    </tr>
@endif
