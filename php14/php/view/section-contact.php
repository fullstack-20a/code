
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


<section>
    <h2>CARTE</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.9454222566496!2d5.3623260163391295!3d43.294464629135234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0c6a1843729%3A0x7d3f3acf189dc3b1!2sVieux-Port%20de%20Marseille!5e0!3m2!1sfr!2sfr!4v1592567204377!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>