@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
@endsection

@section('content')
    <div class="container">
        <table  id="members-list-table" class="display nowrap" style = "width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Position</th>
                    <th>Male</th>
                    <th>Age</th>
                    <th>Salary</th>
                    <th>Joined Us</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{$member->id}}</td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->first_name}}</td>
                        <td>{{$member->last_name}}</td>
                        <td>{{$member->position}}</td>
                        <td>{{$member->gender}}</td>
                        <td>{{$member->age}}</td>
                        <td>{{$member->salary}}</td>
                        <td>{{$member->started_at}}</td>
                        <td>
                           <button class="btn btn-sm btn-primary">Edit</button>
                           <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        new DataTable('#members-list-table');
    </script>
@endsection