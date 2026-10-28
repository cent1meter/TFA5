@extends('layouts.app')

@section('content')

<section class="page-banner compact-banner">
    <div class="container">
        <p class="eyebrow">Records</p>
        <h1>Customer Accounts</h1>
        <p>Contact information for the customers currently listed in SwiftPOS.</p>
    </div>
</section>

<section class="section table-section">
    <div class="container">
        <div class="table-card">
            <div class="table-heading">
                <div>
                    <h2>Customers</h2>
                    <p>{{ count($customers) }} sample records</p>
                </div>
            </div>

            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Full name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td><strong>{{ $customer['full_name'] }}</strong></td>
                                <td>{{ $customer['email'] }}</td>
                                <td>{{ $customer['phone'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
