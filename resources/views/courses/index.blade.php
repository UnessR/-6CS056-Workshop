<x-layouts.app title="Courses">
    <div class="page-heading">
        <div><p class="eyebrow">CATALOG</p><h1>Courses</h1><p class="muted">Manage the training institute's course catalog.</p></div>
        <a class="button button-primary" href="{{ route('courses.create') }}">Add course <span aria-hidden="true">＋</span></a>
    </div>

    <form class="toolbar" method="GET" action="{{ route('courses.index') }}" role="search">
        <label class="sr-only" for="course-search">Search courses</label>
        <input id="course-search" name="q" type="search" value="{{ $search }}" placeholder="Search course name or description">
        <label class="sr-only" for="difficulty-filter">Filter by difficulty</label>
        <select id="difficulty-filter" name="difficulty"><option value="">All levels</option>@foreach (['Easy', 'Medium', 'Hard'] as $level)<option value="{{ $level }}" @selected($difficulty === $level)>{{ $level }}</option>@endforeach</select>
        <button class="button button-secondary" type="submit">Filter</button>
        @if ($search !== '' || $difficulty !== '')<a class="clear-link" href="{{ route('courses.index') }}">Clear</a>@endif
    </form>

    <section class="card table-card" aria-label="Course list">
        <div class="table-scroll"><table>
            <thead><tr><th scope="col">Course</th><th scope="col">Duration</th><th scope="col">Fee</th><th scope="col">Level</th><th scope="col">Status</th><th scope="col">Actions</th></tr></thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td><a class="person-link" href="{{ route('courses.show', $course) }}">{{ $course->name }}</a><span class="cell-subtext">Course #{{ $course->id }}</span></td>
                        <td>{{ $course->duration }} {{ $course->duration === 1 ? 'week' : 'weeks' }}</td><td>{{ number_format((float) $course->fee, 2) }}</td>
                        <td><span class="level-pill level-{{ strtolower($course->difficulty) }}">{{ $course->difficulty }}</span></td><td><span class="status-pill {{ $course->is_active ? 'status-active' : 'status-inactive' }}">{{ $course->is_active ? 'Active' : 'Inactive' }}</span></td>
                        <td><div class="row-actions"><a href="{{ route('courses.show', $course) }}">View</a><a href="{{ route('courses.edit', $course) }}">Edit</a><x-delete-form :action="route('courses.destroy', $course)" /></div></td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty-state"><strong>No courses yet</strong><span>{{ $search !== '' || $difficulty !== '' ? 'Try changing the search or level filter.' : 'Add the first course to get started.' }}</span></td></tr>
                @endforelse
            </tbody>
        </table></div>
        @if ($courses->hasPages())<div class="pagination-wrap">{{ $courses->links() }}</div>@endif
    </section>
    <p class="list-count">{{ $courses->total() }} {{ $courses->total() === 1 ? 'course' : 'courses' }}</p>
</x-layouts.app>