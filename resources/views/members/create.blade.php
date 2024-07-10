@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/member_create.css">
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('members_store')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">First Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" >
                    </div>    
                </div>
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="last_name" >
                    </div>                    
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Avatar:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="avatar">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Position:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="position">
                    </div>
                </div>
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Salary:</label>
                    <div class="col-sm-10">
                            <input type="number" class="form-control" name="salary">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Gender:</label>
                    <div class="col-sm-10">
                        <select name="gender" id="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Age:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="age">
                    </div>                 
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Started At:</label>
                    <div class="col-sm-10">
                        <input  type="string" class="form-control" name="started_at" placeholder="Ex: 2024/01/30">
                    </div>                 
                </div>
                <div class="col">
                    <div class="col-sm-12 submit-btn-content">
                        <a href="{{route('members_index')}}" class="btn btn-sm btn-primary back-button">Back</a>
                        <input type="submit" class="btn btn-sm btn-success" value="Create">
                    </div>                 
                </div>
            </div>
        </form>
    </div>
@endsection