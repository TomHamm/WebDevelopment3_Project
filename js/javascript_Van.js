var rootVanURL = "http://localhost/FordCarGarage/api/vans";

var findAllVans=function() {
        $.ajax({type: 'GET',
           url:rootVanURL,
           dataType:'json',
           success: renderVanList
       });
};


var findVanById= function(id) {
	console.log('findVanById: ' + id);
	$.ajax({
		type: 'GET',
		url: rootVanURL + '/' + id,
		dataType: "json",
		success: function(data){
			console.log('findVanById success: ' + data.regVan);
			currentVan = data;
			renderVanDetails(currentVan);
		}
	});
};

var renderVanDetails=function(van) {
	$('#vanId').val(van.idVan);
	$('#vanReg').val(van.regVan);
	$('#vanModel').val(van.modelVan);
	$('#vanTransmition').val(van.transmitionVan);
	$('#vanYear').val(van.theYearVan);
	$('#vanColour').val(van.colourVan);
	$('#vanEngineSize').val(van.engineSizeVan);
        $('#vanPrice').val(van.priceVan);
        $('#vanImage').show();
        $('#vanImage').attr('src', 'images/van'+van.idVan+'.jpg');
};




//data = the data returned from the server
var renderVanList = function (data) {
    data=data.vans;
    $('#vanTableBody').empty();
    $.each(data, function(index,van) {
        $('#vanTableBody').append('<tr><td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myVanModal" id="'+van.idVan+'" >'+
                van.regVan+'</button></td><td>'+van.modelVan+'</td><td>'+van.transmitionVan+'</td><td>'+van.theYearVan+'</td><td>'+
                van.colourVan+'</td><td>'+van.engineSizeVan+'</td><td>'+van.priceVan+'</td></tr>');
    });
    $('#vanTable').DataTable();
    
};



var clearVanFields = function(){
        $('#vanId').val('');
	$('#vanReg').val('');
	$('#vanModel').val('');
	$('#vanTransmition').val('');
	$('#vanYear').val('');
	$('#vanColour').val('');
	$('#vanEngineSize').val('');
        $('#vanPrice').val('');
        $('#vanImage').hide();
        $('#vanImage').removeAttr('disabled');
        $('#vanModel').removeAttr('disabled');
        $('#vanTransmition').removeAttr('disabled');
        $('#vanYear').removeAttr('disabled');
        $('#vanColour').removeAttr('disabled');
        $('#vanEngineSize').removeAttr('disabled');
        $('#vanPrice').removeAttr('disabled');
};


var addVan = function() {
    console.log('addVan');
    $.ajax({
        type: 'POST',
        contentType: 'application/json',
        url: rootVanURL,
        dataType: "json",
        data: formToJSONVan(),
        success: function(data, textStatus, jqXHR){
            alert('van created successfully');
            findAllVans();
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('addVan error: ' + textStatus);
        }
    });
};

var updateVan = function() {
    console.log('updateVan');
    $.ajax({
        type: 'PUT',
        contentType: 'application/json',
        url: rootVanURL + '/' + $('#vanId').val(),
        dataType: "json",
        data: formToJSONVan(),
        success: function(data, textStatus, jqXHR){
            alert('Van updated successfully');
            findAllVans();     
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('updateVan error: ' + errorThrown);
        }
    });
};


var formToJSONVan = function() {
    return JSON.stringify({
        "idVan": $('#vanId').val(),
        "regVan": $('#vanReg').val(),
        "modelVan": $('#vanModel').val(),
        "transmitionVan": $('#vanTransmition').val(),
        "theYearVan": $('#vanYear').val(),
        "colourVan": $('#vanColour').val(),
        "engineSizeVan": $('#vanEngineSize').val(),
        "priceVan": $('#vanPrice').val()
    });
};


var deleteVan = function() {
    console.log('deleteVan');
    $.ajax({
        type: 'DELETE',
        url: rootVanURL + '/' + $('#vanId').val(),
        success: function(data, textStatus, jqXHR){
            alert('van deleted successfully');
            findAllVans();
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('deleteVan error:' + textStatus + ' ' + errorThrown);
        }
    });
};


$(document).ready(function() {
    
    findAllVans();
    
    $(document).on("click", '#vanTable button', function(){findVanById(this.id);});
    
    $(document).on("click", '#btnClearVan', function(){clearVanFields();});
    $(document).on("click", '#btnSaveVan', function(){
        if($('#vanId').val() === '')
            addVan();
        else
            updateVan();
        return false;
    });
    $(document).on("click", '#btnDeleteVan', function(){deleteVan();});
    
});
