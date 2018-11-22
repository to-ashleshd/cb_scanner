/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var response = new Object() ;
function load_ajax(responseDiv, url, callbackFx){ 
    //$("body").addClass("loading");
    
    url = url+"/"+new Date().getTime();		

    $.ajax({url:url,
        async:false,
        success:function(result){
                //$("body").removeClass("loading");
                $("#"+responseDiv).html(result);
                if(callbackFx){
                        callbackFx(result);
                        $("#"+responseDiv).animate({opacity:1}, 'fast');
                }
        }
    });
}


function callbackFx(result){
    response = JSON.parse(result);
}

function load_ajax_post(url,data) {
    var responce;
    $.ajax({
            url: url,
            dataType: 'json',
            type:"POST",
            data:data,
            async:false,
            success: function (return_data) {
                responce = return_data;
            }
    });
    return responce;
}


//var timeoutID = window.setTimeout('$(".alert").fadeOut()  ', 4000);

function required($id , $msg){
    if($("#"+$id).val().trim() == ""){
            notify("Error! "+$msg , "danger");	
            //setTimeout(function() { $("#"+$id).focus(); }, 100);
            $("#"+$id ).addClass("border_input_error");
            $("#"+$id ).focus();
            return false;
    }
    else{
            return true;	
    }
}

function required_all($id){ 
    var ids = $id.split(","); 
    var ids_arr = [];
    var flag = true; 
    for(var i= 0; i<ids.length; i++){
        if($("#"+ids[i]).val().trim() == ""){//alert("if")
            $("#"+ids[i]).addClass("border_input_error");//alert("parent")
            ids_arr.push(ids[i]);
            //$("#"+ids[i]).focus();//alert("focus")
            flag = false;//alert("false")
        }
        else{
            $("#"+ids[i]).removeClass("border_input_error");
        }
    }
    $("#"+ids_arr[0]).focus();
    
    
    return flag;
}

function required_select($id){ 
    var ids = $id.split(","); 
    var flag = true; 
    console.log(ids);
    for(var i= 0; i<ids.length; i++){
        if($("#"+ids[i]).val() == ""){
            $("#"+ids[i]).addClass("border_input_error");//alert("parent")
            $("#"+ids[i]).focus();
            flag = false;
        }
        else{
            $("#"+ids[i]).removeClass("border_input_error");
        }
    }
    return flag;
}

function notify(message, type){ 
    $.growl({
        message: message
    },{
        type: type,
        allow_dismiss: true,
        label: 'Cancel',
        className: 'btn btn-inverse',
        placement: {
            from: 'top',
            align: 'center'
        },
        delay: 7000 ,
        animate: {
                enter: 'animated fadeIn',
                exit: 'animated fadeOut'
        },
        offset: {
            x: 0,
            y: 58,
        }
    });
};