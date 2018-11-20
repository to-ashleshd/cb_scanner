$(document).on("change", "#class_id", function(){
    var class_id = $(this).val(); 
    var load_url = $(this).attr("load-url");
    
    $.ajax({
        url: load_url+"/"+class_id+"/class",
        method: 'get',
        success: function(result){
            $("#subject_div").html(result);
            $("#chapters_div").html("");
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
            $("#chapters_div").html("");
        }
    });
});

$(document).on("change", "#book_id", function(){
    $("#chapters_div").html("");
});

$(document).on("click", "#scan_submit", function(){
    var class_id = $("#class_id").val(); 
    var subject_id = $("#subject_id").val(); 
    var book_id = $("#book_id").val(); 
    var load_url = $(this).attr("load-url");
    var load_chapter_url = $(this).attr("load-chapter-url");
    
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });

    $.ajax({
        url: load_url,
        method: 'post',
        dataType:"json",
        data: {class_id: class_id, subject_id: subject_id, book_id: book_id},
        success: function(result){
            console.log(result.status);
            if(result.status == 200){
                $.ajax({
                    url: load_chapter_url+"/"+book_id+"/books",
                    method: 'get',
                    data: {class_id: class_id, subject_id: subject_id, book_id: book_id},
                    success: function(result){
                        $("#chapters_div").html(result);
                    }
                });
            } else {
                alert("Error!!!");
            }
        }
    });
    
});

$(document).on("click", ".chapter_submit", function(){
    var class_id = $("#class_id").val(); 
    var subject_id = $("#subject_id").val(); 
    var book_id = $("#book_id").val(); 
    var chapter_id = $(this).data("chapter_id");
    var from_page = $("#from_page_"+$(this).data("chapter_id")).val();
    var to_page = $("#to_page_"+$(this).data("chapter_id")).val();
    var load_url = $(this).attr("load-url");
    
    
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });

    $.ajax({
        url: load_url,
        method: 'post',
        dataType:"json",
        data: {class_id: class_id, subject_id: subject_id, book_id: book_id, chapter_id:chapter_id,
        from_page:from_page, to_page:to_page},
        success: function(result){
            console.log(result.status);
            
        }
    });
    
});
