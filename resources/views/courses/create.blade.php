<x-layouts.app title="Add course">
    <a class="back-link" href="{{ route('courses.index') }}">← All courses</a>
    <div class="form-heading"><p class="eyebrow">NEW RECORD</p><h1>Add a course</h1><p class="muted">Enter course details for the catalog.</p></div>
    <form class="card form-card" method="POST" action="{{ route('courses.store') }}">
        @csrf
        @include('courses._form')
        <div class="form-actions"><a class="button button-secondary" href="{{ route('courses.index') }}">Cancel</a><button class="button button-primary" type="submit">Create course</button></div>
    </form>
</x-layouts.app>