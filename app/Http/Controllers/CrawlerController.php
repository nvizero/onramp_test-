<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class CrawlerController extends Controller
{
         
    public string $baseUrl ; 
    
    /**
     * filter url 
     */
    public function setBaseUrl(Array $filter){        
        $this->baseUrl = $filter["scheme"]."://".$filter["host"];
    }

    /**
     * main service
     */
    public function crawler(Request $request){
        $url = $request->input("url");
        if(filter_var($url, FILTER_VALIDATE_URL))
        {                           
            $filter = parse_url($url);
            $this->setBaseUrl($filter);            
            $this->crawlerWeb($url);
        }
        else
        {
            echo "No it is not url";        
        }
         
    }

    /**
     * crawler main page
     */
    public function crawlerWeb(String $url){         
        $client = new Client();
        $crawler = $client->request('GET', $url);        
        BrowsershotController::Screenshot($url ,"main_page" );        
        $crawler->filter('div.news_textBox')->each(function($node) use ($client, $url) {            
            
            $description =$node->filter('div.news_itemCon p')->text();
            echo $title = $node->filter('div.news_itemsub')->text();
            echo "<br>";
            $href = $node->filter('a')->attr('href');
            echo $detailUrl =  $this->baseUrl.$href;
            echo "<br>";
            echo $created_at= $node->filter('div.title_time')->text();
            echo "<br>";
            echo $description; 
            echo "<br>";
            echo "<hr/>";
            if(strlen($description)>10){
                $this->detailPage($detailUrl); 
            }
            
        });         
    }

    /**
     * crawler detail page
     */
    public function detailPage(String $url){
        $filter = parse_url($url);
        $str =explode("/",$filter["path"]);
        $fileName ="_".$str[1]."_".$str[2];
        $client = new Client();
        $crawler = $client->request('GET', $url);  
        BrowsershotController::Screenshot($url , $fileName);

        $crawler->filter('.container')->each(function($node) use ($url ,$client) {
            echo $url;
            echo $title = $node->filter('div.title')->text(); 
            echo $node->filter('div.title_time')->text(); 
            echo $node->filter('div.intro')->text();              
            echo "Detail";
                                
            echo "<hr/>";            
        });
    }
}
