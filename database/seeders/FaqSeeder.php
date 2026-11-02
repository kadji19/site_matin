<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            ['question' => "Matin peut-il envoyer des e-mails sans mon accord ?", 'answer' => "Non, jamais. Matin prépare un brouillon et attend que tu appuies sur « Confirmer ». Ce réglage est toujours activé et ne peut pas être désactivé."],
            ['question' => "Est-ce que Matin lit tous mes e-mails ?",   'answer' => "Matin analyse tes e-mails récents pour en tirer un résumé. Le contenu complet n'est pas conservé sur nos serveurs, seulement les résumés de ton briefing."],
            ['question' => "Ça marche avec Outlook ou Yahoo ?",      'answer' => "Pas encore. Matin fonctionne aujourd'hui avec Gmail et Google Agenda. D'autres services suivront."],
        ];

        foreach ($faqs as $i => $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                $faq + ['sort_order' => $i + 1]
            );
        }
    }
}
