<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Expense;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // عمل يوزر تجريبي
        $user = User::create([
            'name'     => 'Ahmed Mohamed',
            'email'    => 'ahmed@test.com',
            'password' => Hash::make('password'),
        ]);

        // عمل مصروفات تجريبية
        $expenses = [
            ['category_id' => 1, 'title' => 'غداء في المطعم',     'amount' => 150.00, 'date' => now()->subDays(1)],
            ['category_id' => 2, 'title' => 'تاكسي للشغل',        'amount' => 45.00,  'date' => now()->subDays(2)],
            ['category_id' => 3, 'title' => 'فاتورة الكهرباء',    'amount' => 320.00, 'date' => now()->subDays(3)],
            ['category_id' => 4, 'title' => 'اشتراك نتفليكس',     'amount' => 199.00, 'date' => now()->subDays(4)],
            ['category_id' => 1, 'title' => 'فطار من الكافيه',    'amount' => 85.00,  'date' => now()->subDays(5)],
            ['category_id' => 5, 'title' => 'جاكيت جديد',         'amount' => 450.00, 'date' => now()->subDays(6)],
            ['category_id' => 6, 'title' => 'دكتور أسنان',        'amount' => 600.00, 'date' => now()->subDays(7)],
            ['category_id' => 2, 'title' => 'بنزين العربية',      'amount' => 200.00, 'date' => now()->subDays(8)],
            ['category_id' => 7, 'title' => 'كورس أونلاين',       'amount' => 350.00, 'date' => now()->subDays(9)],
            ['category_id' => 3, 'title' => 'فاتورة الإنترنت',    'amount' => 180.00, 'date' => now()->subDays(10)],
        ];

        foreach ($expenses as $expense) {
            Expense::create([
                'user_id' => $user->id,
                ...$expense,
            ]);
        }
    }
}
