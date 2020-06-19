
<section>
    <h2>INSCRIPTION A LA NEWSLETTER</h2>
    <form class="ajax create" action="honeypot.php" method="POST" enctype="multipart/form-data">
        <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
        <input type="email" name="email" required placeholder="votre email">
        <input type="text" name="nom" required placeholder="votre nom">
        <button type="submit">INSCRIPTION A LA NEWSLETTER</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="classeCible" value="Newsletter">
        <input type="hidden" name="methodeCible" value="create">
        <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
        <div class="confirmation"></div>
    </form>
</section>