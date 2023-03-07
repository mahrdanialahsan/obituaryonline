@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>No#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Total Amount $</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>${{number_format($row->total_amount,2)}}</td>
                        <td><a href="{{route('admin.contributor',['id'=>$row->id])}}">Details</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection