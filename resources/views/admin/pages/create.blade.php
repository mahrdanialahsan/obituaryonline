@extends('layouts.admin')

@section('content')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <h1 class="mt-4">Pages</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Page</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form id="site-form" method="post" action="{{@$page->id >0 ? route('admin.page.update',['id'=>@$page->id]):route('admin.page.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input value="{{@$page->title}}" class="form-control" id="title" name="title" type="text" placeholder="Title" required />
                            <label for="title">Title</label>
                        </div>
                    </div>
                    @if(@$page->id>0)
                    <div class="col-md-6  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input  value="{{@$page->slug}}" disabled  class="form-control" id="slug" name="slug" type="text" placeholder="Slug"  />
                            <label for="slug">Slug</label>
                        </div>
                    </div>
                    @endif
                    @if(!in_array(@$page->type,['contact','about']))
                        <div class="col-md-6 mb-3">
                            <div class="form-floating1">
                                <label for="thumbnail_image">Thumbnail</label>
                                <input  value="{{@$page->thumbnail_image}}"  accept="image/*" class="form-control dropify" data-allowed-file-extensions='["png", "jpg","jpeg"]'  data-default-file="{{file_exists(storage_path('app/public/pages/'.@$page->thumbnail_image)) ?  url('storage/pages/'.@$page->thumbnail_image): asset('images/logo.png')}}"  id="thumbnail_image" name="thumbnail_image" type="file"  />

                            </div>
                        </div>
                    @endif
                    <div class="col-md-6 mb-3">
                        <div class="form-floating1">
                            <label for="cover_image"> Cover Image</label>
                            <input  value="{{@$page->cover_image}}"  accept="image/*" class="form-control dropify" data-default-file="{{file_exists(storage_path('app/public/pages/'.@$page->cover_image)) ?  url('storage/pages/'.@$page->cover_image): asset('images/12.jpg')}}"  id="cover_image" name="cover_image" type="file"  />
                        </div>
                    </div>
                    @if(!in_array(@$page->type,['contact','about']))
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" id="short_description" name="short_description"  required  placeholder="Type Here." > {{@$page->short_description}} </textarea>
                            <label for="short_description">Short Description</label>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" id="description" name="description"    placeholder="Type Here." > {{@$page->description}} </textarea>
                            <label for="description">Description</label>
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
            $('.dropify').dropify();
            CKEDITOR.replace('description', {
                // toolbar: toolbar,
            });
            CKEDITOR.on('instanceReady', function(){
                $.each( CKEDITOR.instances, function(instance) {
                    CKEDITOR.instances[instance].on("change", function(e) {
                        for ( instance in CKEDITOR.instances )
                            CKEDITOR.instances[instance].updateElement();
                    });
                });
            });
        });
    </script>
@endpush