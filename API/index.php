<?php
require 'services/validurl.php';

$checkurl = new validurl();

$datas_url = $checkurl->get_url_datas();
    
if( $datas_url )
{

    require 'services/db.php';


    $mysqli = db::connect();


    //connexion à la base de données


    //echo "exemple du format de données JSON : ";
    //exemple du format de données
    //$datas = [ 'Commerces' => [ [ '1', 'Boutique eco' ], [ '2', 'Restaurant eco' ] ] ];
    //transformation en JSON de l'exemple de données
    //echo json_encode( $datas );
    //echo "<br>";

    //création du formatage des données selon exemple
    $datas = array();

    if( $datas_url === 'pays' )
    {
        //Requête pour trouver tous les pays par ID croissant
        $res = $mysqli->query("SELECT * FROM countries ORDER BY id_countries ASC");
        $res->data_seek(0);

        while ($row = $res->fetch_assoc()) {

            $datas['Pays'][] = array( 
                $row['id_countries'], 
                utf8_encode( $row['country_name'] ),
                $row['country_code'],
                $row['country_latitude'],
                $row['country_longitude'] 
            );
        }
    }

    //var_dump( $datas );
    echo json_encode( $datas );

    
    /*
    $var = array( 'Pays' => array( 'Nom' ) )

    $var['Pays']['Nom'][0] = array('Long' =>'Suisse', 'court' => 'CH');
    $var['Pays']['Nom'][1] = array('Long' =>'Suisse', 'court' => 'CH');
        */
    /*

    while ($row = $res->fetch_assoc()) {
        $pays[$i] = $row['id_countries'].','.$row['country_name'].','.$row['country_code'].','.$row['country_latitude'].','.$row['country_longitude'];
        $requete1 .= json_encode( $pays[$i] );
        $i++;
    }


    $datas = array('Pays' => array(

                array('1', 'France', '46.603354', '1.888334'),
                array('2', 'Suisse','47.141631', '9.553153'),
        )
    );



    $ydonnees = array(); // ok
    while ($row = mysql_fetch_assoc($sql)) // moi je fais comme ca un mysql_fetch_*
        $ydonnees[] = $row['nb']; //

    TESTS
          while ($row = $res->fetch_assoc()) {
                array('id', 'France'),
            }


            while ($row = $res->fetch_assoc()) {
                $id = $row['id_countries'];
                $tableau[$id] = $row['country_name'];
            }

    $datas = "['Pays' => [";

    while ($row = $res->fetch_assoc()) {

        $datas .=  "[ '" . $row['id_countries'] . "'," . $row['country_name'] . "'," . $row['country_code'] . "'," . $row['country_latitude'] . "'," . $row['country_longitude']. "],";

    }

    $datas .= "] ]"; */
}
?>