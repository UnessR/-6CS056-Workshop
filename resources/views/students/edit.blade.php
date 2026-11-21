<x-layouts.app title="Edit student">
    <a class="back-link" href="{{ route('students.show', $student) }}">← Student details</a>
    <div class="form-heading"><p class="eyebrow">STUDENT #{{ $student->id }}</p><h1>Edit student</h1><p class="muted">Update this student's information.</p></div>
    <form class="card form-card" method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')
        <x-students.form :student="$student" />
        <div class="form-actions"><a class="button button-secondary" href="{{ route('students.show', $student) }}">Cancel</a><button class="button button-primary" type="submit">Save changes</button></div>
    </form>
</x-layouts.app>