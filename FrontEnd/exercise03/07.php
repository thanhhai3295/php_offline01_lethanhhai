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

    // Yêu cầu: In ra đường đi đến Menu Training
    // Output: Home > About > Service > Training
    $breadcrumb = '';
    foreach($arrMenu as $key => $value) {
        if ($key != 'contact') {
            $breadcrumb .= $value['name']. ' > ';
            if(!empty($value['child']) ){
                foreach($value['child'] as $key01 => $value01) {
                    if($key01 == 'service') {
                        $breadcrumb .= $value01['name']. ' > ';
                        if(!empty($value01['child']) ){
                            foreach($value01['child'] as $key02 => $value02) {
                                if($key02 == 'training') {
                                    $breadcrumb .= $value02['name'];
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    echo $breadcrumb;