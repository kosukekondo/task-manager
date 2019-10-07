@extends('layouts.app')

@section('content')
    <div class="text-center mb-3">
        <h4>担当者一覧</h4>
    </div>
    
    <div class="mb-3">
        <div class="row justify-content-center">
            <div class="col-sm-6 p-2 rounded" style="background-color:white;">
                
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>企業名</th>
                            <th>担当者名</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($staff) > 0)
                            @foreach ($staff as $s)
                                <tr class="text-center">
                                    <td class="text-left">{{ $s->company->name }}</td>
                                    <td class="text-left">{!! link_to_route('staff.edit', $s->name, ['id' => $s->id], ['style' => 'color:black;']) !!}</td>
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
@endsection