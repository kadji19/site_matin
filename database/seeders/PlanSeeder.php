<?php

namespace Database\Seeders;

use App\Models\plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Gratuit', 'description' => 'Pour découvrir Matin.',
                'is_featured' => false, 'price_monthly' => 0, 'price_yearly' => null, 'period' => 'FCFA',
                'features' => ['Briefing quotidien par e-mail', '20 commandes vocales par mois', '1 compte Google'],
                'cta_label' => 'Télécharger',
            ],
            [
                'name' => 'Essentiel', 'description' => 'Pour gérer ta journée à la voix.',
                'badge' => 'Le plus choisi', 'is_featured' => true,
                'price_monthly' => 2000, 'price_yearly' => 20000, 'period' => 'FCFA / mois',
                'features' => ['Tout le gratuit', 'Commandes vocales illimitées', 'Notifications et rappels avant RDV', 'Lecture du briefing à voix haute'],
                'cta_label' => 'Essayer Essentiel',
            ],
/*             [
                'name' => 'Pro', 'description' => 'Pour les plus occupés.',
                'is_featured' => false, 'price_monthly' => 5000, 'price_yearly' => 50000, 'period' => 'FCFA / mois',
                'features' => ['Tout Essentiel', "Jusqu'à 3 comptes Google", 'Récap du soir', 'Support prioritaire sur WhatsApp'],
                'cta_label' => 'Choisir Pro',
            ], */
        ];

        foreach ($plans as $i => $plan) {
            plan::updateOrCreate(['name' => $plan['name']], $plan + ['sort_order' => $i + 1]);
        }
    }
}
