function ShowAlert(id, msg, alert){
    $(id).hide();
    $(id).html('<div class="alert alert-'+alert+' mb-2 alert-dismissable" role="alert">'+
        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+msg+'</div>');
    $(id).show('slow');
}

function dateonly_sql_to_js(date){
	var d = null;
	if(date != null){
		var t = (date).split(/[- :]/);
		d = new Date(t[0], t[1]-1, t[2]);
	}
	return d;
}

function timeonly_sql_to_js(date){
	var d = null;
	if(date != null){
		var t = (date).split(/[- :]/);
		d = new Date();
		d.setHours(t[0]);
		d.setMinutes(t[1]);
		d.setSeconds(t[2]);
	}
	return d;
}