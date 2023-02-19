@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Subscriptions</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Subscriptions</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>No#</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscriptions as $key=>$row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection