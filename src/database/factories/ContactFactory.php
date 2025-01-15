<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use APP\Models\Contact;


class ContactFactory extends Factory
{
    protected $model=Contact::Class;

    public function definition()
    {
        return [
            'category_id'=>$this->faker->numberBetween(1,5),
            'first_name'=>$this->faker->firstName(255),
            'last_name'=>$this->faker->lastName(255),
            'gender'=>$this->faker->randomElement(['male','female']),
            'email'=>$this->faker->unique()->safeEmail(255),
            'tel'=>$this->faker->phoneNumber(255),
            'address'=>$this->faker->address(255),
            'detail'=>$this->faker->text(120),
];
    }
}
