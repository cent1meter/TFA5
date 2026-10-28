@extends('layouts.app')

@section('content')

<section class="page-banner compact-banner">
    <div class="container">
        <p class="eyebrow">Access management</p>
        <h1>User Accounts</h1>
        <p>Staff members and their assigned roles in the SwiftPOS application.</p>
    </div>
</section>

<section class="section table-section">
    <div class="container">
        <div class="table-card">
            <div class="table-heading">
                <div>
                    <h2>Users</h2>
                    <p>{{ count($users) }} sample records</p>
                </div>
            </div>

            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Full name</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><strong>{{ $user['username'] }}</strong></td>
                                <td>{{ $user['full_name'] }}</td>
                                <td><span class="role-badge">{{ $user['role'] }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
