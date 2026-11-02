<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        $steps = [
            ['title' => "Connecte ton compte Google", 'description' => "En 30 secondes, avec la connexion officielle de Google. Tu choisis ce que Matin peut voir.", 'step' => "Etape 1"],
            ['title' => "Choisis l'heure de ton briefing",   'description' => "7h00 par défaut. Tu peux aussi activer un récap du soir.", 'step' => "Etape 2"],
            ['title' => "Reçois ta journée et parle à Matin",      'description' => "Un e-mail et une notification chaque matin, puis un seul bouton pour tout gérer à la voix.", 'step' => "Etape 3"],
        ];

        foreach ($steps as $i => $step) {
            Step::updateOrCreate(
                ['title' => $step['title']],
                $step + ['sort_order' => $i + 1]
            );
        }
    }
}
