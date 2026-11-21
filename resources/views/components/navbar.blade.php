<header class="site-header">
    <a class="brand" href="{{ route('home') }}">
        <span class="brand-mark" aria-hidden="true">TI</span>
        <span>Training Institute<span class="brand-caption">Workshop 2 · MVC + DRY</span></span>
    </a>
    <nav class="main-nav" aria-label="Main navigation">
        <a href="{{ route('students.index') }}" @class(['active' => request()->routeIs('students.*')])>Students</a>
        <a href="{{ route('courses.index') }}" @class(['active' => request()->routeIs('courses.*')])>Courses</a>
    </nav>
</header>