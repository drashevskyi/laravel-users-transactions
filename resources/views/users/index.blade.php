@extends('layouts.app')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success mt-2">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="container mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Citizenship</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->active }}</td>
                    <td>
                        @if (!is_null($user->user_id))
                        <a href="{{ route('user.edit', $user->userId) }}" class="btn btn-info" role="button">Edit</a>
                        @else
                        <a href="{{ route('user.destroy', $user->userId) }}" class="btn btn-danger" role="button">Delete</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection