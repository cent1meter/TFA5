@extends('layouts.app')

@section('content')

<section class="hero">
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">Simple sales management</p>
            <h1>Your store, organized in one place.</h1>
            <p class="hero-copy">
                SwiftPOS is a starter point-of-sale application for managing customer
                information and staff accounts through a clean, easy-to-use interface.
            </p>
            <div class="button-row">
                <a class="button button-primary" href="{{ route('customers') }}">View customers</a>
                <a class="button button-secondary" href="{{ route('users') }}">View users</a>
            </div>
        </div>

        <div class="hero-panel" aria-label="Application overview">
            <div class="metric">
                <span class="metric-value">4</span>
                <span class="metric-label">Connected pages</span>
            </div>
            <div class="metric">
                <span class="metric-value">10</span>
                <span class="metric-label">Sample records</span>
            </div>
            <div class="metric">
                <span class="metric-value">MVC</span>
                <span class="metric-label">Organized structure</span>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">POS foundations</p>
            <h2>Built around the essentials</h2>
        </div>

        <div class="card-grid">
            <article class="card">
                <span class="card-number">01</span>
                <h3>Customer records</h3>
                <p>See customer names, email addresses, and phone numbers in one organized table.</p>
            </article>
            <article class="card">
                <span class="card-number">02</span>
                <h3>User accounts</h3>
                <p>Review staff usernames, full names, and assigned roles for the POS application.</p>
            </article>
            <article class="card">
                <span class="card-number">03</span>
                <h3>Clear navigation</h3>
                <p>Move easily between all four pages using a consistent navigation menu.</p>
            </article>
        </div>
    </div>
</section>

@endsection
