<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller\Api;
use App\Scan_details_live;

class ScanTaskcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        echo 'here i am in index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        
        $details = $request->input('Scan_details');
        $pdf = $request->input('pdf');

        $temp_path = $_SERVER['DOCUMENT_ROOT'].'/book_pdf/';
        $class_id = $details['standard_id'];
        $subject_id = $details['subject_id'];
        $book_id = $details['book_id'];
        $chapter_id = $details['chapter_id'];
        $pdf_number = $details['pdf_number']; 
        /*$class_path = $temp_path.$class_id."/";
        $subject_path = $temp_path.$class_id."/".$subject_id."/";
        $book_path = $temp_path.$class_id."/".$subject_id."/".$book_id."/";*/
        $chapter_path = $temp_path.$class_id."/".$subject_id."/".$book_id."/"."$chapter_id";
        
        $pdf_path = $_SERVER['HTTP_HOST']."/book_pdf/".$class_id."/".$subject_id."/".$book_id."/".$chapter_id."/";
        
        if(!empty($details) && !empty($pdf)){
            if (!file_exists($chapter_path)) {mkdir($chapter_path, 0777, true);}
            $pdf_name = $chapter_id.'_('.$pdf_number.')_'.date('Y_m_d_H_i_s').'.pdf';
            $temp_file_name = $chapter_path. '/'.$pdf_name;
            $res = file_put_contents($temp_file_name, base64_decode($pdf));
			
            if($res){
                $details['pdf_name'] = $pdf_name;
                $details['pdf_path'] = $pdf_path;
                
                $scan_details = Scan_details_live::create($details);
                
                $response['code']       = 200;
                $response['message']    = "SUCCESS";
                $response['data']       = $temp_file_name;
            }else {
                $response['code']       = 204;
                $response['message']    = "ERROR";
                $response['data']       = "null";
            }
        }else {
            $response['code']       = 204;
            $response['message']    = "EMPTY_DETAILS";
            $response['data']       = "";
        }

        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
