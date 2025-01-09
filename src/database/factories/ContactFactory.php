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
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'email'=>$this->faker->unique()->safeEmail,
            'tel'=>$this->faker->numerify('0###-####-####'),
            'address'=>$this->faker->address,
            'building'=>$this->faker->buildingNumber,
            'detail'=>$this->faker->text(120)
];
    }
}
