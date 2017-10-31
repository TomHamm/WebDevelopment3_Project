var userRootURL = "http://localhost/FordCarGarage/api/users";

var findAllUsers=function() {
        $.ajax({type: 'GET',
           url:userRootURL,
           dataType:'json',
           success: userRenderList
       });
};

//data = the data returned from the server
var userRenderList = function (data) {
    data=data.users;
    $('#userTableBody').empty();
    $.each(data, function(index,user) {
        $('#userTableBody').append('<tr><td>'+user.id+'</td><td>'+user.username+'</td><td>'+user.email+'</td><td>'+
                user.registrationDate+'</td><td>'+user.userType+'</td></tr>');
    });
    $('#userTable').DataTable();
    
};

var deleteUser = function() {
    console.log('deleteUser');
    $.ajax({
        type: 'DELETE',
        url: userRootURL + '/' + $('#carId').val(),
        success: function(data, textStatus, jqXHR){
            alert('Car deleted successfully');
            findAll();
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('deleteCar error:' + textStatus + ' ' + errorThrown);
        }
    });
};


$(document).ready(function() {
    findAllUsers();
    
    $(document).on("click", '#btnUserDelete', function(){
        deleteUser();
        findAllUsers();
    });
});
