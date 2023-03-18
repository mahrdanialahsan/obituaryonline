@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Designs</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Designs</li>
    </ol>
    <div class="card-header">
        <div class="row">
            <div class="col-12 text-right" style="text-align: right">
                <a class="btn btn-sm btn-dark" href="{{route('admin.design.create')}}">New Design</a>
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
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($designs as $key=>$row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->title}}</td>
                        <td><img height="50" src="{{file_exists(storage_path('app/public/designs/'.$row->image)) ?  url('storage/designs/'.$row->image): asset('images/12.jpg')}}"></td>
                        <td>
                            <a class="btn btn-sm btn-dark"  href="{{route('admin.design.show',['id'=>$row->id])}}">Edit</a>
{{--                        <a class="btn btn-sm btn-danger" href="{{route('admin.design.delete',['id'=>$row->id])}}">Delete</a>--}}
                       </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection