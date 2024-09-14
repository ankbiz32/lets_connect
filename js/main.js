$(document).ready(function(){
    $("#contact-form").on("submit",function(e){
    e.preventDefault();
    if($("#contact-form [name='name']").val() === '')
    {
        $("#contact-form [name='name']").css("border","1px solid red");
    }
    else if ($("#contact-form [name='email']").val() === '')
    {
        $("#contact-form [name='email']").css("border","1px solid red");
    }
    else
    {
        $(".quform-submit .submit-button").attr("disabled", true).html('SENDING...');
        var sendData = $( this ).serialize();
            $.ajax({
                type: "POST",
                url: "form.php",
                data: sendData,
                success: function(data){
                    if(data=='name_required'){
                        $(".quform-submit .submit-button").attr("disabled", false).html('SEND >>');
                    }
                    else if(data=='email_required'){
                    $(".quform-submit .submit-button").attr("disabled", false).html('SEND >>');
                    }
                    else if(data=='sent'){
                        $("#contact-form").find("input[type=text], input[type=email], textarea").val("");
                        $(".quform-submit .submit-button").html('MESSAGE SENT ✔');
                    }
                    else{
                        console.log('error: '+data);
                        $(".quform-submit .submit-button").attr("disabled", false).html('ERROR! Please refresh & try again.');
                    }
                },
                error: function(){
                    $(".quform-submit .submit-button").attr("disabled", false).html('SERVER ERROR! Please refresh & try again.');
                }
            });
    }
    });

    $("#contact-form input").blur(function(){
        var checkValue = $(this).val();
        if(checkValue != '')
        {
            $(this).css("border","1px solid #eeeeee");
        }
    });
});