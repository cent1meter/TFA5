<?php
namespace App\Http\Controllers;
use Illuminate\View\View;
class CustomerController extends Controller
{
    // Temporary static PHP data source required by TFA5.
    public const RECORDS = [
            [
                'full_name' => 'Maria Santos',
                'email'     => 'maria.santos@example.com',
                'phone'     => '0917 123 4567',
            ],
            [
                'full_name' => 'John Reyes',
                'email'     => 'john.reyes@example.com',
                'phone'     => '0918 234 5678',
            ],
            [
                'full_name' => 'Angela Cruz',
                'email'     => 'angela.cruz@example.com',
                'phone'     => '0919 345 6789',
            ],
            [
                'full_name' => 'Carlo Mendoza',
                'email'     => 'carlo.mendoza@example.com',
                'phone'     => '0920 456 7890',
            ],
            [
                'full_name' => 'Sofia Garcia',
                'email'     => 'sofia.garcia@example.com',
                'phone'     => '0921 567 8901',
            ],
        ];
    public function index(): View
    {
        return view('customers.index', ['title' => 'Customer Accounts', 'customers' => self::RECORDS]);
    }
}
