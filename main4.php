<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Premiers tests du CSS</title>
</head>

<body>
    <header>
        <h1>C o m p a g n i e A t l a n t i k</h1>
    </header>
    <main>
        <div class="padding">
            <?php 
            $bdd = mysqli_connect('172.28.100.3', 'mviougea', 'elini01', 'mviougea_atlantik');
            if (!$bdd) {
                die("error");
            } else {    
                //echo "connexion réussie";
            }

            $numeroTraversée=$_POST['traversee'];

            $txtInfo = "SELECT libelleTraversée, numeroTraversée, dateTraversée, heureTraversée FROM traversée WHERE numeroTraversée='" . $numeroTraversée . "'";
            $reqInfo = mysqli_query($bdd, $txtInfo);
            $donnees = mysqli_fetch_array($reqInfo);

            echo "Liaison ".$donnees['libelleTraversée']; ?><br><?php
            echo "Traversée n°".$donnees['numeroTraversée']." le ".$donnees['dateTraversée']." à ".$donnees['heureTraversée']; ?><br>
            Saisir les informations relative à la réservation<br>
            Nom <input type="text" id="" name="" required size="10"><br>
            Adresse <input type="text" id="" name="" required size="20"><br>
            CP <input type="text" id="" name="" required size="10"> Ville <input type="text" id="" name="" required size="10">
            
            <table>
                <tr>
                    <td></td>
                    <td>Tarif en €</td>
                    <td>Qu</td>
                </tr>
                <tr><?php        
                    //j'obtiens les typeCategorie de la categorie
                    $txtReqCodeTypeCategorie = "SELECT CodeTypeCategorie, libelleTypeCategorie FROM typeCategorie";
                    $resCategorie = mysqli_query($bdd, $txtReqCodeTypeCategorie);
                    //pour chaque typeCategorie de la categorie
                    while ($tabCateg = mysqli_fetch_array($resCategorie)) {
                    ?>
                        <td>
                            <!-- j'affiche le typeCategorie -->
                            <?= $tabCateg["libelleTypeCategorie"] ?>
                        </td>
                        <?php
                        //j'obtiens les tarifs pour le typeCategorie
                        $txtReqTarifs = "SELECT prix FROM Tarif WHERE codeTypeCategorie='" . $tabCateg["CodeTypeCategorie"] . "' AND codeLiaison='15' AND numeroperiode='2'";
                        $resReqTarifs = mysqli_query($bdd, $txtReqTarifs);
                        //pour chaque tarif du typeCategorie
                        while ($tabTarifs = mysqli_fetch_array($resReqTarifs)) {
                        ?>
                            <td>
                                <!-- j'affiche le tarif -->
                                <?= $tabTarifs["prix"] ?>
                            </td>
                            
                    <?php
                        }
                        ?><td><input type="text" id="" name="" required size="10"></td></tr><?php
                    } //fin du pour chaque tarif
                    ?>
                </tr>
            </table>

        </div>
    </main>
</body>

</html>