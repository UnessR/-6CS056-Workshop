<x-layouts.app title="Add student">
    <a class="back-link" href="{{ route('students.index') }}">← All students</a>
    <div class="form-heading"><p class="eyebrow">NEW RECORD</p><h1>Add a student</h1><p class="muted">Enter the student's details. Required fields are marked.</p></div>
    <form class="card form-card" method="POST" action="{{ route('students.store') }}">
        @csrf
        <x-students.form :student="$student" />
        <div class="form-actions"><a class="button button-secondary" href="{{ route('students.index') }}">Cancel</a><button class="button button-primary" type="submit">Create student</button></div>
    </form>
</x-layouts.app>