<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Group;

class GroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_group_requires_group_name_and_course()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Group::factory()->create([
            'group_name' => null,
            'course_id' => null,
        ]);
    }

    /** @test */
    public function end_date_can_be_nullable()
    {
        $group = Group::factory()->create([
            'end_date' => null,
        ]);

        $this->assertNull($group->end_date);
    }
}
