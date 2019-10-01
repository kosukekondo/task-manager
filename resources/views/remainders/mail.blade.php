<h4>{{ $title }}</h4>

<table style="border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border:solid 1px; padding:5px;">種類</th>
            <th style="border:solid 1px; padding:5px;">案件名</th>
            <th style="border:solid 1px; padding:5px;">ステータス</th>
            <th style="border:solid 1px; padding:5px;">納期</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td style="border:solid 1px; padding:5px;">{{ $task->type->name }}</td>
                <td style="border:solid 1px; padding:5px;">{{ $task->name }}</td>
                <td style="border:solid 1px; padding:5px;">{{ $task->status->name }}</td>
                <td style="border:solid 1px; padding:5px;">{{ $task->period }}</td>
            </tr>
        @endforeach
    </tbody>
</table>