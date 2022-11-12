<?php

namespace Database\Seeders;

use App\Models\GreetingMessage;
use App\Models\Role;
use Illuminate\Database\Seeder;

class GreetingMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GreetingMessage::create([
            'message_by' => 'President',
            'greeting_messages' => 'SBF nursing institute, lalmonirhat is one of the most benevolent private nursing institute in bangladesh. It is affiliated by bangladesh nursing and midwifery council. This institute was established for mankind in 2019.',
            'name' => 'Md. Shafiqul Islam',


        ]);

        GreetingMessage::create([
            'message_by' => 'COO',
            'greeting_messages' => 'SBF nursing institute, lalmonirhat is one of the most benevolent private nursing institute in bangladesh. It is affiliated by bangladesh nursing and midwifery council. This institute was established for mankind in 2019.',
            'name' => 'Hasiya Akter',


        ]);

        GreetingMessage::create([
            'message_by' => 'VICEPRINCIPAL',
            'greeting_messages' => 'SBF nursing institute, lalmonirhat is one of the most benevolent private nursing institute in bangladesh. It is affiliated by bangladesh nursing and midwifery council. This institute was established for mankind in 2019.',
            'name' => 'prof. Dr. Md. Abdul Kader',


        ]);
    }
}
