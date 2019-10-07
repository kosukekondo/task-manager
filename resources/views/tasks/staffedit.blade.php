@extends('layouts.app')

@section('content')

<div class="text-center mb-3">
    <h4><a class="font-weight-bold">{{ $task->name }}</a> の担当者の編集</h4>
</div>

{!! Form::model($task, ['route' => ['tasks.staffupdate', $task->id], 'method' => 'put']) !!}
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('staff_id', '担当者：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::select('staff_id', $task->staff->get_staff_list($task->company_id), $task->staff->id, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-sm-8 text-right font-weight-bold">
            {!! Form::submit('更新', ['class' => 'btn btn-block btn-success']) !!}
        </div>
    </div>
{!! Form::close() !!}

@endsection