@extends('layouts.app')

@section('content')

<div class="text-center mb-4">
    <h4><a class="font-weight-bold">{{ $invoices[0]['company_name'] }}　{{ $invoices[0]['staff_name'] }}</a>様宛</h4>
    <h4><a class="font-weight-bold">{{ $invoices[0]['year'] }}年{{ $invoices[0]['month'] }}月</a>分 の請求詳細</h4>
</div>


<div class="text-center mb-3">
    <h4>請求の総計</h4>
</div>

<div class="row justify-content-center mb-2">
    <div class="col-sm-2 text-right font-weight-bold">総計：</div>
    <div class="col-sm-3"><a class="font-weight-bold">{{ number_format($grand_total) }}円</a></div>
</div>
<div class="row justify-content-center mb-3">
    <div class="col-sm-2 text-right font-weight-bold">税額（税率{{ $tax_rate }}）：</div>
    <div class="col-sm-3">{{ number_format($tax) }}円</div>
</div>
<div class="row justify-content-center mb-4">
    <div class="col-sm-3 my-1">
        {!! link_to_route('invoices.generatepdf', '請求書（PDF）発行', ['id' => $invoices[0]['link_id'], 'year' => $invoices[0]['year'], 'month' => $invoices[0]['month'], 'company_id' => $invoices[0]['company_id'], 'staff_id' => $invoices[0]['staff_id']], ['class' => 'btn btn-block btn-warning']) !!}
    </div>
    <div class="col-sm-3 my-1">
        {!! link_to_route('invoices.bsupdate', '請求ステータスを対応済へ更新', ['id' => $invoices[0]['link_id'], 'year' => $invoices[0]['year'], 'month' => $invoices[0]['month'], 'company_id' => $invoices[0]['company_id'], 'staff_id' => $invoices[0]['staff_id']], ['class' => 'btn btn-block btn-primary']) !!}
    </div>
</div>


<div class="text-center mb-3">
    <h4>請求項目の一覧</h4>
</div>

<div class="mb-3">
    <div class="row justify-content-center">
        <div class="col-sm-9 p-2 rounded" style="background-color:white;">
            
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>種類</th>
                        <th>案件名</th>
                        <th>納品ステータス</th>
                        <th>納期</th>
                        <th>金額</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="text-center">
                            <td>{{ $task->type->name }}</td>
                            <td class="text-left">{!! link_to_route('tasks.edit', $task->name, ['id' => $task->id], ['style' => 'color:black;']) !!}</td>
                            <td>{{ $task->status->name }}</td>
                            <td>{{ $task->period }}</td>
                            <td>{{ number_format($task->price) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection