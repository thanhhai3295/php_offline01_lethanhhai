<?php

    $link = 'http://sjc.com.vn/giavang/textContent.php';
    $html = file_get_contents($link);

    $doc	= new DOMDocument();
    $doc->loadHTML($html);
    
    $xpath	= new DOMXPath($doc);
    ////
    $objNode	= $xpath->query('//td[@class="br bb ylo2_text p12 45555"] | //td[@class="br bb bg_bl white_text"]/span');
    
    
    $i	= 0;
	$result		= array();
	foreach ($objNode as $obj) {
       
       if(count($result) == 4) break;

        $tmp['name']	    = $objNode->item($i+1)->nodeValue;
       $tmp['price-buy']	= $objNode->item($i+2)->nodeValue;
       $tmp['price-sell']	= $objNode->item($i+3)->nodeValue;
        // $tmp['price1'] = $childNodes->item(0)->nodeValue;
        // echo '<pre>';
        // print_r($tmp);
        // echo '</pre>';

		// $tmp['image']	= $objNode->item($i)->getAttribute('src');
		// $tmp['name']	= $objNode->item($i+1)->nodeValue;
		// $tmp['year']	= $objNode->item($i+2)->nodeValue;
		$result[]	= $tmp;
        $i+=3;
    }
    echo '<pre>';
        print_r($result);
        echo '</pre>';
   