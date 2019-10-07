<div class="text-center mt-4 mb-3">
    <h4><a class="font-weight-bold">{{ $scope }}</a> の請求一覧</h4>
</div>

<div class="mb-3">
    <div class="row justify-content-center">
        <div class="col-sm-9 p-2 rounded" style="background-color:white;">
            
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>企業</th>
                        <th>担当者</th>
                        <th>案件状況</th>
                        <th>請求ステータス</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($invoices) > 0)
                        @foreach ($invoices as $invoice)
                            @if ($invoice['billing_finished_num'] == $invoice['task_num'])
                                <tr class="text-center" style="background-color:gray;">
                            @else
                                <tr class="text-center">
                            @endif
                                    <td>{{ $invoice['company_name'] }}</td>
                                    <td class="text-left">{{ $invoice['staff_name'] }}</td>
                                    
                                    @if ($invoice['finished_task_num'] == $invoice['task_num'])
                                        <td style="background-color:gray;">{{ $invoice['finished_task_num'] . " / " . $invoice['task_num'] }}</td>
                                    @else
                                        <td>{{ $invoice['finished_task_num'] . " / " . $invoice['task_num'] }}</td>
                                    @endif

                                    @if ($invoice['billing_finished_num'] == $invoice['task_num'])
                                        <td style="background-color:gray;">{{ $invoice['billing_finished_num'] . " / " . $invoice['task_num'] }}</td>
                                    @else
                                        <td>{{ $invoice['billing_finished_num'] . " / " . $invoice['task_num'] }}</td>
                                    @endif

                                    <td>{!! link_to_route('invoices.edit', '詳細を表示', ['id' => $invoice['link_id'], 'year' => $invoice['year'], 'month' => $invoice['month'], 'company_id' => $invoice['company_id'], 'staff_id' => $invoice['staff_id']], ['class' => 'btn btn-block btn-info']) !!}</td>
                                        
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