<?php
/*

 * api => cbct :  indicates live cb api which is already done for getting 
                    class , subject, chapters, and books listing details 
 * api => scanner : It indicate scanner api which call scanner to scanning purpose. 
                        This api is not secure and not accesible for secured device 
 *                      for that instead of 'http' need to use 'https'.
 *                      Eg. https://192.168.0.217:8087/
 * api =>scanner : It is for live instance call where actual pdf and pdf details is store.
 * 
 * path => images : This is a path for storing temparary image store
 * path => pdf : This is a path for storing temparary image store
 */

return [
    'api' => [
        'cbct' => 'http://cbct.api.com/api/cbct/',
        'scanner' => 'https://192.168.0.217:8087/',
        'scanner_live' => 'http://cbscanner.api.com/'
    ],
    'path' => [
        'images' => $_SERVER['DOCUMENT_ROOT']. '/Scan_images/',
        'pdf' => $_SERVER['DOCUMENT_ROOT']. '/book_pdf/'
    ]
    
];