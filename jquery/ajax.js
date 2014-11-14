
//Sự kiện submit form
$('#login_form').submit(function(event) {
    var data = $(this).serialize();
    $.ajax({
        type: 'POST',
        url: MAIN_URL + 'users',
        data: data,
        dataType: 'JSON',
        success: function(json){
            if(json.result){
                //Using Toastr Notification
                toastr.success(json.msg);
            }
            else{
                toastr.error(json.msg);
            }
        },
        error: function(xhr, textStatus, errorThrown){
            console.log('Không thể kết nối');
        }
    });
    return false;
});