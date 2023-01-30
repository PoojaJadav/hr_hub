<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'first_name' => 'Abhi',
            'last_name' => 'Kansara',
            'email' => 'abhi@gmail.com',
            'birth_date' => '1997-01-16',
            'joined_at' => '2022-01-03',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Bhumika',
            'last_name' => 'Bhalala',
            'email' => 'bhumika@gmail.com',
            'birth_date' => '1996-03-13',
            'joined_at' => '2020-12-22',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Dinesh',
            'last_name' => 'Mali',
            'email' => 'dinesh@gmail.com',
            'birth_date' => '1996-04-16',
            'joined_at' => '2021-07-19',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Dipak',
            'last_name' => 'Gavali',
            'email' => 'dipak@gmail.com',
            'birth_date' => '1995-09-10',
            'joined_at' => '2022-01-03',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Hiren',
            'last_name' => 'Gajjar',
            'email' => 'hiren@gmail.com',
            'joined_at' => '2022-11-14',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Jay',
            'last_name' => 'Mangukiya',
            'email' => 'jay@gmail.com',
            'birth_date' => '1998-11-24',
            'joined_at' => '2020-12-21',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Jayraj',
            'last_name' => 'Chauhan',
            'email' => 'jayraj@gmail.com',
            'birth_date' => '1995-11-28',
            'joined_at' => '2018-10-18',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Kapil',
            'last_name' => 'Singh',
            'email' => 'kapil@gmail.com',
            'birth_date' => '1993-03-02',
            'joined_at' => '2021-01-11',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Kishan',
            'last_name' => 'Padhiyar',
            'email' => 'kishan@gmail.com',
            'birth_date' => '2003-11-12',
            'joined_at' => '2022-06-15',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Krushant',
            'last_name' => 'Vaghani',
            'email' => 'krushant@gmail.com',
            'birth_date' => '1995-05-22',
            'joined_at' => '2021-01-04',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Nirav',
            'last_name' => 'Prajapati',
            'email' => 'nirav@gmail.com',
            'joined_at' => '2022-11-01',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Nitin',
            'last_name' => 'Gadhiya',
            'email' => 'nitin@gmail.com',
            'birth_date' => '1992-02-26',
            'joined_at' => '2019-05-05',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Pooja',
            'last_name' => 'Jadav',
            'email' => 'pooja@gmail.com',
            'birth_date' => '1998-06-03',
            'joined_at' => '2019-09-23',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Raviraj',
            'last_name' => 'Chauhan',
            'email' => 'raviraj@gmail.com',
            'birth_date' => '1992-12-19',
            'joined_at' => '2016-07-25',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Ronak',
            'last_name' => 'Rafaliya',
            'email' => 'roank@gmail.com',
            'birth_date' => '1999-01-11',
            'joined_at' => '2020-12-01',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Savan',
            'last_name' => 'Manvar',
            'email' => 'savan@gmail.com',
            'birth_date' => '1997-08-19',
            'joined_at' => '2022-07-01',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Shubham',
            'last_name' => 'Jadav',
            'email' => 'shubham@gmail.com',
            'birth_date' => '1996-10-25',
            'joined_at' => '2021-06-01',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Virendra',
            'last_name' => 'Maurya',
            'email' => 'virendra@gmail.com',
            'birth_date' => '1993-06-12',
            'joined_at' => '2021-09-13',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Vishal',
            'last_name' => 'Mandora',
            'email' => 'vishal@gmail.com',
            'birth_date' => '1992-07-26',
            'joined_at' => '2017-08-15',
        ])->assignRole(ROLE_EMPLOYEE);

        User::factory()->create([
            'first_name' => 'Yash',
            'last_name' => 'Dabhi',
            'email' => 'yash@gmail.com',
            'birth_date' => '2000-02-01',
            'joined_at' => '2020-01-01',
        ])->assignRole(ROLE_EMPLOYEE);
    }
}
