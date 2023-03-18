@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Slider</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">{{empty($slider) ? 'New Slider':'Edit Slider' }}</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form id="site-form" method="post" action="{{ empty($slider) ? route('admin.settings.slider.store') : route('admin.settings.slider.update',[$slider->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input value="{{@$slider->small_title}}" class="form-control" id="small_title" name="small_title" type="text" placeholder="Small Title" required />
                            <label for="small_title">Small Title</label>
                        </div>
                    </div>
                    <div class="col-md-6  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input  value="{{@$slider->big_title}}"  class="form-control" id="big_title" name="big_title" type="text" placeholder="Big Title" required />
                            <label for="big_title">Big Title</label>
                        </div>
                    </div>
                    <div class="col-md-12  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <textarea  class="form-control" id="description" name="description" placeholder="Description" required >{{@$slider->description}}</textarea>
                            <label for="big_title">Description</label>
                        </div>
                    </div>

                    <div class="col-md-4  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input type="number"  min="0" value="{{@$slider->displayorder}}"  class="form-control" id="displayorder" name="displayorder" placeholder="Display Order" required />
                            <label for="big_title">Display Order</label>
                        </div>
                    </div>
                    <div class="col-md-4  mb-3">
                        <div class="mb-3 mb-md-0">
                            <label for="big_title">Show Donate Button </label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input {{ empty($slider->allow_donate_button) || @$slider->allow_donate_button == 1 ? 'checked':''}}  type="radio" class="form-check-input" name="allow_donate_button" value="1"> Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input {{ !empty($slider->allow_donate_button)  && @$slider->allow_donate_button == 0 ? 'checked':''}}  type="radio" class="form-check-input" name="allow_donate_button" value="0"> NO
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  mb-3">
                        <div class="mb-3 mb-md-0">
                            <label for="big_title">Status </label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input {{ empty($slider->status) || @$slider->status == 1 ? 'checked':''}} type="radio" class="form-check-input" name="status" value="1"> Active
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input  {{ !empty($slider->status)  && @$slider->status == 0 ? 'checked':''}} type="radio" class="form-check-input" name="status" value="0"> Disable
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-floating1">
                            <label for="image"> Image</label>
                            <input  value="{{@$slider->image}}"  class="form-control dropify" data-default-file="{{{file_exists(storage_path('app/public/slider/'.@$slider->image)) ?  asset('storage/slider/'.@$slider->image) : asset('images/banner-6.jpg')}}}"  id="image" name="image" type="file" accept="image/*" data-allowed-file-extensions='["png", "jpg","jpeg"]' />

                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0"> 
                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">{{empty($slider) ? 'Save':'Update' }}</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('.dropify').dropify({
                minWidth: 1900,
                minHeight: 900
            });
        });
    </script>
@endpush