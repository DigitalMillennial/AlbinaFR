<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Course;
use App\Models\Group;
use App\Models\Student;

class IntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_student_can_be_linked_to_a_course_and_group()
    {
        // создаём курс
        $course = Course::factory()->create();

        // создаём группу для курса
        $group = Group::factory()->create([
            'course_id' => $course->id,
        ]);

        // создаём студента
        $student = Student::factory()->create();

        // прикрепляем студента к курсу
        $course->students()->attach($student->id);

        // проверки
        $this->assertTrue($course->groups->contains($group));
        $this->assertTrue($course->students->contains($student));
        $this->assertEquals($course->id, $group->course->id);
    }
}
