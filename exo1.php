<link rel="stylesheet" href="style.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remplir une table</title>

</head>
<body>
    <?php
        $message=null;
        //le code de vérification de la valeur de l'input "taille"//
        if(isset($_POST["taille"])){
            $taille = $_POST["taille"];

            if($taille < 3 OR $taille > 9 OR $taille % 2 != 1){
                $message = "Veuillez entrer 3,5,7 ou 9";
                $taille = null;
            } 
        }
    ?>
    <h2>Remplir une table</h2>
    <div>
        <form action="" method="post">
            <label id="titre" for="taille">Entrez la taille du tableau (3,5,7 ou 9)</label></br>
            <input type="number" name="taille"></br>
            <label for="choix">Choisissez un mode de remplissage</label></br>
            <select name="choix">
                <option value="1">Mediane de droite a gauche</option>
                <option value="2">Mediane de gauche a droite</option>
                <option value="3">Mediane de haut en bas</option>
                <option value="4">Mediane de bas en haut</option>
                <option value="5">Diagonale descendante de gauche a droite</option>
                <option value="6">Diagonale montante de gauche a droite</option>
                <option value="7">Diagonale descendante de droite a gauche</option>
                <option value="8">Diagonale montante de droite a gauche</option>
            </select>
            <input class="afficher" type="submit" name="afficher" value="Afficher">
            <br>
            <?php if (isset($_POST["taille"])) echo "$message<br>"?>

        </form>
    </div>
    <?php
        if(isset($_POST["taille"])){
            $choix = $_POST["choix"];
            if($taille % 2 == 1){
                echo "<table>";

                switch($choix){
                    case 1:
                        //pour trouver à coup sûr la médiane, sans division entière
                        $mediane = ($taille + 1)/2; 
                        $valeur = $taille;
                        //on parcours les colonnes avec le 1er "for" 
                        for($ligne=1; $ligne <= $taille; $ligne++){  
                            echo "<tr>";
                            //on parcours les lignes avec le 2eme "for" 
                            for($col=1; $col<= $taille; $col++){
                                if($ligne == $mediane){
                                    echo "<td>$valeur</td>";
                                    $valeur--;
                                } else {
                                    echo"<td>0</td>";
                                }
                                if($col == $taille){
                                    echo "</tr>";
                                }}}
                        break;
                    case 2:
                        $mediane = ($taille + 1)/2;
                        $valeur = 1;
                        //on parcours les colonnes avec le 1er "for" 
                        for($ligne=1; $ligne <= $taille; $ligne++){  
                            echo "<tr>";
                            //on parcours les lignes avec le 2eme "for" 
                            for($col=1; $col<=$taille; $col++){
                                if($ligne == $mediane){
                                    echo "<td>$valeur</td>";
                                    $valeur++;
                                }else {
                                    echo"<td>0</td>";
                                }
                                if($col == $taille){
                                    echo "</tr>";
                                }}}
                        break;
                    case 3:
                        //médiane de haut en bas 
                        $mediane = ($taille + 1)/2;
                        $valeur = 1;
                        //on parcours les colonnes avec le 1er "for" 
                        for($ligne=1; $ligne <= $taille; $ligne++){  
                            echo "<tr>"; // = "commence une nouvelle ligne"

                            //on parcours les lignes avec le 2eme "for" 
                            for($col=1; $col<=$taille; $col++){
                                if($col == $mediane){
                                    echo "<td>$valeur</td>";
                                    $valeur++;
                                }else {
                                    echo"<td>0</td>";
                                }
                                if($col == $taille){
                                    echo "</tr>";
                                }
                            }
                        }
                        break;
                    case 4:
                        //médiane de bas en haut 
                        $mediane = ($taille + 1)/2;
                        $valeur = $taille;
                        //on parcours les colonnes avec le 1er "for" 
                        for($ligne=1; $ligne <= $taille; $ligne++){  
                            echo "<tr>"; // = "commence une nouvelle ligne"

                            //on parcours les lignes avec le 2eme "for" 
                            for($col=1; $col<=$taille; $col++){
                                if($col == $mediane){
                                    echo "<td>$valeur</td>";
                                    $valeur--;
                                }else {
                                    echo"<td>0</td>";
                                }
                                if($col == $taille){
                                    echo "</tr>";
                                }
                            }
                        }
                        break;
                    case 5:
                        //diagonale descendante de gauche à droite
                        $valeur = 1;
                        //on parcours les colonnes avec le 1er "for" 
                        for($ligne=1; $ligne <= $taille; $ligne++){  
                            echo "<tr>"; // = "commence une nouvelle ligne"

                            //on parcours les lignes avec le 2eme "for" 
                            for($col=1; $col<=$taille; $col++){
                                if($col == $ligne){
                                    echo "<td>$valeur</td>";
                                    $valeur++;
                                }else {
                                    echo"<td>0</td>";
                                }
                                if($col == $taille){
                                    echo "</tr>";
                                }
                            }
                        }
                        break;
                    case 6:
                        //Diagonale montante de gauche a droite
                        $valeur = $taille;
                        //on parcours les colonnes avec le 1er "for" 
                        for($ligne=1; $ligne <= $taille; $ligne++){  
                            echo "<tr>"; // = "commence une nouvelle ligne"

                            //on parcours les lignes avec le 2eme "for" 
                            for($col=1; $col<=$taille; $col++){
                                if($col == $valeur){
                                    echo "<td>$valeur</td>";
                                    $valeur--;
                                }else {
                                    echo"<td>0</td>";
                                }
                                if($col == $taille){
                                    echo "</tr>";
                                }
                            }
                        }
                        break;
                    case 7:
                        //Diagonale descendante de droite a gauche
                        $position = $taille;
                        //on parcours les colonnes avec le 1er "for" 
                        for($ligne=1; $ligne <= $taille; $ligne++){  
                            echo "<tr>"; // = "commence une nouvelle ligne"

                            //on parcours les lignes avec le 2eme "for" 
                            for($col=1; $col<=$taille; $col++){
                                if($col == $position){
                                    echo "<td>$valeur</td>";
                                    $valeur++;
                                }else {
                                    echo"<td>0</td>";
                                }
                                if($col == $taille){
                                    echo "</tr>";
                                }
                            }
                        }
                        
                        break;
                    case 8:
                        //Diagonale montante de droite a gauche
                        $valeur = $taille;
                        //on parcours les colonnes avec le 1er "for" 
                        for($ligne=1; $ligne <= $taille; $ligne++){  
                            echo "<tr>"; // = "commence une nouvelle ligne"

                            //on parcours les lignes avec le 2eme "for" 
                            for($col=1; $col<=$taille; $col++){
                                if($col == $ligne){
                                    echo "<td>$valeur</td>";
                                    $valeur--;
                                }else {
                                    echo"<td>0</td>";
                                }
                                if($col == $taille){
                                    echo "</tr>";
                                }
                            }
                        }
                        break;

                }

                echo "</table>";
            }
        }



    ?>
    
</body>
</html>




