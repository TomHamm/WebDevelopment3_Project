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
                user.registrationDate+'</td><td>'+user.userType+'</td><td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#userModal" id="'+user.id+'" >Remove</button></td></tr>');
    });
    $('#userTable').DataTable();
    
};


var findUserById= function(id) {
	console.log('findUserById: ' + id);
	$.ajax({
		type: 'GET',
		url: userRootURL + '/' + id,
		dataType: "json",
		success: function(data){
			console.log('findUserById success: ' + data.id);
			currentUser = data;
			renderUserDetails(currentUser);
		}
	});
};

var renderUserDetails=function(users) {
	$('#userId').val(users.id);
	$('#userName').val(users.username);
	$('#userEmail').val(users.email);
	$('#userType').val(users.userType);
};



var deleteUser = function() {
    console.log('deleteUser');
    $.ajax({
        type: 'DELETE',
        url: userRootURL + '/' + $('#userId').val(),
        success: function(data, textStatus, jqXHR){
            alert('User removed successfully');
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
    
    $(document).on("click", '#userTable button', function(){findUserById(this.id);});
    
    $(document).on("click", '#btnUserDelete', function(){
        deleteUser();
        findAllUsers();
    });
});
