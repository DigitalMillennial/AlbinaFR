<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Course;
use Carbon\Carbon;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $groups = Group::with('course')->get();
    $courses = Course::all(); //
    return view('admin.groups.index', compact('groups','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    $courses = Course::all();
    return view('admin.groups.create', compact('courses'));
}


public function store(Request $request)
{
    $request->validate([
        'group_name' => 'required|string|max:255',
        'course_id'  => 'required|exists:courses,id',
        'start_date' => 'required|date',
        'capacity'   => 'required|integer|min:1',
    ]);

    // подтягиваем курс
    $course = Course::findOrFail($request->course_id);

    // считаем дату окончания: старт + duration_weeks
    $endDate = null;
    if (!empty($course->duration_weeks)) {
        $endDate = Carbon::parse($request->start_date)->addWeeks($course->duration_weeks);
    }

    // создаём группу
    $group = Group::create([
        'group_name' => $request->group_name,
        'course_id'  => $course->id,
        'start_date' => $request->start_date,
        'end_date'   => $endDate,             // <-- автоматически рассчитано
        'capacity'   => $request->capacity,
       
    ]);

    // сохраняем расписания (до 5 строк)
    if ($request->has('schedule')) {
        foreach ($request->schedule as $sch) {
            if (!empty($sch['jour_semaine']) && !empty($sch['heure_debut']) && !empty($sch['heure_fin'])) {
                $group->schedules()->create([
                    'jour_semaine' => $sch['jour_semaine'],
                    'heure_debut'  => $sch['heure_debut'],
                    'heure_fin'    => $sch['heure_fin'],
                ]);
            }
        }
    }

    return redirect()->route('admin.groups.index')->with('success', 'Группа создана');
}




public function edit(Group $group)
{
    $courses = Course::all();
    return view('admin.groups.edit', compact('group', 'courses'));
}

public function update(Request $request, Group $group)
{
    $request->validate([
        'group_name' => 'required|string|max:255',
        'course_id'  => 'required|exists:courses,id',
    ]);

    $group->update($request->only('group_name', 'course_id'));

    return redirect()->route('admin.groups.index')->with('success', 'Группа обновлена');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
