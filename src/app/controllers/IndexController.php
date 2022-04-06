<?php
//  require_once ""
 require_once "../vendor/autoload.php";
          
 use GuzzleHttp\Client;
   
use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {      
    
    }

    public function weatherAction()
    {      
        print_r($this->request->getPost());
      
        $url = $this->request->get('search');
        $len = strlen($url);
        for ($i = 0; $i < $len; $i++) {
            if ($url[$i] == ' ') {
                $url[$i] = '+';
            }
        }

        $current = 'http://api.weatherapi.com/v1/search.json?key=0bab7dd1bacc418689b143833220304&q='.$url;
       
        $client = new Client([
            'base_uri' => $current,
        ]);
          
        
        $response = $client->request('GET');
          
          
        $body = $response->getBody();
        $arr_body = json_decode($body,true);
        $this->view->current_var = $arr_body;
    }


    
    public function particularCityAction()
    { 
        // echo "aakash";
        // echo $this->request->getPost('c_name');
        // echo $this->request->getPost('id');
        
    }



    public function currentWeatherAction() {
        $url = $this->request->get('c_name');
        $len = strlen($url);
        for ($i = 0; $i < $len; $i++) {
            if ($url[$i] == ' ') {
                $url[$i] = '+';
            }
        }

        $current = 'http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&q='.$url.'&aqi=yes';


       
        $client = new Client([
            'base_uri' => $current,
        ]);
          
        
        $response = $client->request('GET');
          
          
        $body = $response->getBody();
        $arr_body = json_decode($body,true);

        echo "<pre>";
        print_r($arr_body);
       // die;
        $this->view->current_weather = $arr_body;
    }


    public function forecastAction() {

        $url = $this->request->get('c_name');
        $len = strlen($url);
        for ($i = 0; $i < $len; $i++) {
            if ($url[$i] == ' ') {
                $url[$i] = '_';
            }
        }

        $current = 'http://api.weatherapi.com/v1/forecast.json?key=0bab7dd1bacc418689b143833220304&q='.$url.'&days=1&aqi=yes&alerts=yes';
        echo $current;
     
       
        $client = new Client([
            'base_uri' => $current,
        ]);
          
        
        $response = $client->request('GET');
          
          
        $body = $response->getBody();
        $arr_body = json_decode($body,true);
        $this->view->forecast = $arr_body;
    }
    
    public function timeZoneAction() {
        $url = $this->request->get('c_name');
        $len = strlen($url);
        for ($i = 0; $i < $len; $i++) {
            if ($url[$i] == ' ') {
                $url[$i] = '_';
            }
        }

        $current = 'http://api.weatherapi.com/v1/timezone.json?key=0bab7dd1bacc418689b143833220304&q='.$url;
        $client = new Client([
            'base_uri' => $current,
        ]);      
        $response = $client->request('GET');      
        $body = $response->getBody();
        $arr_body = json_decode($body,true);
        $this->view->timeZone = $arr_body;
    }

    public function sportsAction() {
        $url = $this->request->get('c_name');
        $len = strlen($url);
        for ($i = 0; $i < $len; $i++) {
            if ($url[$i] == ' ') {
                $url[$i] = '_';
            }
        }

        $current = 'http://api.weatherapi.com/v1/sports.json?key=0bab7dd1bacc418689b143833220304&q='.$url;
        $client = new Client([
            'base_uri' => $current,
        ]);      
        $response = $client->request('GET');      
        $body = $response->getBody();
        $arr_body = json_decode($body,true);
        $this->view->sports = $arr_body;
    }
}