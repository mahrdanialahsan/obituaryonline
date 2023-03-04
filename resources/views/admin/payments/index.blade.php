@extends('layouts.admin')

@section('content')
<h1 class="mt-4">Payments</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Payments</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
            <tr>
                <th>Piad By</th>
                <th>Tran ID</th>
                <th>Amount</th>
                <th>receipt_url</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($payments as $row)
                <tr>
                    <td>{{$row->user_name}}</td>
                    <td>{{$row->transaction_id}}</td>
                    <td>{{number_format($row->amount,2)}}$</td>
                    <td><a target="_blank" href="{{$row->receipt_url}}">View</a></td>
                    <td>{{date('Y-m-d H:i:s', strtotime($row->created_at))}}</td>
                    <td><a href="{{route('admin.payments.show',['id'=>$row->id])}}">Details</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection