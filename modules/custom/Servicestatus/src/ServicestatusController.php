<?php
/**
 * @file
 * Contains \Drupal\Servicestatus\Controller\ServicestatusController.
 */

namespace Drupal\Servicestatus\Controller;



use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Core\Link;
use Drupal\Core\Url;    


class ServicestatusController extends ControllerBase {
  public function content() {
    return array(
        '#markup' => '' . t('Hello there, how are you!') . '',
    );
  }

 public function getStatusDetails($service = NULL, $line = NULL) {
    $output = '<div id="status_display">';

   if ($service != "subway" && $service != "LIRR" && $service != "MetroNorth" && $service != "bus" && $service != "BT")
        $output .= 'Invalid input.</div>';
    else 
    {
        $json_str = $this->getStatusAsJSON();
        $json = json_decode($json_str, TRUE);

        $detailed_message = "";

        if (isset($json[$service]["line"])) 
        {
            $data = $json[$service]["line"];
            
            $found = FALSE;

            foreach ($data as $index){
                if (!$found) {
                    foreach($index as $value){
                        $line_n = $index['name'];

                        if ($service != "subway") {
                            $line_n = str_replace(' ', '', $line_n);
                            $line_n = str_replace('.', '', $line_n);
                        }

                        if ($line_n == $line){
                            if ($service == "LIRR" || $service == "MetroNorth")
                                $detailed_message = $this->generateRailHeading($line_n);

                            if (empty($index['text']))
                                $detailed_message .= "The Service Status has changed. Please go back to the MTA home page for latest status.";
                            else
                                $detailed_message .= $index['text'];                                 
                            
                            $found = TRUE;
                        }

                        if ($found)
                            break;                               
                    }
                } else
                    break;
            }
        }
        else
            $detailed_message .= "Couldn't retrieve Service Status Details due to a technical problem.";
        
        // dsm ($json);
        $output .= $detailed_message . '</div>';
       
    }

    // Run through MTA input filter to translate tokens to images
    $filteredhtml = check_markup($output, 'full_html'); */
 
    $build = array(
      '#markup' =>  $filteredhtml
    );
    return $build;
}

public function getStatusAsJSON($rand = NULL)
{
    $response = new Response();
    $filePath = "./sites/default/files/servicestatus/servicestatus.xml";
    $lastUpdate = filemtime($filePath);
    if(time() - $lastUpdate < 60)
     {
     $fileContents= file_get_contents($filePath);
     }
     else
     {
   //$fileContents= file_get_contents($filePath);
     $fileContents= file_get_contents("http://gms.mtanyct.info/GMS/GMSFeedsService/feeds/servicestatus.xml");
     $file = fopen($filePath,"w");
     fwrite($file,$fileContents);
     fclose($file);
     }


  
    $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
    $fileContents = trim(str_replace('"', "'", $fileContents));
    $simpleXml = simplexml_load_string($fileContents);
    $json = json_encode($simpleXml);
    $response->setContent($json);
    $response->headers->set('Content-Type', 'application/json');
    // drupal_json_output($json);
    return $response;
}

public function generateRailHeading($line)
{
    switch ($line) {
        // LIRR
        case "Babylon":
            $linename = "Babylon Branch Customers";
            $color = "#00985F";
            break;
        case "CityTerminalZone":
            $linename = "City Terminal Zone Branch Customers";
            $color = "#4D5357";
            break;
        case "FarRockaway":
            $linename = "Far Rockaway Branch Customers";
            $color = "#6E3219";
            break;                
        case "Hempstead":
            $linename = "Hempstead Branch Customers";
            $color = "#CE8E00";
            break;
        case "LongBeach":
            $linename = "Long Beach Branch Customers";
            $color = "#FF6319";
            break;
        case "Montauk":
            $linename = "Montauk Branch Customers";
            $color = "#006983";
            break;
        case "OysterBay":
            $linename = "Oyster Bay Branch Customers";
            $color = "#00AF3F";
            break;
        case "PortJefferson":
            $linename = "Port Jefferson Branch Customers";
            $color = "#0039A6";
            break;
        case "PortWashington":
            $linename = "Port Washington Branch Customers";
            $color = "#C60C30";
            break;
        case "Ronkonkoma":
            $linename = "Ronkonkoma Branch Customers";
            $color = "#A626AA";
            break;
        case "WestHempstead":
            $linename = "West Hempstead Branch Customers";
            $color = "#00A1DE";
            break;
        // MNR
        case "Hudson":
            $linename = "Hudson Line Customers";
            $color = "#009B3A";
            break;
        case "Harlem":
            $linename = "Harlem Line Customers";
            $color = "#0039A6";
            break;
        case "Wassaic":
            $linename = "Wassaic Line Customers";
            $color = "#0039A6";
            break;                
        case "NewHaven":
            $linename = "New Haven Line Customers";
            $color = "#EE0034";
            break;
        case "NewCanaan":
            $linename = "New Canaan Line Customers";
            $color = "#EE0034";
            break;
        case "Danbury":
            $linename = "Danbury Line Customers";
            $color = "#EE0034";
            break;
        case "Waterbury":
            $linename = "Waterbury Line Customers";
            $color = "#EE0034";
            break;
        case "PascackValley":
            $linename = "Pascack Valley Line Customers";
            $color = "#8E258D";
            break;
        case "PortJervis":
            $linename = "Port Jervis Line Customers";
            $color = "#FF7900";
            break;
    }

    $heading = '<span style="color:' . $color . ';font-size:large;font-weight:bold">' . $linename . '</span><br/>';

    return $heading;
}
 

}