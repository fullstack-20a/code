# JOUR 12

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?99C13C2AC6F946DF5A9B8E9F953D48EAEC2B


## NEWS / QUESTIONS

## PLANNING

user    CREATE

inscription.php
    sign up

installation.php
    ON NE CREE UN user QUE SI LA TABLE user EST VIDE
    UN FORMULAIRE DE COMPTE ADMIN
    email
    password
    => CREATE DU COMPTE 

login.php
    sign in
    ON DEMANDE AU VISITEUR DE S'IDENTIFIER AVEC UN email ET UN password
    (READ SUR LA TABLE user...)

logout.php

## CREATION DE LA PAGE installation.php

    CREER LA TABLE SQL user

        user
            id                  INT             INDEX=PRIMARY A_I
            email               VARCHAR(160)
            login               VARCHAR(160)
            password            VARCHAR(160)
            level               INT
            dateCreation        DATETIME

    ET ENSUITE CODER LE FORMULAIRE HTML
    => ASTUCE ON UTILISE LE NOM DES COLONNES SQL DANS LES BALISES HTML (name="...")

    



