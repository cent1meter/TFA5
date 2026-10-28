<?php
namespace App\Http\Controllers;
use Illuminate\View\View;
class UserController extends Controller
{
    // Temporary static PHP data source required by TFA5.
    public const RECORDS = [
            [
                'username'  => 'admin01',
                'full_name' => 'Rainier Ian Sayson',
                'role'      => 'Administrator',
            ],
            [
                'username'  => 'cashier01',
                'full_name' => 'Ella Dela Cruz',
                'role'      => 'Cashier',
            ],
            [
                'username'  => 'cashier02',
                'full_name' => 'Miguel Ramos',
                'role'      => 'Cashier',
            ],
            [
                'username'  => 'manager01',
                'full_name' => 'Patricia Lim',
                'role'      => 'Manager',
            ],
            [
                'username'  => 'staff01',
                'full_name' => 'Daniel Flores',
                'role'      => 'Inventory Staff',
            ],
        ];
    public function index(): View
    {
        return view('users.index', ['title' => 'User Accounts', 'users' => self::RECORDS]);
    }
}
