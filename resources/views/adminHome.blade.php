@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Manage Pending Registrations') }}</div>

                    <div class="card-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                        <table class="table table-bordered text-center">
                            @if (count($users)<=0)
                            <h2 class="text-center">There is no pending registration right now</h2>
                        @else
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>


                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->status==1)
                                <span class="btn btn-success btn-sm">Active</span>
                                @else
                                <span class="btn btn-danger btn-sm">Inactive</span>
                                @endif

                            </td>
                            <td>
                                <a href="{{route('updateStatus',$user->id)}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to Approve?');">Approve</a> -
                                <a href="{{route('deleteUser',$user->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach



                        </tbody>
                        @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
