<?php
    include 'functions.php';
    $data = file_get_contents(URL_NEWS);
    $data = explode(' ',$data);
    $newsArr = [];
    foreach($data as $key => $value) {
        $linkRSS = trim($value);
        $category = getCategory($linkRSS);
        $xmlData  = file_get_contents($linkRSS);
        $xml        = simplexml_load_string($xmlData, 'SimpleXMLElement', LIBXML_NOCDATA);
        $xmlJson    = json_encode($xml);
        $xmlArr     = json_decode($xmlJson, 1);
        $items   = $xmlArr['channel']['item'];
        $result  = [];

        foreach($items as $item){
        
            $tmp1 = [];
            $tmp2 = [];
    
            preg_match( '/src="([^"]*)"/i', $item['description'], $tmp1 ) ;
            preg_match( '/.*br>(.*)/', $item['description'], $tmp2 ) ;
    
            $result[] = [
                'category' => $category,
                'title'=> $item['title'],
                'description'=> $tmp2[1],
                'pubDate'=> $item['pubDate'],
                'link'=> $item['link'],
                'image'=> $tmp1[1]
            ];
        }
        $newsArr[] = $result;
    }
