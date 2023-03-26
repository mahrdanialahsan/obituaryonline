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
                @if($obituary->total_donation > $obituary->total_paid)
                    <a class="btn btn-sm btn-dark" href="{{route('admin.obituary.pay',['id' => $obituary->id ])}}">Release ({{round($obituary->total_donation-$obituary->total_paid,2)}}$)</a>
                @endif
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="vertical-align: middle">Deceased Name</th>
                    <td>{{$obituary->deceased_first_name}} {{$obituary->deceased_last_name}}</td>
                    <th style="vertical-align: middle">Date of Birth</th>
                    <td>{{\Carbon\Carbon::parse($obituary->date_of_birth)->format('Y-m-d')}}</td>
                </tr>
                <tr>
                    <th style="vertical-align: middle">Date of Death</th>
                    <td>{{\Carbon\Carbon::parse($obituary->date_of_death)->format('Y-m-d H:i')}}</td>
                    <th style="vertical-align: middle">Wake Location</th>
                    <td>{{$obituary->wake_location}}</td>
                </tr>
                <tr>
                    <th style="vertical-align: middle">Wake Period </th>
                    <td>{{$obituary->wake_period}}</td>
                    <th style="vertical-align: middle">Funeral Date</th>
                    <td>{{\Carbon\Carbon::parse($obituary->funeral_date)->format('Y-m-d H:i')}}</td>
                </tr>
                <tr>
                    <th style="vertical-align: middle">Funeral Location</th>
                    <td>{{$obituary->funeral_location}}</td>
                    <th style="vertical-align: middle">Default Amount</th>
                    <td>{{$obituary->default_amount}}$</td>
                </tr>
                <tr>
                    <th style="vertical-align: middle">Total Donation</th>
                    <td>{{$obituary->total_donation}}$</td>
                    <th style="vertical-align: middle">Total Paid</th>
                    <td>{{$obituary->total_paid}}$</td>
                </tr>

                <tr>
                    <th style="vertical-align: middle">Status</th>
                    <td>{{$obituary->status == 0 ? 'Pending':(    $obituary->status == 1 ? 'Approved': 'Deactivated'  )}}</td>
                    <th style="vertical-align: middle">Deceased Picture</th>
                    <td>
                        @if(!is_null($obituary->deceased_picture) && $obituary->deceased_picture != '')
                            <img style="max-width: 100px;" src="{{url('storage/deceased_picture/'.$obituary->deceased_picture)}}">
                        @else
                            NA
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="vertical-align: middle">Death Certificate</th>
                    <td>
                        @if(!is_null($obituary->death_certificate) && $obituary->death_certificate != '')
                            <a download href="{{url('storage/death_certificate/'.$obituary->death_certificate)}}"> Download </a>
                        @else
                            NA
                        @endif
                    </td>
                    <th style="vertical-align: middle">Wills</th>
                    <td>
                        @if(!is_null($obituary->poa_wills) && $obituary->poa_wills != '')
                            <a download href="{{url('storage/poa_wills/'.$obituary->poa_wills)}}"> Download </a>
                        @else
                            NA
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="vertical-align: middle">Bank Account Details</th>
                    <td colspan="3">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th style="vertical-align: middle">Bank Name</th>
                                <th style="vertical-align: middle">Account Title</th>
                                <th style="vertical-align: middle">Account Number</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$obituary->bank_name}}</td>
                                    <td>{{$obituary->account_title}}</td>
                                    <td>{{$obituary->account_number}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                @php
                    $surviving_family =    json_decode($obituary->surviving_family);
                @endphp
                @if(is_array($surviving_family) || is_object($surviving_family))
                    <tr>
                        <th style="vertical-align: middle">Surviving Family</th>
                        <td colspan="3">
                            <table class="table table-bordered ">
                                <thead>
                                <tr>
                                    <th style="vertical-align: middle">Relation</th>
                                    <th style="vertical-align: middle">Name</th>
                                    <th style="vertical-align: middle">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($surviving_family as $row)
                                    <tr>
                                        <td>{{getRelationType($row->surviving_family_relation_title)}}</td>
                                        <td>{{$row->surviving_family_relation_name}}</td>
                                        <td>
                                            @if(trim($row->surviving_family_relation_description) != '')
                                                <p style="text-align: justify"><small>{{$row->surviving_family_relation_description}}</small></p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif

                <tr>
                    <th style="vertical-align: middle">About Obituary</th>
                    <td colspan="3">{!! $obituary->message !!}</td>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-12"><h4>Donations Details</h4></div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <caption> </caption>
                <thead>
                <tr>
                    <th style="vertical-align: middle">Paid By</th>
                    <th style="vertical-align: middle">Amount</th>
                    <th style="vertical-align: middle">Created At</th>
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


    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-12"><h4>Released Payment Details</h4></div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple1">
                <thead>
                <tr>
                    <th style="vertical-align: middle">Amount</th>
                    <th style="vertical-align: middle">Released At</th>
                    <th style="vertical-align: middle">Recipt</th>
                </tr>
                </thead>
                <tbody>
                @foreach($releasedpayments as $row)
                    <tr>
                        <td>{{number_format($row->amount,2)}}$</td>
                        <td>{{date('Y-m-d H:i:s', strtotime($row->created_at))}}</td>
                        <td>
                            @if(!is_null($row->payment_recipt) && $row->payment_recipt != '')
                                <a download href="{{url('storage/payment_recipt/'.$row->payment_recipt)}}"> Download </a>
                            @else
                                NA
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection