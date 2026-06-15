<?php

namespace Database\Factories;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Employees::class;

    public function definition()
    {
        $designation = $this->faker->randomElement(['Sr. Web Developer', 'Software Engineer', 'iOS Developer', 'Android Developer', 'Backend Developer', 'Full Stack Engineer']);
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'empid' => $this->faker->numerify("EMP#######"),
            'emp_name' => $this->faker->name($gender),
            'emp_designation' => $designation,
            'emp_date_of_join' => $this->faker->date('Y-m-d'), // emp_date_of_join
            'emp_gender' => $gender,
            'emp_address' => $this->faker->address(),
        ];
    }
}
