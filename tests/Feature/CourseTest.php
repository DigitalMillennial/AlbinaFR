<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_course_can_be_created_with_all_fields()
    {
        $course = Course::factory()->create([
            'niveau' => 'Débutant',
            'title' => 'PHP Avancé',
            'price' => 199.99,
            'nb_lessons' => 20,
            'description' => 'Cours complet sur PHP',
            'type' => 'en ligne',
        ]);

        $this->assertDatabaseHas('courses', [
            'niveau' => 'Débutant',
            'title' => 'PHP Avancé',
            'price' => 199.99,
            'nb_lessons' => 20,
            'description' => 'Cours complet sur PHP',
            'type' => 'en ligne',
        ]);
    }

    /** @test */
    public function a_course_requires_title_and_price()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Course::factory()->create([
            'title' => null,
            'price' => null,
        ]);
    }

    /** @test */
    public function a_course_requires_niveau_and_type()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Course::factory()->create([
            'niveau' => null,
            'type' => null,
        ]);
    }

    /** @test */
    public function description_can_be_nullable()
    {
        $course = Course::factory()->create([
            'description' => null,
        ]);

        $this->assertNull($course->description);
    }
}
