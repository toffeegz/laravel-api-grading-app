<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Role $role)
    {

        $now = Carbon::now()->toDateTimeString();
        $role->insert([
            [
                'name' => 'superadmin',
                'display_name' => 'Super Administrator',
                'description' => 'Fusce magna urna, malesuada nec scelerisque ac, aliquam a nisi. Pellentesque est nisl, consequat non egestas quis, molestie eget lacus. Phasellus dapibus ante ut euismod pharetra.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique massa id nulla accumsan tincidunt. Aliquam imperdiet egestas auctor. ',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'instructor',
                'display_name' => 'Instructor',
                'description' => 'Phasellus convallis dapibus dui. Donec sagittis turpis magna, nec varius turpis euismod vel. Sed efficitur enim sit amet tempor bibendum. ',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'student',
                'display_name' => 'Student',
                'description' => 'Pellentesque enim urna, vestibulum id leo vitae, consequat aliquet turpis. Cras diam neque, rutrum venenatis magna id, molestie tincidunt lorem. ',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

    }
}
