<?php

// CHARGER LE CLASSES DEFINIES DANS DES FICHIERS SEPARES
require_once "php/model/Config.php";
require_once "php/model/Model.php";
require_once "php/controller/Controller.php";
require_once "php/controller/ApiArticle.php";

// DEFINITION D'UNE API
// Application Programming Interface
// => MOYEN DEPUIS L'EXTERIEUR D'ACTIVER DU CODE PHP
// => COMME ON FAIT DE LA Programmation Orientée Objet (P.O.O.) EN PHP
//      TOUT NOTRE CODE PHP SERA RANGE DANS DES CLASSES ET DES METHODES
//      ACTIVER DU CODE POO REVIENT A APPELER UNE METHODE DANS UNE CLASSE

// LA METHODE QU'ON ACTIVE AU DEPART
Controller::traiterFormulaire();
// ON REDIRIGE VERS LA PAGE PRECEDENTE...
// Controller::redirigerPrecedent();

// LA FIN DU FICHIER SERT DE BALISE FERMANTE POUR PHP
// COOL ;-p
