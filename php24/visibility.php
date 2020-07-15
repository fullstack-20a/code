<?php

// SOUS LA RESPONSABILITE D'UN DEV
class MaClasse
{
    // PROPRIETES
    public      $prop1       = "valeur1";
    protected   $prop2       = "valeur2";
    private     $prop3       = "valeur3";

    // METHODES
    function faire1 ()      // PAR DEFAUT public
    {

    }

    public function faire2 ()
    {
        // PEUT ETRE QU'IL Y A BEAUCOUP DE CODE
        // => ON VA DECOUPER CE CODE EN PLUSIEURS MORCEAUX
        $this->etape1();    // OK CAR protected
        $this->etape2();    // OK CAR protected
        $this->etape3();    // OK CAR protected

    }

    // ATTENTION: NE PAS UTILISER TOUT SEUL
    protected function etape1 ()
    {
        echo "<h4>HEADER</h4>";
    }

    // ATTENTION: NE PAS UTILISER TOUT SEUL
    protected function etape2 ()
    {
        echo "<h4>SECTION</h4>";
    }

    // ATTENTION: NE PAS UTILISER TOUT SEUL
    protected function etape3 ()
    {
        echo "<h4>FOOTER</h4>";
    }

    protected function faire3 ()
    {

    }

    private function faire4 ()
    {

    }

}


class MonEnfant extends MaClasse
{
    // METHODES
    function faire5 ()
    {
        // ON PEUT UTILISER LES PROPRIETES ET METHODES public ET protected
        $this->etape3();            // OK CAR protected

        // MAIS ON NE POURRA UTILISER LES PROPRIETES ET METHODES private
        // $this->faire4();         // ERREUR CAR private
        // Fatal error: Uncaught Error: Call to private method MaClasse::faire4() from context 'MonEnfant'
    }

}

// SOUS LA RESPONSABILITE DE DEV2
class Dev2
{
    // METHODES
    function faireTravailDev2 ()
    {
        // ON PEUT UTILISER LES PROPRIETES ET LES METHODES public EN DEHORS DE LA CLASSE MaClasse
        $objet = new MaClasse;

        $objet->prop1 = "nouvelle valeur";  // OK car public
        echo $objet->prop1;                 // OK car public

        $objet->faire1();                   // OK car public
        $objet->faire2();                   // OK car public

        // $objet->etape2();                   // ERREUR car protected
        // Fatal error: Uncaught Error: Call to protected method MaClasse::etape2()

        // $objet->prop2  = "nouvelle valeur"; // ERREUR PHP car protected
        // Fatal error: Uncaught Error: Cannot access protected property MaClasse::$prop2

        // $objet->faire3();                   // ERREUR PHP car protected
        // Fatal error: Uncaught Error: Call to protected method MaClasse::faire3()

        // $objet->prop3  = "nouvelle valeur"; // ERREUR PHP car private
        // Fatal error: Uncaught Error: Cannot access private property MaClasse::$prop3

        // $objet->faire4();                   // ERREUR PHP car private
        // Fatal error: Uncaught Error: Call to private method MaClasse::faire4() 

        $objetEnfant = new MonEnfant;
        $objetEnfant->faire5();
    }
}
