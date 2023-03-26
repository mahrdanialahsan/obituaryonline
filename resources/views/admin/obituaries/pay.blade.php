@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Obituaries</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Obituaries</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-12"><h4>Release Payment <small style="float: right">Pending payment amount is {{round($obituary->total_donation - $obituary->total_paid,2)}}$</small></h4></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="vertical-align: middle">Name</th>
                    <td>{{$obituary->deceased_first_name}} {{$obituary->deceased_last_name}}</td>
                    <th style="vertical-align: middle">Total Donation</th>
                    <td>{{$obituary->total_donation}}$</td>
                    <th style="vertical-align: middle">Total Paid</th>
                    <td>{{$obituary->total_paid}}$</td>
                </tr>
                <tr>
                    <th style="vertical-align: middle">Bank Name</th>
                    <td>{{$obituary->bank_name}}</td>
                    <th style="vertical-align: middle">Account Title</th>
                    <td>{{$obituary->account_title}}</td>
                    <th style="vertical-align: middle">Account Number</th>
                    <td>{{$obituary->account_number}}</td>
                </tr>
                </thead>
            </table>
            <form id="site-form" method="post" action="{{route('admin.obituary.paid',['id'=>$obituary->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12  mb-3">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" value="{{Session::has('amount') ? Session::get('amount') : round($obituary->total_donation - $obituary->total_paid,2) }}" id="amount" name="amount" type="text" placeholder="Released Amount" required />
                            <label for="amount">Released Amount ($)</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating1">
                            <label for="site_logo"> Payment Invoice Screenshot</label>
                            <input   class="form-control dropify"  id="payment_recipt" name="payment_recipt" type="file" accept="image/*" data-allowed-file-extensions='["png", "jpg","jpeg"]' />

                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Save</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endpush