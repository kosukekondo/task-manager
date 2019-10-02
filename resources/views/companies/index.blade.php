@extends('layouts.app')

@section('content')
    <div class="text-center mb-3">
        <h4>企業情報一覧</h4>
    </div>
    
    <div class="mb-3">
        <div class="row justify-content-center">
            <div class="col-sm-9 p-2 rounded" style="background-color:white;">
                
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>企業名</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($companies) > 0)
                            @foreach ($companies as $company)
                                <tr class="text-center">
                                    <td class="text-left">{!! link_to_route('companies.edit', $company->name, ['id' => $company->id], ['style' => 'color:black;']) !!}</td>
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