@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Campaigns</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Campaigns</li>
    </ol>
    <div class="card-header">
        <div class="row">
            <div class="col-6"><h4>Campaign Details</h4></div>
            <div class="col-6 text-right" style="text-align: right">
                @if($campaign->status == 0 )
                <a class="btn btn-sm btn-primary" href="{{route('admin.campaign.approve',['id'=>$campaign->uid])}}">Accept</a>
                <a class="btn btn-sm btn-danger" href="{{route('admin.campaign.reject',['id'=>$campaign->uid])}}">Reject</a>
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
                    <td>{{$campaign->deceased_name}}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{\Carbon\Carbon::parse($campaign->date_of_birth)->format('Y-m-d')}}</td>
                </tr>
                <tr>
                    <th>Date of Death</th>
                    <td>{{\Carbon\Carbon::parse($campaign->date_of_death)->format('Y-m-d H:i')}}</td>
                </tr>
                <tr>
                    <th>Wake Location</th>
                    <td>{{$campaign->wake_location}}</td>
                </tr>
                <tr>
                    <th>Wake Period </th>
                    <td>{{$campaign->wake_period}}</td>
                </tr>
                <tr>
                    <th>Funeral Date</th>
                    <td>{{\Carbon\Carbon::parse($campaign->funeral_date)->format('Y-m-d H:i')}}</td>
                </tr>
                <tr>
                    <th>Funeral Location</th>
                    <td>{{$campaign->funeral_location}}</td>
                </tr>
                <tr>
                    <th>Surviving Family</th>
                    <td>{{$campaign->surviving_family}}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{{$campaign->message}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$campaign->status == 0 ? 'Pending':(    $campaign->status == 1 ? 'Approved': 'Deactivated'  )}}</td>
                </tr>
                <tr>
                    <th>Death Certificate</th>
                    <td>
                        @if(!is_null($campaign->death_certificate) && $campaign->death_certificate != '')
                            <a download href="{{url('storage/death_certificate/'.$campaign->death_certificate)}}"> Download </a>
                        @else
                            NA
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="vertical-align: top">Deceased Picture</th>
                    <td>
                        @if(!is_null($campaign->deceased_picture) && $campaign->deceased_picture != '')
                            <img src="{{url('storage/deceased_picture/'.$campaign->deceased_picture)}}">
                        @else
                            NA
                        @endif
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection