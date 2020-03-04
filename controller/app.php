<?php

namespace App\Controller;

date_default_timezone_set('Europe/Paris');

use App\model\iCal;

require('../model/iCal.php');
class App
{
    static function getCours($dateD, $dateF, $group)
    {



        /* récupération de l'edt selon le groupe */

        switch ($group) {

            case "A1":
                $file = 'https://planning.univ-rennes1.fr/jsp/custom/modules/plannings/cal.jsp?data=0481c6ca07c025ce0a386051beedbcd94592592d3b282f749c9a606b710f264fdc5c094f7d1a811b903031bde802c7f5e54964899722db94b0ff751c9443f9d4723416c69cbfb4467f2b5a962c28bc66166c54e36382c1aa3eb0ff5cb8980cdb,1';
                break;
            case "A2":
                $file = 'https://planning.univ-rennes1.fr/jsp/custom/modules/plannings/cal.jsp?data=16e8d079b0eb6273942c819e7293dd5c4592592d3b282f749c9a606b710f264fdc5c094f7d1a811b903031bde802c7f5e54964899722db94b0ff751c9443f9d4723416c69cbfb4467f2b5a962c28bc66166c54e36382c1aa3eb0ff5cb8980cdb,1';
                break;
            case "B1":
                $file = 'https://planning.univ-rennes1.fr/jsp/custom/modules/plannings/cal.jsp?data=9d1d60c0045382b0c8f807c8b3e337774592592d3b282f749c9a606b710f264fdc5c094f7d1a811b903031bde802c7f5e54964899722db94b0ff751c9443f9d4723416c69cbfb4467f2b5a962c28bc66166c54e36382c1aa3eb0ff5cb8980cdb,1';
                break;
            case "B2":
                $file = 'https://planning.univ-rennes1.fr/jsp/custom/modules/plannings/cal.jsp?data=ce0dcb41bb4c24770d25eec34b84504c4592592d3b282f749c9a606b710f264fdc5c094f7d1a811b903031bde802c7f5e54964899722db94b0ff751c9443f9d4723416c69cbfb4467f2b5a962c28bc66166c54e36382c1aa3eb0ff5cb8980cdb,1';
                break;
            case "C1":
                $file = 'https://planning.univ-rennes1.fr/jsp/custom/modules/plannings/cal.jsp?data=a28a0381209601cb674159658f2902b94592592d3b282f749c9a606b710f264fdc5c094f7d1a811b903031bde802c7f5e54964899722db94b0ff751c9443f9d4723416c69cbfb4467f2b5a962c28bc66166c54e36382c1aa3eb0ff5cb8980cdb,1';
                break;
            case "C2":
                $file = 'https://planning.univ-rennes1.fr/jsp/custom/modules/plannings/cal.jsp?data=9d99cb8b5d802687cabf19f0bd07c1944592592d3b282f749c9a606b710f264fdc5c094f7d1a811b903031bde802c7f5e54964899722db94b0ff751c9443f9d4723416c69cbfb4467f2b5a962c28bc66166c54e36382c1aa3eb0ff5cb8980cdb,1';
                break;
            case "D1":
                $file = 'https://planning.univ-rennes1.fr/jsp/custom/modules/plannings/cal.jsp?data=85363b639d975562ccc5baa6718dbf3a4592592d3b282f749c9a606b710f264fdc5c094f7d1a811b903031bde802c7f5e54964899722db94b0ff751c9443f9d4723416c69cbfb4467f2b5a962c28bc66166c54e36382c1aa3eb0ff5cb8980cdb,1';
                break;

            case "D2":
                $file = 'https://planning.univ-rennes1.fr/jsp/custom/modules/plannings/cal.jsp?data=f08c24931720afcf0b0a49443f0cfa444592592d3b282f749c9a606b710f264fdc5c094f7d1a811b903031bde802c7f5e54964899722db94b0ff751c9443f9d4723416c69cbfb4467f2b5a962c28bc66166c54e36382c1aa3eb0ff5cb8980cdb,1';
                break;
            default:
                $file = 'https://planning.univ-rennes1.fr/jsp/custom/modules/plannings/cal.jsp?data=85363b639d975562ccc5baa6718dbf3a4592592d3b282f749c9a606b710f264fdc5c094f7d1a811b903031bde802c7f5e54964899722db94b0ff751c9443f9d4723416c69cbfb4467f2b5a962c28bc66166c54e36382c1aa3eb0ff5cb8980cdb,1';
        }

        $iCal = new iCal($file);

        $events = $iCal->eventsByDateBetween($dateD, $dateF);

        $cours = array();
        foreach ($events as $date => $events) {
            $cours[$date] = array();
            foreach ($events as $event) {

                $dateStart = strtotime($event->dateStart());
                $dateEnd = strtotime($event->dateEnd());
                /* création des tableaux */
                $cours[$date][] = array(
                    "date" => $date,
                    "nom" => $event->title(),
                    "description" => $event->description(),
                    "debut" => date('H:i', $dateStart),
                    "fin" => date('H:i', $dateEnd),
                    "salle" => $event->location(),
                    'jour' => date('l j', $dateEnd)
                );

                //print_r($events->events());

            }
        }
        return $cours;
    }
}
