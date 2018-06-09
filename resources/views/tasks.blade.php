@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-sm-offset-0 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        新規タスク
      </div>
      <div class="panel-body">
        <!--バリデーションエラー表示-->
        @if (count($errors) > 0)
        <!-- フォームのエラーリスト -->
        <div class="alert alert-danger">
          <strong>おや？何かがおかしいようです！</strong>

          <br><br>

          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <!-- 新タスクフォーム -->
        <form>
              <!-- タスク名 -->
              <div class="form-group">
                  <label for="task" class="col-sm-2 control-label">タスク</label>

                  <div class="col-sm-9">
                      <input type="text" name="name" id="task-name" class="form-control">
                  </div>
              </div>

              <!-- タスク追加ボタン -->
              <div class="form-group">
                  <div class="col-sm-offset-10 col-sm-6">
                      <button type="submit" class="btn btn-default">
                        タスク追加
                      </button>
                  </div>
              </div>
          </form>

      </div>
      </form>
      @endsection
