<?php
    $arrMenu = [
        'index' => [
            "name"  => "Home",   "link"  => "index.php"
        ],
        'about' => [
            "name"  => "About",  
            "link"  => "data/about.php", 
            "child" => [
                'service'   => [ 
                    "name"  => "Service", 
                    "link"  => "service.php",
                    "child" => [
                        'sale'      => ["name" => "Sale", "link" => "sale.php"],
                        'training'  => ["name" => "Training", "link" => "training.php"]
                    ]
                ], 
                'company'   => [
                    "name" => "Company", 
                    "link" => "company.php",
                    "child" => [
                        'toyota' => ["name" => "Toyota","link"   => "toyota.php"]
                    ]]
        ]],
        'contact' => ["name" => "Contact", "link" => "contact.php"]
    ];

    // Yêu cầu: In ra tên của các menu cấp 3
    // Output: Sale Training

    foreach($arrMenu as $key => $value) {
        if(!empty($value['child'])) {
            foreach($value['child'] as $key01 => $value01) {
                if(!empty($value01['child'])) {
                    foreach($value01['child'] as $key02 => $value02) {
                        echo '<pre>';
                        print_r($value02['name']);
                        echo '</pre>';   
                    }
                }
            }
        }            
    }
                // echo '<pre>';
                // print_r($value01['name']);
                // echo '</pre>';    