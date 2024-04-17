<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_number' => '000BasePyraImmo',
            'operation_id' => '000BasePyraImmo',
            'date_transaction' => today(),
            'amount' => '0',
            'transaction_way' => 'PyraImmo',
            'transaction_type' => 'free_from_Pyra_Immo',
            'is_validated' => 1,
        ];
    }
}
