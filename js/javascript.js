var rootURL = "http://localhost/FordCarGarage/api/cars";

var findAll=function() {
        $.ajax({type: 'GET',
           url:rootURL,
           dataType:'json',
           success: renderList
       });
};

var findById= function(id) {
	console.log('findById: ' + id);
	$.ajax({
		type: 'GET',
		url: rootURL + '/' + id,
		dataType: "json",
		success: function(data){
			console.log('findById success: ' + data.reg);
			currentCar = data;
			renderDetails(currentCar);
		}
	});
};

var renderDetails=function(car) {
	$('#carId').val(car.id);
	$('#carReg').val(car.reg);
	$('#carModel').val(car.model);
	$('#carTransmition').val(car.transmition);
	$('#carYear').val(car.theYear);
	$('#carColour').val(car.colour);
	$('#nct').val(car.nct);
	$('#carEngineSize').val(car.engineSize);
        $('#carPrice').val(car.price);
        $('#carImage').show();
        $('#carImage').attr('src', 'images/car'+car.id+'.jpg');
};
//data = the data returned from the server
var renderList = function (data) {
    data=data.cars;
    $('#body').empty();
    $.each(data, function(index,car) {
        $('#body').append('<tr><td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="'+car.id+'" >'+
                car.reg+'</button></td><td>'+car.model+'</td><td>'+car.transmition+'</td><td>'+car.theYear+'</td><td>'+
                car.colour+'</td><td>'+car.nct+'</td><td>'+car.engineSize+'</td><td>'+car.price+'</td></tr>');
    });
    $('#carTable').DataTable();
    $('#activityDetails').DataTable();
};

var clearFields = function(){
        $('#carId').val('');
	$('#carReg').val('');
	$('#carModel').val('');
	$('#carTransmition').val('');
	$('#carYear').val('');
	$('#carColour').val('');
	$('#nct').val('');
	$('#carEngineSize').val('');
        $('#carPrice').val('');
        $('#carImage').hide();
        $('#carImage').removeAttr('disabled');
        $('#carModel').removeAttr('disabled');
        $('#carTransmition').removeAttr('disabled');
        $('#carYear').removeAttr('disabled');
        $('#carColour').removeAttr('disabled');
        $('#nct').removeAttr('disabled');
        $('#carEngineSize').removeAttr('disabled');
        $('#carPrice').removeAttr('disabled');
};

var addCar = function() {
    console.log('addCar');
    $.ajax({
        type: 'POST',
        contentType: 'application/json',
        url: rootURL,
        dataType: "json",
        data: formToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('car created successfully');
            findAll();
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('addCar error: ' + textStatus);
        }
    });
};

var updateCar = function() {
    console.log('updateCar');
    $.ajax({
        type: 'PUT',
        contentType: 'application/json',
        url: rootURL + '/' + $('#carId').val(),
        dataType: "json",
        data: formToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('Car updated successfully');
            findAll();     
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('updateCar error: ' + errorThrown);
        }
    });
};

var formToJSON = function() {
    return JSON.stringify({
        "id": $('#carId').val(),
        "reg": $('#carReg').val(),
        "model": $('#carModel').val(),
        "transmition": $('#carTransmition').val(),
        "theYear": $('#carYear').val(),
        "colour": $('#carColour').val(),
        "nct": $('#nct').val(),
        "engineSize": $('#carEngineSize').val(),
        "price": $('#carPrice').val()
    });
};

var deleteCar = function() {
    console.log('deleteCar');
    $.ajax({
        type: 'DELETE',
        url: rootURL + '/' + $('#carId').val(),
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
    findAll();
    $(document).on("click", '#carTable button', function(){findById(this.id);});
    $(document).on("click", '#btnClear', function(){clearFields();});
    $(document).on("click", '#btnSave', function(){
        if($('#carId').val() === '')
            addCar();
        else
            updateCar();
        return false;
    });
    $(document).on("click", '#btnDelete', function(){deleteCar();});
});
