<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Training Institute') · Training Institute</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="{{ route('students.index') }}"><span class="brand-mark" aria-hidden="true">TI</span><span>Training Institute<span class="brand-caption">Workshop 1 · Management</span></span></a>
        <nav class="main-nav" aria-label="Main navigation">
            <a href="{{ route('students.index') }}" @class(['active' => request()->routeIs('students.*')])>Students</a>
            <a href="{{ route('courses.index') }}" @class(['active' => request()->routeIs('courses.*')])>Courses</a>
        </nav>
    </header>
    <main class="page-shell">
        @if (session('success'))
            <div class="notice notice-success" role="status">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="notice notice-error" role="alert">
                <strong>Please correct the highlighted fields.</strong>
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="site-footer">Training Institute · Student and course records</footer>
</body>
</html>
