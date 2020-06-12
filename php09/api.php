<?php

require_once "php/controller/Ajax.php";
require_once "php/controller/Controller.php";
require_once "php/model/Model.php";

// AJOUTER LES API POUR LES FORMULAIRES
require_once "php/controller/ApiNewsletter.php";
require_once "php/controller/ApiContact.php";

Ajax::traiterFormulaire();

