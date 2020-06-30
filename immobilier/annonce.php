<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
* {
    width:100%;
}
form {
    display: flex;
    flex-direction: column;
}        

    </style>
</head>
<body>
    <main>
        <section>
            <h2>FORMULAIRE DE CREATION D'UNE ANNONCE</h2>
            <!-- SANS AJAX: IL FAUT BIEN AJOUTER enctype="..." POUR FAIRE UPLOAD -->
            <form action="api.php" method="POST" enctype="multipart/form-data">
                <input name="titre" required type="text" placeholder="titre">   
                <input name="adresse" required type="text" placeholder="adresse">   
                <input name="ville" required type="text" placeholder="ville">

                <!-- http://html5pattern.com/Postal_Codes -->
                <input name="cp" required type="text" placeholder="cp" pattern="[0-9]{5}">

                <input name="surface" required type="number" placeholder="surface">   
                <input name="prix" required type="number" placeholder="prix">  
                <!-- type -->
                <label for="choix1">
                    <span>vente</span>
                </label>
                <input id="choix1" name="type" required type="radio" value="vente">   
                <label>
                    <span>location</span>
                    <input name="type" required type="radio" value="location">   
                </label>
                <!-- champs optionnels -->
                <input type="file" name="photo" accept="image/*">
                <textarea name="description" cols="80" rows="8" placeholder="description"></textarea>
                <button type="submit">PUBLIER VOTRE ANNONCE</button>
            </form>
        </section>
    </main>
</body>
</html>