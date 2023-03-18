@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Pages</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pages</li>
    </ol>
    <div class="card-header">
        <div class="row">
            <div class="col-12 text-right" style="text-align: right">
                <a class="btn btn-sm btn-dark" href="{{route('admin.page.create')}}">New Page</a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>No#</th>
                    <th>Page Title</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $key=>$row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->slug}}</td>
                        <td>{{ucfirst($row->type)}}</td>
                        <td><img height="50" src="{{file_exists(storage_path('app/public/pages/'.$row->thumbnail_image)) ?  url('storage/pages/'.$row->thumbnail_image): asset('images/12.jpg')}}"></td>
                        <td>
                            <a class="btn btn-sm btn-dark"  href="{{route('admin.page.show',['id'=>$row->id])}}">Edit</a>
                            @if($row->type == 'blog')
                                <a class="btn btn-sm btn-danger" href="{{route('admin.page.delete',['id'=>$row->id])}}">Delete</a>
                            @endif
                       </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection