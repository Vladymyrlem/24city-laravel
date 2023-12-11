<?php

namespace Database\Seeders;

use App\Models\Payments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentsMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            'Наличный расчет',
            'Банковские карты Visa, Mastercard',
            'PayPass',
            'Безналичный расчет',
            'Webmoney',
            'Яндекс деньги',
            'Международные переводы',
            'Интернет банкинг',
            'Мобильные платежи',
            'Другое',
            'НСМЕП'
        ];
        foreach ($payments as $payment) {
            Payments::create([
                'payment_name' => $payment,
            ]);
        }
    }
}
