$(function(){
    $('#saveComment').click(function(){
        // alert($('#IdRecord').val());
        // alert($('#IdAutor').val());
        // alert($('#textComment').val());





       


        $.post('saveComment.php', {
            'IdRecord': $('#IdRecord').val(),
            'IdAutor': $('#IdAutor').val(),
            'Text': $('#textComment').val()


        }, function(data, status){
            alert (data);
           
           
        })
    })

   
})