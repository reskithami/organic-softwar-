
<div class="sheduler_calendar">
    <div class="calendar">
        <div class="month">
          <h1><?php echo $month . ' ' . $year;?></h1>
        </div>
<?php

$arraybooked = false;

if($date_book)
{
    foreach ($date_book as $booked)
    {
        $day = date('j',  strtotime($booked->start_date));
        $arraybooked[$day][] = array($booked->first_name,$booked->last_name,$booked->start_date,$booked->end_date);
    }
}
/*

######################################################
#   Calendrier PHP par nounou                        #
#   Source écrite avec PHP 4.2                       #
#   Email : superbounou@yahoo.fr                     #
#   Script utilisé dans la version 1.1 de SMartBlog  #
#   Web : http://superbounou.phpnet.org/smartblog/   #
######################################################

*/

function calendrier($mois, $annee, $lang, $arraybooked) //renvoi un calendrier
	{
	//variables
	$ts = mktime(1,1,1,$mois,1,$annee); //Recuperation du timestamp du numero du jour de base cad le numero du jour du premier jour du mois ouf !
	$tab = getdate($ts); //Recuperation du numero du jour de base, le numero du jour du premier jour du mois
	$j = 1 ; //premier jour 	
	$nbjour = date('t',$ts) ;//nombre de jour dans le mois
	$nom_mois = array($lang->line('cal_january'),$lang->line('cal_february'),$lang->line('cal_march'),
            $lang->line('cal_april'),$lang->line('cal_mayl'),$lang->line('cal_june'),$lang->line('cal_july'),
            $lang->line('cal_august'),$lang->line('cal_september'),$lang->line('cal_october'),$lang->line('cal_november'),
            $lang->line('cal_december'));//Nom des moins in French
	//cette sequence corrige le numero du dimanche. PHP donne 0, dans notre cas 7 est préférable, donc..
	if($tab['wday'] == 0)
		{
		$dp = 7 ;
		}
		else
		{
		$dp = $tab['wday'] ;
		}
	//Affichage de l'entête du calendrier	
	$calandrier =  '
    <div class="day-name cf">
      <div class="col">' . $lang->line('cal_mo') . '</div>
      <div class="col">' . $lang->line('cal_tu') . '</div>
      <div class="col">' . $lang->line('cal_we') . '</div>
      <div class="col">' . $lang->line('cal_th') . '</div>
      <div class="col">' . $lang->line('cal_fr') . '</div>
      <div class="col">' . $lang->line('cal_sa') . '</div>
      <div class="col">' . $lang->line('cal_su') . '</div>
    </div>
    <div class="day-number cf">
        ';
	//Affichage du calendrier
	for($i=1;$i<=42;$i++)
		{
		
		if(($dp <= $i)&&($j <= $nbjour))//si nous sommes apres le numero du premier jour et que nous n avons pas
			{ //passé le 30 ou 31 
                            
                            if($arraybooked && ! empty($arraybooked[$j]))
                            {
//                                foreach ($arraybooked as $booked)
//                                {
//                                }
                                $calandrier .=  '<div class="col active">' . $j . '</div>' ; //on affiche avec le rond
                            }
                            else
                            {
                                $calandrier .=  '<div class="col">' . $j . '</div>' ; //on affiche
                            }
                            $j++;
			} 
			else
			{
                            $calandrier .=  '<div class="col empty"></div>'; //sinon case vide
			}
	
		}
		$calandrier .=  '
    </div>'; //affichage de la fin du tableau
		
		//calcul des positions des mois
		if($mois == 12)
                    {
                        $prochain_mois  = 1 ;
                        $prochaine_annee = $annee + 1 ;
                        $precedent_mois = $mois - 1 ;
                        $precedente_annee = $annee ;
                    }
                    elseif($mois == 1)
                    {
                        $prochain_mois  = $mois + 1  ;
                        $prochaine_annee = $annee ;
                        $precedent_mois = 12 ;
                        $precedente_annee = $annee - 1 ;
                    }
                    else
                    {
                        $prochain_mois  = $mois + 1  ;
                        $prochaine_annee = $annee ;
                        $precedent_mois = $mois - 1 ;
                        $precedente_annee = $annee ;
                    }

		//barre de navigation	
		printf("<a href=\"/%s/%s\" class=\"prev\"><< </a> %s <a href=\"/%s/%s\" class=\"next\"> >></a>",$precedent_mois,$precedente_annee,$nom_mois[$mois-1],$prochain_mois,$prochaine_annee);
                return $calandrier;
	} //Fin fonction
	
echo calendrier($month, $year, $this->lang, $arraybooked);
?>
    </div>
    <div class="calendar detail_calendar">
        <?php
    if($arraybooked)
    {
        foreach ($arraybooked as $day => $booked)
        {
            echo ' 
        <div class="detail_calendar_day detail_calendar_day' . $day .'">
            <h4> ' . $day . ' ' . $month . ' ' . $year . '</h4>';
            foreach ($booked as $detail)
            {
                echo ' 
            <div class="detail_calendar_cours">'.
                    date('H:i', strtotime($detail[2])) . ' - ' . date('H:i', strtotime($detail[3])) . ' ' .$detail[0] . ' ' . $detail[1];
            
                echo ' 
            </div>
            ';
            }
             echo ' 
        </div>';
        }
    }
        ?>
    </div>
</div>