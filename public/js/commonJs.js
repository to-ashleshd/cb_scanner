$(document).on("change", "#class_id", function(){
    var class_id = $(this).val(); 
    var load_url = $(this).attr("load-url");
    
    $.ajax({
        url: load_url+"/"+class_id+"/class",
        method: 'get',
        success: function(result){
            $("#subject_div").html(result);
        }
    });
});

$(document).on("change", "#subject_id", function(){
    var class_id = $("#class_id").val(); 
    var subject_id = $(this).val(); 
    var load_url = $(this).attr("load-url");
    
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });

    $.ajax({
        url: load_url,
        method: 'post',
        data: {
            class_id: class_id,
            subject_id: subject_id
        },
        success: function(result){
            $("#book_div").html(result);
        }
    });
});

$(document).on("click", "#scan_submit", function(){
    console.log("asdaadad");
    var class_id = $("#class_id").val(); 
    var subject_id = $("#subject_id").val(); 
    var book_id = $("#book_id").val(); 
    var load_url = $(this).attr("load-url");
    
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });

    $.ajax({
        url: load_url,
        method: 'post',
        data: {
            class_id: class_id,
            subject_id: subject_id,
            book_id: book_id
        },
        success: function(result){
            $("#book_div").html(result);
        }
    });
});
