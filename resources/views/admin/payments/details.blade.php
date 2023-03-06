@extends('layouts.admin')

@section('content')
<h1 class="mt-4">Payments</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Payments Details</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
            <tr>
                <th>Obituary</th>
                <th>Tran ID</th>
                <th>Amount</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($payments as $row)
                <tr>
                    <td><a target="_blank" href="{{route('obituary.details',['id'=>$row->uid])}}" > {{$row->deceased_first_name}} {{$row->deceased_last_name}}</a></td>
                    <td>{{$payment->transaction_id}}</td>
                    <td>{{number_format($row->amount,2)}}$</td>
                    <td>{{date('Y-m-d H:i:s', strtotime($row->created_at))}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection