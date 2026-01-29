$(document).ready(function () {
    //code edit
    $(document).on('click', '.case', function () {
        var c = $(this).val();
        if (c == 0) {
            $(this).val(1);
            $(this).parent().toggleClass("fa-check-circle fa-circle");

        } else {
            $(this).val(0);
            $(this).parent().toggleClass("fa-circle fa-check-circle");
        }
    });
    // add btn
    $(document).on('click', "#add-btn", function () {
        var sub = $("#sub").text();
        if (sub == '') {
            alert("add name subject");
        } else {
            $.ajax({
                url: BASE_URL + '/insert',
                method: "POST",
                data: {
                    sub: sub,
                    cas: 0
                },
                dataType: "text",
                success: function (data) {
                    alert(data);
                    fetch_data();
                }
            });
        }
    });
    // add btn-child
    // $(document).on("click", ".btn_add", function () {
    //     var child_in = $(this).data("id");
    //     var text_ch_in = $("#child-in" + child_in).text();
    //     var parentid = $(this).data("parentid");
    //     $.ajax({
    //         url: "insert-2.php",
    //         method: "POST",
    //         data: {
    //             text_ch_in: text_ch_in,
    //             cas: 0,
    //             parent_id: parentid
    //         },
    //         dataType: "text",
    //         success: function (data) {
    //             alert(data);
    //             fetch_data();
    //         }
    //     });
    // })
    // edit_btn
    $(document).on("click", ".edit_btn", function edit_b() {
        var idp = $(this).data("idp");
        var nidp = idp.substring(1, idp.length);
        $("#da" + nidp).toggleClass("none");
        $("#c" + nidp).toggleClass("none");
        $("input#" + nidp).toggleClass("none");
        $("#s" + nidp).attr("contenteditable", "true");
        $("#s" + nidp).toggleClass("border-g");
    });
    // edit_btn_child
    // $(document).on("click", ".edit_bt", function edit_bch() {
    //     var idp = $(this).data("idp");
    //     var nidp = idp.substring(1, idp.length);
    //     $("#d" + nidp).toggleClass("none");
    //     $("#chc" + nidp).toggleClass("none");
    //     $("input#ch" + nidp).toggleClass("none");
    //     $("#chs" + nidp).attr("contenteditable", "true");
    //     $("#chs" + nidp).toggleClass("border-g");
    //     $("#descd" + nidp).attr("contenteditable", "true");
    //     $(".cont" + nidp).toggleClass("border-g");
    // });
    // delet 
    $(document).on('click', '.btn_delete', function () {
        var id = $(this).attr("id");
        console.log($(this).attr("id"));
        if (confirm("هل انت متأكد من حذف هذا العنصر؟")) {
            $.ajax({
                url: BASE_URL + "/delete",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "text",
                success: function () {
                    fetch_data();
                }
            });
        }
    });
    //delete CH
    // $(document).on('click', '.delete_btn', function () {
    //     var id = $(this).data("idp");
    //     if (confirm("هل انت متأكد من حذف هذا العنصر؟")) {
    //         $.ajax({
    //             url: "delete-2.php",
    //             method: "POST",
    //             data: {
    //                 id: id
    //             },
    //             dataType: "text",
    //             success: function (data) {
    //                 alert(data);
    //                 fetch_data();
    //             }
    //         });
    //     }
    // });
    //done btn
    // $(document).on('click', '.done_btn', function () {
    //     var idp = $(this).data("idp");
    //     var nidp = idp.substring(1, idp.length);
    //     $("#d" + nidp).toggleClass("none");
    //     $("#chc" + nidp).toggleClass("none");
    //     $("input#ch" + nidp).toggleClass("none");
    //     $("#chs" + nidp).attr("contenteditable", "false");
    //     $("#chs" + nidp).toggleClass("border-g");
    //     var sub = $("span#s" + nidp).text();
    //     var cas = $("input#" + nidp).val();
    //     var id = nidp;
    //     $.ajax({
    //         url: BASE_URL + "/update",
    //         method: "POST",
    //         data: {
    //             sub: sub,
    //             case: cas,
    //             id: id
    //         },
    //         dataType: "text",
    //         success: function (data) {
    //             alert(data);
    //             fetch_data();
    //         }
    //     });
    // });
    // //done btn ch
    // $(document).on('click', '.btn_done', function () {
    //     var idp = $(this).data("idp");
    //     var nidp = idp.substring(1, idp.length);
    //     $("#d" + nidp).toggleClass("none");
    //     $("#chc" + nidp).toggleClass("none");
    //     $("input#ch" + nidp).toggleClass("none");
    //     $("#chs" + nidp).attr("contenteditable", "false");
    //     $("#chs" + nidp).toggleClass("border-g");
    //     $(".cont" + nidp).toggleClass("border-g");
    //     var sub = $("span#chs" + nidp).text();
    //     var cas = $("input#ch" + nidp).val();
    //     var dsc = $("#descd" + nidp).text();
    //     var id = nidp;
    //     $.ajax({
    //         url: "update-2.php",
    //         method: "POST",
    //         data: {
    //             sub: sub,
    //             case: cas,
    //             id: id,
    //             describ: dsc
    //         },
    //         dataType: "text",
    //         success: function (data) {
    //             alert(data);
    //             fetch_data();
    //         }
    //     });
    // });
});