<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'hero_title'         => "Ta journée, résumée avant ton ",
            'hero_title_accent'         => "premier café.",
            'hero_subtitle'      => "Matin lit ton Gmail et ton agenda, t'envoie chaque matin l'essentiel, et t'obéit à la voix. Tu gardes toujours le dernier mot.",
            'hero_appstore_url'  => '#',
            'hero_playstore_url' => '#',
            'hero_image'         => null,
            'step_question' => "Comment ça marche",
            'step_title' => "Prêt en trois étapes, avant demain matin.",
            'feature_question' => "Fonctionnalités",
            'feature_title' => "Ton assistante, sans l'abonnement d'une secrétaire.",
            'feature_subtitle' => "Matin s'occupe de ta boîte mail et de ton agenda. Toi, tu valides.",
            'screenshot_question' => "L'application",
            'screenshot_title' => "Quatre écrans. Pas un de plus.",
            'screenshot_subtitle' => "Une app de moins de 15 Mo : le travail lourd se fait sur nos serveurs, pas sur ton téléphone.",
            'morning_email_question' => "Votre e-mail du matin",
            'morning_email_title' => "Pas besoin d'ouvrir l'app.",
            'morning_email_text'  => "Ton briefing arrive directement dans ta boîte mail, à l'heure que tu as choisie.",
            'morning_email_image'         => null,
            'voice_question' => "Essaie maintenant",
            'voice_title' => "Parle comme tu parlerais à ton assistante.",
            'voice_subtitle' => "Choisis une phrase pour voir ce que Matin répond. Démonstration simulée, sans connexion à un compte.",
            'security_question'     => "Sécurité et vie privée",
            'security_title'     => "Ta boîte mail reste la tienne.",
            'security_intro'     => "Matin a besoin d'accéder à Gmail et à ton agenda pour t'aider. Voici exactement comment nous protégeons ces données.",
            'tarif_question'     => "Tarifs",
            'tarif_title'     => "Commence gratuitement. Passe à la suite quand tu es convaincu.",
            'faq_question'     => "Questions fréquentes",
            'faq_title'     => "Tu te demandes peut-être…",
            'action_question'     => "Télécharger",
            'action_title'     => "Commence ta prochaine journée avec Matin.",
            'company_name'    => '[Nom de la société]',
            'company_form'    => '[SARL / SARLU / SA]',
            'company_capital' => '[montant]',
            'company_rccm'    => '[RCCM TG-LOM ...]',
            'company_nif'     => '[NIF]',
            'company_address' => '[Adresse]',
            'company_email'   => 'support@[votre-domaine]',
            'company_phone'   => '+228 [numéro]',
            'company_director'=> '[Nom du directeur de la publication]',
            'company_hosting' => "[Nom de l'hébergeur, adresse, téléphone]",
            'site_domain'     => '[votre-domaine]',
            'legal_updated_at'=> '2026-10-28',
            'pay_methods'     => 'Flooz, T-Money, Carte bancaire',
            'reassure'        => 'Gratuit pour commencer, Moins de 15 Mo, En français',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
