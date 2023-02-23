@extends('layouts.admin')

@section('content')
<h1 class="mt-4">Sliders</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Sliders</li>
</ol>
<a class="btn btn-sm btn-dark " style="float: right;margin-top: -50px;" href="{{route('admin.settings.slider.create')}}">Add New</a>
<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
            <tr>
                <th>Small Title</th>
                <th>Big Title</th>
                <th>Description</th>
                <th>Allow Donate Button</th>
                <th>Display order</th>
                <th>Status</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sliders as $row)
                <tr>
                    <td>{{$row->small_title}}</td>
                    <td>{{$row->big_title}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->allow_donate_button == 1 ? 'Yes':'No'}}</td>
                    <td>{{$row->displayorder}}</td>
                    <td>{{$row->status == 1 ? 'Active':'Disabled'}}</td>
                    <td><img height="80px"  src="{{url('storage/slider/'.$row->image)}}"></td>
                    <td>
                        <a class="btn btn-sm btn-dark" href="{{route('admin.settings.slider.edit',['id' => $row->id ])}}">Edit</a>
                        <a class="btn btn-sm btn-danger"  onclick="return confirm('Are you sure to delete ?')" href="{{route('admin.settings.slider.delete',['id' => $row->id ])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection