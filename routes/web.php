<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


use App\Task;
use Illuminate\Http\Request;

/**
 * 全タスク表示
 */
Route::get('/', function () {
//EloquentでDBのタスクを並び替えて取得
$tasks = Task::orderBy('created_at', 'asc')->get();

//viewの表示...データをviewに渡す[キー値=>変数]
  return view('tasks',['tasks'=>$tasks]);
});

/**
 * 新タスク追加
 */
Route::post('/task', function (Request $request) {
  //バリデーション
  $validatedData = $request->validate([
        'name' => 'required|max:255',
    ]);
    //タスクの作成
    $task = new Task;
    $task->name = $request->name;
    //タスク保存
    $task->save();
    //表示させる
    return redirect('/');
});

/**
 * 既存タスク削除
 */
Route::delete('/task/{id}', function (Task $task) {
  $task->delete();

 return redirect('/');
});
