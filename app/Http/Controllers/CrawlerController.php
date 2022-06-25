<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class CrawlerController extends Controller
{
    public function crawler(Request $request){
        $url = $request->input("url");
        if(filter_var($url, FILTER_VALIDATE_URL))
        {
            
            $this->crawlerWeb($url);
        }
        else
        {
            echo "No it is not url";        
        }
         
    }

    public function crawlerWeb(String $url){
         
        $client = new Client();
        $crawler = $client->request('GET', 'https://phpunit.de/manual/6.5/en/installation.html');        
        $crawler->filter('p a.ulink')->each(function($node) use ($client) {
            $href = $node->attr('href');            
            echo $node->text();
            echo "/";
            echo $href;
            echo "<hr/>";            
        });


         
    }
}
