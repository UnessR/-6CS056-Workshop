<x-layouts.app title="Students">
    <div class="page-heading">
        <div><p class="eyebrow">RECORDS</p><h1>Students</h1><p class="muted">Manage student contact and profile information.</p></div>
        <a class="button button-primary" href="{{ route('students.create') }}">Add student <span aria-hidden="true">＋</span></a>
    </div>

    <form class="toolbar" method="GET" action="{{ route('students.index') }}" role="search">
        <label class="sr-only" for="student-search">Search students</label>
        <input id="student-search" name="q" type="search" value="{{ $search }}" placeholder="Search name, email or phone">
        <button class="button button-secondary" type="submit">Search</button>
        @if ($search !== '')<a class="clear-link" href="{{ route('students.index') }}">Clear</a>@endif
    </form>

    <section class="card table-card" aria-label="Student list">
        <div class="table-scroll"><table>
            <thead><tr><th scope="col">Student</th><th scope="col">Email</th><th scope="col">Phone</th><th scope="col">Actions</th></tr></thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td><a class="person-link" href="{{ route('students.show', $student) }}">{{ $student->name }}</a><span class="cell-subtext">Student #{{ $student->id }}</span></td>
                        <td>{{ $student->email }}</td><td>{{ $student->phone }}</td>
                        <td><div class="row-actions"><a href="{{ route('students.show', $student) }}">View</a><a href="{{ route('students.edit', $student) }}">Edit</a><x-delete-form :action="route('students.destroy', $student)" /></div></td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="empty-state"><strong>No students yet</strong><span>{{ $search !== '' ? 'Try another search.' : 'Add the first student to get started.' }}</span></td></tr>
                @endforelse
            </tbody>
        </table></div>
        @if ($students->hasPages())<div class="pagination-wrap">{{ $students->links() }}</div>@endif
    </section>
    <p class="list-count">{{ $students->total() }} {{ $students->total() === 1 ? 'student' : 'students' }}</p>
</x-layouts.app>