@extends('layouts.admin')

@section('content')
<h1 class="mt-4">Obituaries</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Obituaries</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
            <tr>
                <th>Name</th>
                <th>DOB</th>
                <th>DOD</th>
                <th>Wake Period</th>
                <th>Funeral date</th>
                <th>Donation</th>
                <th>Paid</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($obituaries as $row)
                <tr>
                    <td>{{$row->deceased_first_name}} {{$row->deceased_last_name}}</td>
                    <td>{{\Carbon\Carbon::parse($row->date_of_birth)->format('Y-m-d')}}</td>
                    <td>{{\Carbon\Carbon::parse($row->date_of_death)->format('Y-m-d H:i')}}</td>
                    <td>{{$row->wake_period}}</td>
                    <td>{{\Carbon\Carbon::parse($row->funeral_date)->format('Y-m-d H:i')}}</td>
                    <td>{{number_format($row->total_donation,2)}}$</td>
                    <td>{{number_format($row->total_paid,2)}}$</td>
                    <td>{{$row->status == 0 ? 'Pending':(    $row->status == 1 ? 'Approved': 'Deactivated'  )}}</td>
                    <td>
                        <a class="btn btn-sm btn-dark" href="{{route('admin.obituary.show',['id' => $row->id ])}}">View</a>
                        @if($row->total_donation > $row->total_paid)
                            <a class="btn btn-sm btn-dark" href="{{route('admin.obituary.pay',['id' => $row->id ])}}">Release ({{round($row->total_donation-$row->total_paid,2)}}$)</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection