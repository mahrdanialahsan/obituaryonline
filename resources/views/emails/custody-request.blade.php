<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width">
    <title>{{env('APP_NAME')}}</title>
    <style></style>
</head>

<body>
<div id="email" style="width:600px;">

    <!-- Header -->
    <table role="presentation" border="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <h1>Hi, </h1>
                <p>Hope you are doing well and safe.</p>
                <br>
                <p>Please click <a href="{{route('home')}}">here</a>  to accept the custody request</p>
            </td>
        </tr>
    </table>

    <!-- Body -->
    <table role="presentation" border="0" cellspacing="0" width="100%">
        <tr>
            <th>Child Name</th>
            <td>{{$custody->child->fullname}}</td>
        </tr>
        <tr>
            <th>Your Relation</th>
            <td>{{$custody->relationtype->title}}</td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td>{{$custody->child->date_of_birth}}</td>
        </tr>
        <tr>
            <th>Geneder</th>
            <td>{{ucfirst($custody->child->gender)}}</td>
        </tr>
        <tr>
            <th>Requested By</th>
            <td>{{$custody->child->user->fullname}}</td>
        </tr>

    </table>

    <!-- Footer -->
    <table role="presentation" border="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <br>
                <h3> <a href="{{route('home')}}">{{env('APP_NAME')}}</a></h3>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
