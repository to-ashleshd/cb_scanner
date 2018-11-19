<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Config;
class ScanTaskController extends Controller {

    //index function 
    public function index() {
        $data = array();
        
        # get all class list from live CB database from cbct api.
        $cbct_api = Config::get('constants.api.cbct');
        
        $res = Curl::to($cbct_api.'classes')->get();

        $response = json_decode($res, true);
        // echo "<pre>";
        // print_r($response); exit;
        
        $classes = array();
        if($response['status'] == 200){
            $classes = $response['data']['classes'];
        }
        return view('scan_window', compact('data', 'classes'));
    }
    
    public function getClassSubjects($class_id) {
        $data = array();
        
        # get all class list from live CB database from cbct api.
        $cbct_api = Config::get('constants.api.cbct');
        
        $res = Curl::to($cbct_api.'subjects/'.$class_id.'/class')->get();

        $response = json_decode($res);
        //print_r($response);
        $subjects = array();
        if($response->code == 200){
            $subjects = $response->data->map_subject_class;
        }
        return view('load_subjects', compact('subjects'));
    }
    
    public function getClassSubjectBooks(Request $request) {
        $data = array();
        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
        
        # get all class list from live CB database from cbct api.
        $cbct_api = Config::get('constants.api.cbct');
        
        $res = Curl::to($cbct_api.'books/'.$class_id.'/classes/'.$subject_id.'/subjects')->get();

        $response = json_decode($res);

        $books = array();
        if($response->code == 200){
            $books = $response->data->books;
        }
        return view('load_books', compact('books'));
    }
    
    public function ScanDocument (Request $request) {
        $data = array();
        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
        $book_id = $request->book_id;
        
        echo $class_id.$subject_id.$book_id;
        
        # get all class list from live CB database from cbct api.
        $cbct_api = Config::get('constants.api.scanner');
        
        $res = Curl::to($cbct_api."/multiple-scan")->get();

        $response = json_decode($res);

        $books = array();
        if($response->code == 200){
            $books = $response->data->books;
        }
    }
}
