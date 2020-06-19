
<section>
    <h2>FORMULAIRE DE CONTACT</h2>
    <form class="ajax create" action="honeypot.php" method="POST" enctype="multipart/form-data">
        <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
        <input type="email" name="email" required placeholder="votre email">
        <input type="text" name="nom" required placeholder="votre nom">
        <textarea name="message" required placeholder="votre message"></textarea>
        <button type="submit">ENVOYER VOTRE MESSAGE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="classeCible" value="Contact">
        <input type="hidden" name="methodeCible" value="create">
        <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
        <div class="confirmation"></div>
    </form>
</section>