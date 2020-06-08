<?php
    echo "<h3>trouver la plus petite valeur dans tableau</h3>";
    function TrouverMin ($tabNombre)
    { 
        // https://www.php.net/manual/fr/function.sort.php
        sort ($tabNombre);
        
        $ValMin = $tabNombre [0];
        return $ValMin;
    }
echo TrouverMin ([ 12, 3, 45, 1, 100, 35 ]);  
