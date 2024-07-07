@extends('layouts.app')

@section('head')
    <style>
        .form-row {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .col {
            max-width: 48%;
            margin-right: 10px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        .submit-btn-content{
            display:flex;
            justify-content: flex-end;
        }
        .back-button{
            margin-right: 10px;
        }
    </style>
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
        <form method="POST" action="{{route('members_update', ['id' => $member->id])}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="PUT" >
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">First Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" value="{{$member->first_name}}" >
                    </div>    
                </div>
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="last_name" value="{{$member->last_name}}">
                    </div>                    
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{$member->email}}">
                    </div>
                </div>
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Avatar:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="avatar" value="{{$member->avatar}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Position:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="position" value="{{$member->position}}">
                    </div>
                </div>
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Salary:</label>
                    <div class="col-sm-10">
                            <input type="number" class="form-control" name="salary" value="{{$member->salary}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Gender:</label>
                    <div class="col-sm-10">
                        <select name="gender" id="gender" class="form-control">
                            <option value="male" {{$member->gender == 'male' ? 'selected' : ''}}>Male</option>
                            <option value="female"  {{$member->gender == 'female' ? 'selected' : ''}}>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Age:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="age" value="{{$member->age}}">
                    </div>                 
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="" class="col-sm-2 col-form-label">Started At:</label>
                    <div class="col-sm-10">
                        <input  type="string" class="form-control" name="started_at" placeholder="Ex: 2024/01/30" value="{{$member->started_at}}">
                    </div>                 
                </div>
                <div class="col">
                    <div class="col-sm-12 submit-btn-content">
                        <a href="{{route('members_index')}}" class="btn btn-sm btn-primary back-button">Back</a>
                        <input type="submit" class="btn btn-sm btn-success" value="Save">
                    </div>                 
                </div>
            </div>
        </form>
    </div>
@endsection