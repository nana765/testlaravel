@extends('layouts.app')
@section('content')

<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        新規タスク
      </div>
      <div class="panel-body">
        <!--バリデーションエラー表示-->
        @if (count($errors) > 0)
        <!-- フォームのエラーリスト -->
        <div class="alert alert-danger">
          <strong>入力情報に間違いがあるようです</strong>
          <br><br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <!-- 新タスクフォーム -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}
          <!-- タスク名 -->
          <div class="form-group">
            <label for="tasks" class="col-sm-3 control-label">タスク</label>

            <div class="col-sm-6">
              <input type="text" name="name" id="task-name" class="form-control">
            </div>
          </div>

          <!-- タスク追加ボタン -->
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-default">
               タスク追加
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 現在のタスク -->
    @if (count($tasks) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        現在のタスク
      </div>

      <div class="panel-body">
        <table class="table table-striped task-table">

          <!-- テーブルヘッダー -->
          <thead>
            <th>Task</th>
            <th>&nbsp;</th>
          </thead>

          <!-- テーブルボディー -->
          <tbody>
            @foreach ($tasks as $task)
            <tr>
              <!-- タスク名 -->
              <td class="table-text">
                <div>{{ $task->name }}</div></td>
                  <!-- 削除ボタン -->
                  <td>
                    <!--<form action="{{ url('task/'.$task->id) }}" method="POST">-->
                    <form action="/task/{{ $task->id }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger">タスク削除</button>
                    </form>
                  </td>
                </tr>
                <td>&nbsp;</td>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endif

  </div>
</div>
@endsection
