@extends('layouts.app')

@section('content')
    <h1>Memberships</h1>
    <a href="{{ route('memberships.create') }}" class="btn btn-primary">Add Membership</a>
    <table class="table">
        <thead>
        <tr>
            <th>User</th>
            <th>Type</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($memberships as $membership)
            <tr>
                <td>{{ $membership->user->name }}</td>
                <td>{{ $membership->type }}</td>
                <td>{{ $membership->start_date }}</td>
                <td>{{ $membership->end_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
