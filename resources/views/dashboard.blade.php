@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="welcome-panel">
        <p class="eyebrow">WORKSHOP 1</p>
        <h1>Training Institute<br><span>Management</span></h1>
        <p class="welcome-copy">A simple place to maintain student records and manage the course catalog.</p>
        <div class="welcome-actions"><a class="button button-primary" href="{{ route('students.index') }}">Manage students <span aria-hidden="true">→</span></a><a class="button button-secondary" href="{{ route('courses.index') }}">Browse courses</a></div>
    </section>
    <div class="dashboard-grid">
        <a class="dashboard-card" href="{{ route('students.index') }}"><span class="dashboard-icon" aria-hidden="true">01</span><span><strong>Students</strong><small>Create profiles, update contact details, and view saved records.</small></span><span class="card-arrow" aria-hidden="true">↗</span></a>
        <a class="dashboard-card" href="{{ route('courses.index') }}"><span class="dashboard-icon" aria-hidden="true">02</span><span><strong>Courses</strong><small>Maintain course descriptions, duration, fees, and availability.</small></span><span class="card-arrow" aria-hidden="true">↗</span></a>
    </div>
    <p class="dashboard-note">Students and courses are independent in this workshop. Their enrollment relationship is introduced later.</p>
@endsection
