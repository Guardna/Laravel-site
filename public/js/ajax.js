function editComment(id,pid) {
        var content=$('#kom'+id).text();
        document.getElementById("txta").value=content;
        var url=document.getElementById("pform").action;
        var res = url.replace(pid, id);
        var form = document.getElementById('pform');
        form.action=res;
        $.ajax({
            method : "get",
            processData: false, contentType: false,
            data: {
                'id' : id,
                'content' : content,
            },
            type : 'json',
            success : function(data) {
                showComment(id,content,form);
            },
            error : function(error)
            {
                console.log("Something went wrong....");
            }
        });
}

function showComment(id,content,form) {
    var url="/editComment/" + id + "/edit";
    var editForm = form;
    $("#comment"+id).html(editForm);
}

function updateComment(id) {
    var editedData = $("#commentContent").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        "url" :"/comments/" + id + "/edit",
        method : "post",
        data : {
            'content' : editedData,
            '_method' : "post",
            'csrf-token' : X-CSRF-TOKEN
        },
        type : 'json',
        success : function(data) {
            hideAndReset(id, editedData);
        },
        error : function(error)
        {
            console.log("Something went wrong....");
        }
    });
}

function hideAndReset(id, editedData)
{
    console.log(editedData);
    $("#comment" + id).html(editedData);
    $("#comments").html("<div class='alert alert-info'>Comment successfully edited!</div>");
}
/*
     $(".save-data").click(function(event){
    event.preventDefault();

    let postid = $("input[name=postid]").val();
    let content = $("input[name=message]").val();
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/postkoment",
        type:"POST",
        data:{
            postid:postid,
            content:content,
            _token: _token
        },
        success:function(data){
            showall(data)
        },
        error: function(error) {
            console.log(error);
        }
    });
});
*/
