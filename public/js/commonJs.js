$(document).on("change", "#class_id", function () {
    var class_id = $(this).val();
    var load_url = $(this).attr("load-url");
    var is_valid = true;
    if(class_id == ""){
        is_valid = false;
        notify("Class should not be empty.", "danger");
    }

    if(is_valid == true){
        $.ajax({
            url: load_url + "/" + class_id + "/class",
            method: 'get',
            success: function (result) {
                $("#subject_div").html(result);
                $("#chapters_div").html("");
            }
        });
    }
});

$(document).on("change", "#subject_id", function () {
    var class_id = $("#class_id").val();
    var subject_id = $(this).val();
    var load_url = $(this).attr("load-url");

    var is_valid = true;
    if(subject_id == ""){
        is_valid = false;
        notify("Subjects should not be empty.", "danger");
    }

    if(is_valid == true){
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });

        $.ajax({
            url: load_url,
            method: 'post',
            data: {
                class_id: class_id,
                subject_id: subject_id
            },
            success: function (result) {
                $("#book_div").html(result);
                $("#chapters_div").html("");
            }
        });
    }
});

$(document).on("change", "#book_id", function () {
    $("#chapters_div").html("");
});

$(document).on("click", "#scan_submit", function () {
    var class_id = $("#class_id").val();
    var subject_id = $("#subject_id").val();
    var book_id = $("#book_id").val();
    var load_url = $(this).attr("load-url");
    var load_chapter_url = $(this).attr("load-chapter-url");

    var is_valid = true;
    if (!required_select('class_id,subject_id,book_id')) {
        is_valid = false;
    }
    if (is_valid == true) {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });

        $.ajax({
            url: load_url,
            method: 'post',
            dataType: "json",
            data: {class_id: class_id, subject_id: subject_id, book_id: book_id},
            success: function (result) {
                if (result.status == 200) {
                    notify(result.msg, "success");
                    $.ajax({
                        url: load_chapter_url + "/" + book_id + "/books",
                        method: 'get',
                        data: {class_id: class_id, subject_id: subject_id, book_id: book_id},
                        success: function (result) {
                            $("#chapters_div").html(result);
                            
                        }
                    });
                } else if (result.status == 404) {
                    notify(result.msg, "danger");
                } else {
                    notify(result.msg, "danger");
                }
            }
        });
    }
});

$(document).on("click", ".chapter_submit", function () {
    var class_id = $("#class_id").val();
    var subject_id = $("#subject_id").val();
    var book_id = $("#book_id").val();
    var chapter_id = $(this).data("chapter_id");
    var from_page = $("#from_page_" + $(this).data("chapter_id")).val();
    var to_page = $("#to_page_" + $(this).data("chapter_id")).val();
    var load_url = $(this).attr("load-url");
    var is_valid = true;
    if(!required_all('from_page_'+ $(this).data("chapter_id")+',to_page_'+ $(this).data("chapter_id"))){
        is_valid = false;
    }

    if(is_valid == true){
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });

        $.ajax({
            url: load_url,
            method: 'post',
            dataType: "json",
            data: {class_id: class_id, subject_id: subject_id, book_id: book_id, chapter_id: chapter_id,
                from_page: from_page, to_page: to_page},
            success: function (result) {

    //            $("#chapter_submit_"+chapter_id).addClass("hide");
                $("#chapter_submit_" + chapter_id).attr("disabled", true);

                alert(result.code);
            }
        });
    }

});
