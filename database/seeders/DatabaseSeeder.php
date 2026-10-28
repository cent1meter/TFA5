<?php
namespace Database\Seeders;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (CustomerController::RECORDS as $record) {
            DB::table('customers')->updateOrInsert(['email' => $record['email']], $record);
        }
        foreach (UserController::RECORDS as $record) {
            DB::table('staff_users')->updateOrInsert(['username' => $record['username']], $record);
        }
    }
}
