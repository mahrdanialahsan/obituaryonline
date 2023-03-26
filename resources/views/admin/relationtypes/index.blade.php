@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Relation Types</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Relation Types</li>
    </ol>
    <div class="card-header">
        <div class="row">
            <div class="col-12 text-right" style="text-align: right">
                <a class="btn btn-sm btn-dark" href="{{route('admin.relationtype.create')}}">New Relation Type</a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>No#</th>
                    <th>design Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($relationtypes as $key=>$row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->title}}</td>
                        <td>
                            <a class="btn btn-sm btn-dark"  href="{{route('admin.relationtype.show',['id'=>$row->id])}}">Edit</a>
                       </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection