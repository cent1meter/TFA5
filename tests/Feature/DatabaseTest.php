<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    public function test_sample_seed_is_complete_and_repeatable(): void
    {
        $this->seed();
        $this->seed();
        $this->assertDatabaseCount('customers', 5);
        $this->assertDatabaseCount('staff_users', 5);
        $this->assertDatabaseHas('staff_users', ['username' => 'admin01']);
    }
}
