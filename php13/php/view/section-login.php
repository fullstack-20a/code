
        <section>
            <h2>FORMULAIRE DE LOGIN</h2>
            <form class="ajax" action="api.php" method="POST">
                <!-- PARTIE A REMPLIR PAR LE VISITEUR -->
                <input type="email" name="email" required placeholder="email">
                <input type="password" name="password" required placeholder="password">
                <button type="submit">SE CONNECTER</button>
                <div class="confirmation"></div>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="classeCible" value="User">
                <input type="hidden" name="methodeCible" value="login">
            </form>
        </section>
