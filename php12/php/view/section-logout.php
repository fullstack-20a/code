
    <section>
        <h2>DECONNEXION</h2>
        <script>
// SUPPRIMER LA CLE DANS sessionStorage
sessionStorage.removeItem('cleAPI');   

// DELAI ET REDIRECTION
setTimeout(function() {
    location.href = 'login.php';
}, 2000);
        </script>
    </section>