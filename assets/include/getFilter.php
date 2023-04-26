<?php

session_start();

include_once('include/connexion.php');

if(isset($_POST['request']))
{
    $request = $_POST['request'];
    $datedebut = dateToHTML($request);
    $fin = $_POST['fin'];
    $datefin = dateToHTML($fin);

    if($_REQUEST["id_intervenant"] != "" || $_REQUEST["id_intervenant2"] != "")
    {
        if($_REQUEST['choixDate'] == "year" || $_REQUEST['choixDate'] == "year2" || $_REQUEST['choixDate'] == "year3")
        {

            $montant = mysqli_query("SELECT MONTH(DATE_FACTURE) AS MOIS, ID_CLIENT, LIBELLE_CLIENT, SUM(MONTANT_FACTURE) AS montant_total   
            FROM FACTURE 
            WHERE DATE_FACTURE >= '".$datedebut."' AND DATE_FACTURE <= '".$datefin."'  AND ID_CLIENT = '".$_REQUEST["id_intervenant"]."' 
            GROUP BY MONTH(DATE_FACTURE), LIBELLE_CLIENT, ID_CLIENT
            ORDER BY MONTH(DATE_FACTURE)");
            $montant2 = mysqli_query("SELECT MONTH(DATE_FACTURE) AS MOIS, ID_CLIENT, LIBELLE_CLIENT, SUM(MONTANT_FACTURE) AS montant_total   
            FROM FACTURE 
            WHERE DATE_FACTURE >= '".$datedebut."' AND DATE_FACTURE <= '".$datefin."'  AND ID_CLIENT = '".$_REQUEST["id_intervenant2"]."' 
            GROUP BY MONTH(DATE_FACTURE), LIBELLE_CLIENT, ID_CLIENT
            ORDER BY MONTH(DATE_FACTURE)");

        }
        else
        {
            $montant = mysqli_query("SELECT DATE_FACTURE AS MOIS, ID_CLIENT, LIBELLE_CLIENT, SUM(MONTANT_FACTURE) AS montant_total   
            FROM FACTURE 
            WHERE DATE_FACTURE >= '".$datedebut."' AND DATE_FACTURE <= '".$datefin."'  AND ID_CLIENT='".$_REQUEST["id_intervenant"]."'
            GROUP BY DATE_FACTURE, LIBELLE_CLIENT, ID_CLIENT
            ORDER BY DATE_FACTURE");
            $montant2 = mysqli_query("SELECT DATE_FACTURE AS MOIS, ID_CLIENT, LIBELLE_CLIENT, SUM(MONTANT_FACTURE) AS montant_total   
            FROM FACTURE 
            WHERE DATE_FACTURE >= '".$datedebut."' AND DATE_FACTURE <= '".$datefin."'  AND ID_CLIENT='".$_REQUEST["id_intervenant2"]."'
            GROUP BY DATE_FACTURE, LIBELLE_CLIENT, ID_CLIENT
            ORDER BY DATE_FACTURE");
        }
    }


    $labels = "";
    $data = "";
    $data2 = "";
    $date = "";


    while($rowMontant = mysqli_fetch_assoc($montant)){

        switch($rowMontant['MOIS']){
            case 1:
                $rowMontant['MOIS'] = 'Janvier';
                break;
            case 2:
                $rowMontant['MOIS'] = 'Fevrier';
                break;
            case 3:
                $rowMontant['MOIS'] = 'Mars';
                break;
            case 4:
                $rowMontant['MOIS'] = 'Avril';
                break;
            case 5:
                $rowMontant['MOIS'] = 'Mai';
                break;
            case 6:
                $rowMontant['MOIS'] = 'Juin';
                break;
            case 7:
                $rowMontant['MOIS'] = 'Juillet';
                break;
            case 8:
                $rowMontant['MOIS'] = 'Aout';
                break;
            case 9:
                $rowMontant['MOIS'] = 'Septembre';
                break;
            case 10:
                $rowMontant['MOIS'] = 'Octobre';
                break;
            case 11:
                $rowMontant['MOIS'] = 'Novembre';
                break;
            case 12:
                $rowMontant['MOIS'] = 'Decembre';
                break;

        }

        if($labels != ""){
            $labels .= "|";
        }
        if($data != ""){
            $data .= "|";
        }
        if($data2 != ""){
            $data2 .= "|";
        }
        if($date != ""){
            $date .= "|";
        }
        $labels .= "".trim($rowMontant["LIBELLE_CLIENT"])."";
        $data .= "".trim($rowMontant['montant_total'])."";
        $date .= "".trim($rowMontant['MOIS'])."";

    }
    while($rowMontant2 = mysqli_fetch_assoc($montant2)){

        switch($rowMontant2['MOIS']){
            case 1:
                $rowMontant2['MOIS'] = 'Janvier';
                break;
            case 2:
                $rowMontant2['MOIS'] = 'Fevrier';
                break;
            case 3:
                $rowMontant2['MOIS'] = 'Mars';
                break;
            case 4:
                $rowMontant2['MOIS'] = 'Avril';
                break;
            case 5:
                $rowMontant2['MOIS'] = 'Mai';
                break;
            case 6:
                $rowMontant2['MOIS'] = 'Juin';
                break;
            case 7:
                $rowMontant2['MOIS'] = 'Juillet';
                break;
            case 8:
                $rowMontant2['MOIS'] = 'Aout';
                break;
            case 9:
                $rowMontant2['MOIS'] = 'Septembre';
                break;
            case 10:
                $rowMontant2['MOIS'] = 'Octobre';
                break;
            case 11:
                $rowMontant2['MOIS'] = 'Novembre';
                break;
            case 12:
                $rowMontant2['MOIS'] = 'Decembre';
                break;

        }

        if($labels != ""){
            $labels .= "|";
        }
        if($data != ""){
            $data .= "|";
        }
        if($data != ""){
            $data2 .= "|";
        }
        if($date != ""){
            $date .= "|";
        }
        $labels .= "".trim($rowMontant2["LIBELLE_CLIENT"])."";
        $data2 .= "".trim($rowMontant2['montant_total'])."";
        $date .= "".trim($rowMontant2['MOIS'])."";

    }


    echo $data;
    echo ';';
    echo $data2;
    echo ';';
    echo $labels;
    echo ';';
    echo $date;

}
?>