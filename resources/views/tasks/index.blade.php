@extends('layouts.app')


@section('content')
  <div class="panel-body container col-sm-offset-3 col-sm-6">
    @include('common.errors')

    <!-- new task form -->
    <form action="{{ url('task') }}" method='POST' class='form-horizontal'>
      {{ csrf_field() }}

      <!-- task name -->
      <div class="form-group">
        <label for="task-name" class="col-sm-3 control-label">Task</label>

        <div class="col-sm-6">
          <input type="text" name='name' id="task-name" class="form-control">
        </div>
      </div>

      <!-- add task button -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type='submit' class="btn-btn-default">
            <i class="fa fa-plus"></i> Add Task
          </button>
        </div>
      </div>
    </form>

    <!-- current tasks -->
    @if (count($tasksVariable) > 0)
      <div class="panel panel-default">
        <div class="panel-heading">
          Current Tasks
        </div>
        <div class="panel-body">
          <table class="table table-striped task-table">
            <thead>
              <th class='col-xs-9'>Task</th>
              <th class='col-xs-3'>Delete</th>
            </thead>
            <tbody>
              @foreach ($tasksVariable as $task)
                <tr>
                  <!-- task content -->
                  <td class="table-text">
                    <div>{{ $task->name }}</div>
                  </td>
                  <td>
                    <!-- delete button -->
                    <form action="{{ url('task/'.$task->id) }}" method='POST'>
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                      <button type='submit' id="delete-task-{{ $task->id }}" class='btn btn-danger'>
                        <i class="fa fa-btn fa-trash"></i> Delete
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endif
  </div>
@endsection