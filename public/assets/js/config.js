/* ==========================================================================
   Matin — réglages du site (à modifier avant la mise en ligne)
   ========================================================================== */
window.MATIN_CONFIG = {

  /* Adresse affichée si un formulaire n'est pas encore relié à un service d'envoi. */
  supportEmail: 'support@[votre-domaine]',

  /* Formulaires : un site HTML ne peut pas enregistrer les données lui-même.
     Coller ici l'adresse d'envoi fournie par un service de formulaires
     (Formspree, Getform, Basin, Web3Forms, une fonction serverless, un script PHP…).
     Exemple Formspree : 'https://formspree.io/f/abcdwxyz'
     Laisser vide tant que ce n'est pas configuré : le formulaire affiche alors
     un message qui invite à écrire au support. */
  forms: {
    beta: '',         // Inscription à la bêta (page d'accueil)
    contact: '',      // Page contact
    suppression: ''   // Page « Supprimer mon compte »
  },

  /* Mesure d'audience, chargée seulement après « Accepter » dans le bandeau cookies.
     provider : 'none', 'plausible' ou 'ga4'
     id : votre domaine pour Plausible, G-XXXXXXX pour Google Analytics 4 */
  analytics: {
    provider: 'none',
    id: ''
  }
};
