<?php 
require __DIR__ . '/../connexion/connexiondb.php';

class iles{

    public function showIles(){

        global $conn;

        $req_listiles = "SELECT * from `iles`" ; //$sql : contient la requete sql 
        $select_iles = $conn->query($req_listiles); //$result : execute la requete $sql

        return $select_iles;
    }

    public function getIles($ile){
        
        global $conn;

        $req_listiles = "SELECT v.name FROM `iles_villes` as iv left join `iles` as i on iv.fk_iles = i.id left join `villes` as v on iv.fk_villes = v.id WHERE i.name = '".$ile."'";
        $ville = $conn->query($req_listiles); //$result : execute la requete $sql
        // $ile_ville = json_encode($ile_ville);


        foreach ($ville as $value) {
            $island['data'][] = $value['name'];
        }

        return json_encode($island);

    }
}