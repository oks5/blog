$(function(){
    $("#userLogin").click(function(){
        $.post('userLogin.php',{

            'Email': $('#Email').val(),
            'Password': $('#Password').val(),
        },function(data, status){
          
if (data==true){
    $('#container-nav').load('container_nav.php #nav');
    alert('користувач аторизований');
} else {
    alert('невірний логін або пароль');
}
$('#LoginModal').modal('hide');

        
        })
    })
    $("#logOut").click(function(){
        $.get('logOut.php', function(){
            
            var locationUrl=location.href;
            alert (locationUrl);

            locationUrl=locationUrl.split('/');
            if (locationUrl[locationUrl.length-1] !='index.php'){
                locationUrl[locationUrl.length-1] ='index.php';
                window.location.href=locationUrl.join('/');
            }
            alert (locationUrl);
            $('#container-nav').load('container_nav.php #nav'); 
        })
    })
})