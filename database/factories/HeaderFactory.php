<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Header;
use Faker\Generator as Faker;

$factory->define(Header::class, function (Faker $faker) {
    return [
        //
        'no' => 'VJCA' . $faker->unique(false, 1000000000)->numberBetween(10000000000, 99999999999),
        'publish_datetime' => $faker->dateTimeThisDecade(),
        'to_company_address' => explode('  ',$faker->address())[1],
        'to_company_name' => $faker->company(),
        'to_vendor_code' => $faker->randomElement(['KA','KT']).str_pad($faker->unique()->randomNumber(8),8,0,STR_PAD_LEFT) ,
        'amount' => $faker->numberBetween(1,999999999),
        'from_address1' => explode('  ',$faker->address())[1],
        'from_address2' => $faker->secondaryAddress(),
        'from_company_name' => $faker->company(),
        'from_company_division' => $faker->word() . '部',
        'from_company_tel' => $faker->phoneNumber(),
        'from_bank_name' => $faker->word() . '銀行',
        'from_branch_name' => $faker->word() . '支店',
        'from_bank_kind' => $faker->randomElement(['普通', '当座']),
        'from_bank_no' => $faker->numberBetween(1000000, 9999999),
        'from_account_name' => $faker->name(),
        'payment_date' => $faker->date()
    ];
})->afterCreating(Header::class, function($header, $faker){
    for($i = $faker->numberBetween(1,20); $i > 0; $i--){
        factory(App\Detail::class)->create([
            'no' => $header->no
        ]);
    }
});
