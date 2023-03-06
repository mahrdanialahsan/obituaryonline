@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Obituaries</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Obituaries</li>
    </ol>
    <div class="card-header">
        <div class="row">
            <div class="col-6"><h4>Obituary Details</h4></div>
            <div class="col-6 text-right" style="text-align: right">
                @if($obituary->status == 0 )
                <a class="btn btn-sm btn-primary" href="{{route('admin.obituary.approve',['id'=>$obituary->uid])}}">Accept</a>
                <a class="btn btn-sm btn-danger" href="{{route('admin.obituary.reject',['id'=>$obituary->uid])}}">Reject</a>
                @endif
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Deceased Name</th>
                    <td>{{$obituary->deceased_first_name}} {{$obituary->deceased_last_name}}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{\Carbon\Carbon::parse($obituary->date_of_birth)->format('Y-m-d')}}</td>
                </tr>
                <tr>
                    <th>Date of Death</th>
                    <td>{{\Carbon\Carbon::parse($obituary->date_of_death)->format('Y-m-d H:i')}}</td>
                </tr>
                <tr>
                    <th>Wake Location</th>
                    <td>{{$obituary->wake_location}}</td>
                </tr>
                <tr>
                    <th>Wake Period </th>
                    <td>{{$obituary->wake_period}}</td>
                </tr>
                <tr>
                    <th>Funeral Date</th>
                    <td>{{\Carbon\Carbon::parse($obituary->funeral_date)->format('Y-m-d H:i')}}</td>
                </tr>
                <tr>
                    <th>Funeral Location</th>
                    <td>{{$obituary->funeral_location}}</td>
                </tr>
                <tr>
                    <th>Default Amount</th>
                    <td>{{$obituary->default_amount}}</td>
                </tr>
                <tr>
                    <th>Surviving Family</th>
                    <td>{{$obituary->surviving_family}}</td>
                </tr>
                <tr>
                    <th>Total Donation</th>
                    <td>{{$obituary->total_donation}}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{!! $obituary->message !!}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$obituary->status == 0 ? 'Pending':(    $obituary->status == 1 ? 'Approved': 'Deactivated'  )}}</td>
                </tr>
                <tr>
                    <th>Death Certificate</th>
                    <td>
                        @if(!is_null($obituary->death_certificate) && $obituary->death_certificate != '')
                            <a download href="{{url('storage/death_certificate/'.$obituary->death_certificate)}}"> Download </a>
                        @else
                            NA
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="vertical-align: top">Deceased Picture</th>
                    <td>
                        @if(!is_null($obituary->deceased_picture) && $obituary->deceased_picture != '')
                            <img src="{{url('storage/deceased_picture/'.$obituary->deceased_picture)}}">
                        @else
                            NA
                        @endif
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>Piad By</th>
                    <th>Amount</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $row)
                    <tr>
                        <td>{{$row->user_name}}</td>
                        <td>{{number_format($row->amount,2)}}$</td>
                        <td>{{date('Y-m-d H:i:s', strtotime($row->created_at))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection