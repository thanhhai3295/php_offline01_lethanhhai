<?php
    $arrMenu = [
        'index' => [
            "name"  => "Home",   "link"  => "index.php"
        ],
        'about' => [
            "name"  => "About",  
            "link"  => "about.php", 
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
    $path = $_SERVER["PHP_SELF"];
    $menuCurrent = basename($path, ".php"); 
    $arrBreadCrumb = [];
    foreach($arrMenu as $keyLevelOne => $menuLevelOne) {
        $arrBreadCrumb[$keyLevelOne][] = ['link' => $menuLevelOne['link'],'name' => $menuLevelOne['name']];
        if (isset($menuLevelOne['child'])) {
            foreach($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
                $arrBreadCrumb[$keyLevelTwo][] = ['link' => $menuLevelOne['link'],'name' => $menuLevelOne['name']];
                $arrBreadCrumb[$keyLevelTwo][] = ['link' => $menuLevelTwo['link'],'name' => $menuLevelTwo['name']];
                if (isset($menuLevelTwo['child'])) {
                    foreach($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
                        $arrBreadCrumb[$keyLevelThree][] = ['link' => $menuLevelOne['link'],'name' => $menuLevelOne['name']];
                        $arrBreadCrumb[$keyLevelThree][] = ['link' => $menuLevelTwo['link'],'name' => $menuLevelTwo['name']];
                        $arrBreadCrumb[$keyLevelThree][] = ['link' => $menuLevelThree['link'],'name' => $menuLevelThree['name']];
                    }
                }
            }
        }
    }
    
    $currentBreadCrumb = $arrBreadCrumb[$menuCurrent];
?>