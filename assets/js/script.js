/**
 * Created by hugo on 08/06/2016.
 */
$(function () {
/*
    $(".schemaTitle").on("click",function () {
        var id =$(this).attr("data-info");
        var item = findInArray(id);

        $("#name").html(item.name);
        $("#description").html(item.description);
        $("#tumbUp").html(item.pouceUp);
        $("#tumbDown").html(item.pouceDown);
         var link = $("#linkTumbUp").attr("href");
        $("#linkTumbUp").attr("href",link+"/"+item.id+"/"+"like");
        $("#linkTumbUp").attr("href",link+"/"+item.id+"/"+"dislike");
        console.log(link);
    });


    function findInArray(id){

        for(var i=0;i<data.length;i++)
        {
            if(data[i].id == id)
            return data[i];
        }
    }
    */

    $('#description').on('keyup', function(event) {
        var len = $(this).val().length;
        $('#char').html(len)
        if (len >= 350) {

            $(this).parent().addClass("has-error").addClass("has-feedback");
        }
        else{
            $(this).parent().removeClass("has-error").removeClass("has-feedback");
        }
    });


    $('.list-group-item').on("click",function(){
        $('.list-group-item').removeClass("active");
        $(this).addClass("active");
        $("#avatar").val($(".active").attr("id"));
    });
})


