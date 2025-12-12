<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::orderBy('niveau')->get();
        return view('admin.courses.index', compact('courses'));
    }
    public function create(){
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'niveau' => 'required|string',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'nb_lessons' => 'required|integer',
            'description' => 'nullable|string',
            'type' => 'required|string',
        ]);

        $validated['is_active'] = $request->input('is_active') === 'active';

        $icons = [
            'fa-solid fa-book',
            'fa-solid fa-pen-to-square',
            'fa-solid fa-users',
            'fa-solid fa-language',
            'fa-solid fa-puzzle-piece',
            'fa-solid fa-headset',
            'fa-solid fa-users-between-lines',
            'fa-solid fa-earth-asia',
            'fa-solid fa-display',
            'fa-solid fa-cubes',
        ];

        $validated['icon_class'] = $icons[array_rand($icons)];
        $validated['type'] = $request->input('type');

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Cours enregistré avec succès.');
    }

    /**
     * Список активных курсов для сайта
     */
 public function showCourses()
{
    $courses = Course::where('is_active', true)
        ->with([
            'groups' => function ($query) {
                $query->whereDate('start_date', '>', now())
                      ->whereRaw('(SELECT COUNT(*) 
                                   FROM group_student 
                                   WHERE group_student.group_id = groups.id) < groups.capacity');
            },
            'groups.schedules' // ✅ правильное имя связи
        ])
        ->get();

    return view('site.courses', compact('courses'));
}



    /**
     * Редактирование курса (AJAX)
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return response()->json($course);
    }

    /**
     * Обновление курса
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'niveau' => 'nullable|string',
            'type' => 'nullable|string',
            'price' => 'nullable|numeric',
            'nb_lessons' => 'nullable|integer',
            'duration_weeks' => 'nullable|integer',
            'is_active' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $validated['is_active'] = $validated['is_active'] === 'active';

        $course = Course::findOrFail($id);
        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Cours mis à jour.');
    }

    /**
     * Удаление курса
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Cours supprimé avec succès.');
    }

    /**
     * Переключение статуса активности
     */
    public function toggle(Course $course)
    {
        $course->is_active = !$course->is_active;
        $course->save();

        return redirect()->route('admin.courses.index')->with('success', 'Статус курса обновлён.');
    }
}
