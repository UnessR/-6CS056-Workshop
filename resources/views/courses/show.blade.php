<x-layouts.app title="{{ $course->name }}">
    <a class="back-link" href="{{ route('courses.index') }}">← All courses</a>
    <div class="page-heading detail-heading"><div><p class="eyebrow">COURSE #{{ $course->id }}</p><h1>{{ $course->name }}</h1><p class="muted">Course catalog details and availability.</p></div><a class="button button-primary" href="{{ route('courses.edit', $course) }}">Edit course</a></div>
    <section class="card details-card"><h2>Course details</h2><dl class="details-grid">
        <div><dt>Duration</dt><dd>{{ $course->duration }} {{ $course->duration === 1 ? 'week' : 'weeks' }}</dd></div>
        <div><dt>Fee</dt><dd>{{ number_format((float) $course->fee, 2) }}</dd></div>
        <div><dt>Difficulty</dt><dd><span class="level-pill level-{{ strtolower($course->difficulty) }}">{{ $course->difficulty }}</span></dd></div>
        <div><dt>Status</dt><dd><span class="status-pill {{ $course->is_active ? 'status-active' : 'status-inactive' }}">{{ $course->is_active ? 'Active' : 'Inactive' }}</span></dd></div>
        <div class="detail-full"><dt>Description</dt><dd class="description-text">{{ $course->description ?: 'No description provided.' }}</dd></div>
        <div><dt>Created</dt><dd>{{ $course->created_at?->format('M j, Y') }}</dd></div>
        <div><dt>Last updated</dt><dd>{{ $course->updated_at?->format('M j, Y') }}</dd></div>
    </dl></section>
</x-layouts.app>