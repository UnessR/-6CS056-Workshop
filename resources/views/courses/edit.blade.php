@extends('layouts.app')

@section('title', 'Edit course')

@section('content')
    <a class="back-link" href="{{ route('courses.show', $course) }}">← Course details</a>
    <div class="form-heading"><p class="eyebrow">COURSE #{{ $course->id }}</p><h1>Edit course</h1><p class="muted">Update the catalog information for this course.</p></div>
    <form class="card form-card" method="POST" action="{{ route('courses.update', $course) }}">
        @csrf @method('PUT')
        @include('courses._form')
        <div class="form-actions"><a class="button button-secondary" href="{{ route('courses.show', $course) }}">Cancel</a><button class="button button-primary" type="submit">Save changes</button></div>
    </form>
@endsection
