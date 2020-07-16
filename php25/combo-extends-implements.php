<?php

interface Interface1
{

}

interface Interface2
{

}

class MonParent
{

}

class MonEnfant
    extends MonParent
    implements Interface1, Interface2
{

}

$objet = new MonEnfant;