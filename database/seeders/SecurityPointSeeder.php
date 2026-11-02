<?php

namespace Database\Seeders;

use App\Models\SecurityPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecurityPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $securityPoints = [
            ['title' => "Connexion via Google", 'description' => "Tu te connectes sur la page officielle de Google. Matin ne voit et ne stocke jamais ton mot de passe."],
            ['title' => "Accès limité",   'description' => "Lecture de l'agenda et des e-mails récents. L'envoi ne se fait qu'après ta confirmation."],
            ['title' => "Pas d'archive de tes e-mails",      'description' => "Le contenu complet n'est pas conservé : seulement des résumés courts pour ton briefing."],
        ];

        foreach ($securityPoints as $i => $securityPoint) {
            SecurityPoint::updateOrCreate(
                ['title' => $securityPoint['title']],
                $securityPoint + ['sort_order' => $i + 1]
            );
        }
    }
}
