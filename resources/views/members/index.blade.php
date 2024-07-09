@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="/css/member_index.css">
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
@endsection

@section('content')
    <div class="container">
         @if(Auth::user()->role == 'super-admin' || Auth::user()->role == 'admin')
            <div class="add-new" style="display:flex; justify-content: flex-end;">
                <a class = "btn btn-primary" href="{{route('members_create')}}">Add Member</a>
            </div>
        @endif
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
                    @if(Auth::user()->role == 'super-admin' || Auth::user()->role == 'admin')
                        <th>Actions</th>
                    @endif
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
                        @if(Auth::user()->role == 'super-admin' || Auth::user()->role == 'admin')
                            <td class="actions-content">
                                <a href="{{route('members_edit', ['id' => $member->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                @if(Auth::user()->role == 'super-admin')
                                    <form action="{{route('members_destroy', ['id' => $member->id])}}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="_method" value="DELETE" >
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </form>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(() => {
            $('#members-list-table').DataTable({});
        })
    </script>
@endsection