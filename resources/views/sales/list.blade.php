<div class="text-center mt-4 mb-3">
    <h4><a class="font-weight-bold">{{ $scope }}</a>の売上</h4>
</div>

<div class="">
    <div class="row justify-content-center">
        <div class="col-sm-4 p-2 rounded" style="background-color:white;">
            <table class="table">
                <tr>
                    <th>総計</th>
                    <td class="text-right">{{ number_format($grand_total) . " 円" }}</td>
                </tr>
                <tr>
                    <th>売上合計</th>
                    <td class="text-right">{{ number_format($total) . " 円"  }}</a></td>
                </tr>
                <tr>
                    <th>{{ "税額（税率" . $tax_rate . "）" }}</th>
                    <td class="text-right"><a style="color:red;">{{ "-" . number_format($tax) . " 円"  }}</a></td>
                </tr>
            </table>

        </div>
    </div>
</div>


<div class="text-center mt-4 mb-3">
    <h4>売上一覧</h4>
</div>

<div class="mb-3">
    <div class="row justify-content-center">
        <div class="col-sm-9 p-2 rounded" style="background-color:white;">
            
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>企業名</th>
                        <th>案件名</th>
                        <th>金額</th>
                        <th>納期</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($tasks) > 0)
                        @foreach ($tasks as $task)
                            <tr class="text-center">
                                <td>{{ $task->company->name }}</td>
                                <td class="text-left">{!! link_to_route('tasks.edit', $task->name, ['id' => $task->id], ['style' => 'color:black;']) !!}</td>
                                <td>{{ number_format($task->price) }}</td>
                                <td>{{ $task->period }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="4" class="pt-4"><h4>条件に該当するデータは存在しません。</h4></td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>