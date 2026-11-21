<x-layouts.app title="{{ $student->name }}">
    <a class="back-link" href="{{ route('students.index') }}">← All students</a>
    <div class="page-heading detail-heading"><div><p class="eyebrow">STUDENT #{{ $student->id }}</p><h1>{{ $student->name }}</h1><p class="muted">Student profile and contact information.</p></div><a class="button button-primary" href="{{ route('students.edit', $student) }}">Edit student</a></div>
    <section class="card details-card"><h2>Profile</h2><dl class="details-grid">
        <div><dt>Email</dt><dd><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></dd></div>
        <div><dt>Phone</dt><dd><a href="tel:{{ $student->phone }}">{{ $student->phone }}</a></dd></div>
        <div><dt>Date of birth</dt><dd>{{ $student->date_of_birth?->format('F j, Y') ?? 'Not provided' }}</dd></div>
        <div><dt>Age</dt><dd>{{ $student->age ?? 'Not available' }}</dd></div>
        <div class="detail-full"><dt>Address</dt><dd>{{ $student->address ?: 'Not provided' }}</dd></div>
        <div><dt>Created</dt><dd>{{ $student->created_at?->format('M j, Y') }}</dd></div>
        <div><dt>Last updated</dt><dd>{{ $student->updated_at?->format('M j, Y') }}</dd></div>
    </dl></section>
</x-layouts.app>