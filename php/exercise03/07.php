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
    $CurrentMenu = 'training';
    $arrBreadCrumb = [];
    foreach($arrMenu as $keyLevelOne => $menuLevelOne){
        $arrBreadCrumb[$keyLevelOne][] = $menuLevelOne['name'];
        if(isset($menuLevelOne['child'])) {
            foreach($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo){
                $arrBreadCrumb[$keyLevelTwo][] = $menuLevelOne['name'];
                $arrBreadCrumb[$keyLevelTwo][] = $menuLevelTwo['name'];
                if(isset($menuLevelTwo['child'])) {
                    foreach($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
                        $arrBreadCrumb[$keyLevelThree][] = $menuLevelOne['name'];
                        $arrBreadCrumb[$keyLevelThree][] = $menuLevelTwo['name'];
                        $arrBreadCrumb[$keyLevelThree][] = $menuLevelThree['name'];
                    }
                }
            }
        }
    }
    $breadCrumb = $arrBreadCrumb[$CurrentMenu];
    echo '<pre>';
    print_r($breadCrumb);
    echo '</pre>';