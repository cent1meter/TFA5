<?php
namespace Tests\Feature;
use Tests\TestCase;
class PagesTest extends TestCase
{
    public function test_all_four_pages_have_working_navigation_and_styles(): void
    {
        foreach (['/', '/about', '/customers', '/users'] as $path) {
            $response = $this->get($path)->assertOk()->assertSee('SwiftPOS')->assertSee('css/styles.css');
            foreach (['home', 'about', 'customers', 'users'] as $name) {
                $response->assertSee('href="'.route($name).'"', false);
            }
        }
    }
    public function test_customer_records_are_passed_and_rendered(): void
    {
        $response = $this->get('/customers')->assertOk()->assertViewIs('customers.index');
        $response->assertViewHas('customers', fn ($records) => count($records) >= 5);
        foreach ($response->viewData('customers') as $row) {
            $response->assertSee($row['full_name'])->assertSee($row['email'])->assertSee($row['phone']);
        }
    }
    public function test_user_records_are_passed_and_rendered(): void
    {
        $response = $this->get('/users')->assertOk()->assertViewIs('users.index');
        $response->assertViewHas('users', fn ($records) => count($records) >= 5);
        foreach ($response->viewData('users') as $row) {
            $response->assertSee($row['username'])->assertSee($row['full_name'])->assertSee($row['role']);
        }
    }
    public function test_unknown_page_returns_404(): void
    {
        $this->get('/missing-page')->assertNotFound();
    }
}
