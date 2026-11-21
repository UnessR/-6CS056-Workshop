<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    private const DIFFICULTIES = ['Easy', 'Medium', 'Hard'];

    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));
        $difficulty = (string) $request->query('difficulty', '');

        $courses = Course::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when(in_array($difficulty, self::DIFFICULTIES, true), fn ($query) => $query->where('difficulty', $difficulty))
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('courses.index', compact('courses', 'search', 'difficulty'));
    }

    public function create(): View
    {
        return view('courses.create', ['course' => new Course()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $validated['is_active'] = $request->boolean('is_active');
        $course = Course::create($validated);

        return redirect()->route('courses.show', $course)
            ->with('success', "Course {$course->name} was created.");
    }

    public function show(Course $course): View
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course): View
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $validated['is_active'] = $request->boolean('is_active');
        $course->update($validated);

        return redirect()->route('courses.show', $course)
            ->with('success', 'Course details were updated.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course was deleted.');
    }

    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'duration' => ['required', 'integer', 'min:1', 'max:65535'],
            'fee' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'difficulty' => ['required', 'in:Easy,Medium,Hard'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }
}
