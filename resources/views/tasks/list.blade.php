<div class="text-center mt-4 mb-3">
    <h4>タスク</h4>
</div>

<div class="mb-3">
    <div class="row justify-content-center">
        <div class="col-sm-9 p-2 rounded" style="background-color:white;">
            
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>種類</th>
                        <th>案件名</th>
                        <th>ステータス</th>
                        <th>納期</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($tasks) > 0)
                        @foreach ($tasks as $task)
                            <tr class="text-center">
                                <td>{{ $task->type->name }}</td>
                                <td class="text-left"><a href="#" style="color:black;">{{ $task->name }}</a></td>
                                <td>{{ $task->status->name }}</td>
                                <td>{{ $task->period }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="4" class="pt-4"><h3>条件に該当するデータなし</h3></td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
