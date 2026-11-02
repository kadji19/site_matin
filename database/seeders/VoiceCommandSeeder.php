<?php

namespace Database\Seeders;

use App\Models\VoiceCommand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoiceCommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commands = [
        [
            'command' => "Qu'est-ce que j'ai aujourd'hui ?",
            'reply'   => "Tu as 3 rendez-vous : 9h00 réunion fournisseur avec Koffi, 13h00 déjeuner avec Awa, 16h30 appel avec la banque. Ton après-midi est libre entre 14h et 16h.",
        ],
        [
            'command'     => 'Réponds à Awa que je confirme pour jeudi',
            'reply'       => "Voici le brouillon. Je l'envoie ?",
            'action_meta' => 'À : Awa Mensah · Objet : Re: Livraison jeudi',
            'action_body' => 'Bonjour Awa, je te confirme la livraison pour jeudi. Merci et bonne journée. Afi',
            'action_yes'  => 'Envoyer',
            'action_done' => 'E-mail envoyé à Awa Mensah.',
        ],
        [
            'command'     => 'Décale ma réunion de 15h à demain matin',
            'reply'       => 'Demain matin, tu es libre à 9h00 ou à 10h30. Je propose 10h30 et je préviens Kodjo ?',
            'action_meta' => 'Réunion avec Kodjo',
            'action_body' => 'Mercredi 15h00 → Jeudi 10h30, avec un message aux participants.',
            'action_yes'  => 'Décaler',
            'action_done' => 'Réunion déplacée à jeudi 10h30. Kodjo est prévenu.',
        ],
        [
            'command'     => "Rappelle-moi d'appeler la banque à 14h",
            'reply'       => "D'accord. Je crée ce rappel ?",
            'action_meta' => 'Rappel · aujourd\'hui 14h00',
            'action_body' => 'Appeler la banque pour les pièces du dossier.',
            'action_yes'  => 'Créer le rappel',
            'action_done' => 'Rappel créé pour 14h00.',
        ],
    ];

    foreach ($commands as $i => $c) {
        VoiceCommand::updateOrCreate(['command' => $c['command']], $c + ['sort_order' => $i + 1]);
    }
    }
}
