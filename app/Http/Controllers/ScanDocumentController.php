<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScanDocumentController  extends Controller {
    //put your code here
    
    public function index(){
        $data = array();
        $data['name'] = 'abc';
	return view('scan_window', compact('data'));
        
    }
}
