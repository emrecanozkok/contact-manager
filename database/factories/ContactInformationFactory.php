<?php

namespace Database\Factories;

use App\Enum\InformationTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactInformation>
 */
class ContactInformationFactory extends Factory
{

    protected $model = \App\Models\ContactInformation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomInformationType = $this->faker->randomElement(['PHONE', 'LOCATION', 'EMAIL']);

        $informationContent = '';
        switch ($randomInformationType) {
            case 'PHONE';
                $informationContent = $this->faker->phoneNumber();
                break;
            case 'LOCATION';
                $informationContent = $this->faker->countryCode();
                break;
            case 'EMAIL';
                $informationContent = $this->faker->email();
                break;

        }

        return [


            'information_type' => $randomInformationType,
            'information_content' => $informationContent
        ];
    }
}
