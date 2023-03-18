@extends('layouts.admin')

@section('content')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <h1 class="mt-4">Designs</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Designs</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form id="site-form" method="post" action="{{@$design->id >0 ? route('admin.design.update',['id'=>@$design->id]):route('admin.design.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input value="{{@$design->title}}" class="form-control" id="title" name="title" type="text" placeholder="Title" required />
                            <label for="title">Title</label>
                        </div>
                    </div>
{{--                    <div class="col-md-12 mb-3">--}}
{{--                        <div class="form-floating">--}}
{{--                            <textarea class="form-control" id="description" name="description"    placeholder="Type Here." > {{@$design->description}} </textarea>--}}
{{--                            <label for="description">Description</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-12 mb-3">
                        <div class="form-floating1">
                            <label for="image">Thumbnail</label>
                            <input  value="{{@$design->image}}"   class="form-control "  accept="image/*" data-allowed-file-extensions='["png", "jpg","jpeg"]'  data-default-file="{{file_exists(storage_path('app/public/designs/'.@$design->image)) ?  url('storage/designs/'.@$design->image): asset('images/logo.png')}}"  id="image" name="image" type="file" accept="image/*" data-allowed-file-extensions='["png", "jpg","jpeg"]' />

                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Update</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('#image').dropify({
                minWidth: 320,
                minHeight: 400
            });

        });
    </script>
@endpush