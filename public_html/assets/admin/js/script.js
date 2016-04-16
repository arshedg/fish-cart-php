$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
$.setCookie = function(name, value, days) {
	var expires;
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
	} else {
		expires = "";
	}
	document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
};
$.cookie = function(name) {
	var nameEQ = encodeURIComponent(name) + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i].trim();
		if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
	}
	return null;
}
$.remCookie = function(name){
	$.setCookie( name , '' , -2 );
};

function doAjax(url,data){
	return $.ajax({
		method: "POST",
		url: url ,
		data: data,
		dataType: "script"
	});
}
function doAjaxHTML(url,data,ldiv){
	sobj.hash = url;
	location.hash = url;
	if(!( ldiv )) ldiv='#content-id';
	return $.ajax({
		method: "POST",
		url: url ,
		data: data,
		dataType: "text" ,
		success: function( r, s, x ){ $(ldiv).html(r); } ,
	});
}
function doAjaxScript(url,succ){
	if(!(succ)) succ = function(){};
	$.getScript(url,succ);
}
function setSideActive(url){
	$('body').removeClass('sidebar-open');
	$('.sidebar-menu li.active').removeClass('active');
	$('.sidebar-menu  a[href="'+url+'"]').parent('li').addClass('active');
	if($('.sidebar-menu  a[href="'+url+'"]').parent('li').parent('ul').hasClass('treeview-menu'))
		$('.sidebar-menu  a[href="'+url+'"]').parent('li').parent('ul').parent('li').addClass('active');
}
function doAjaxLoad(url){
	sobj.hash = url;
	location.hash = url;
	setSideActive(url);
	$('#content-id').addClass('loading').load(url, function( response , status, jqXHR) {
		if(status=='error') $('#content-id').html(response);
		$('#content-id').removeClass('loading');
		$('html, body').animate({scrollTop: 0}, 400);
		console.log( "Load was performed :: " + status+" :: " + response);
	});
}
function clearForm(tmDiv){
	$(tmDiv+' input:not([type=checkbox],[type=radio],[type=button],[type=submit]), '+tmDiv+' textarea').val('');
	$(tmDiv+' select').prop('selectedIndex',0).change();
	//$(tmDiv+' input[type="checkbox"] ,'+tmDiv+' input[type="radio"]').prop('checked', false);
};


$(document).ready(function(e) {

	l = location.hash;
	if(l) doAjaxLoad(l.substr(1));
	else  doAjaxLoad('process/dashboard');

	if ("onhashchange" in window) {
		$(window).bind( 'hashchange' , sobj.fn.hashchange );
	} else setInterval(sobj.fn.hashchange,1000);

	$('body').on('click','.reset',function(e){
		e.preventDefault();
		tmDiv = $(this).data('action');
		if(tmDiv) clearForm(tmDiv);
	});
	$('body').on('click','.ajax-link',function(e){
		doAjaxLoad($(this).attr('href'));
		e.preventDefault();
	});
      $('body').on('click','.ajax-script-link',function(e){
		doAjax($(this).attr('href'),{});
		e.preventDefault();
	});
      $('body').on('submit','.ajax-form',function(e){
		doAjax( $(this).attr('action') , $(this).serializeObject());
		e.preventDefault();
	});
      $('body').on('submit','.load-form',function(e){
		doAjaxHTML( $(this).attr('action') , $(this).serializeObject() , $(this).data('load') );
		e.preventDefault();
	});
    $('body').on('click','#top-holder .alert .close , #top-holder .modal',function(e){
		$('#top-holder').fadeOut(500);
		$('.progress').html('');
    });
});
sobj.fn.hashchange = function(e){
	l = location.hash;
	if( (l) && ( sobj.hash!=l.substr(1) ) ) doAjaxLoad( l.substr(1) );
}

disp_modal = function(titleT,bodyT,typeT){
	if (typeT=='success') typeT = 'alert-success';
	else if (typeT=='warning') typeT = 'alert-warning';
	else if (typeT=='error') typeT = 'alert-danger';
	else typeT = 'alert-info';

	$('#top-holder').html('<div class="modal" style="display:block"><div class="alert '+typeT+' ">'+
                			'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                			' <strong>'+titleT+' - </strong> '+bodyT+' &nbsp;&nbsp;</div></div>').fadeIn(500);;
	
};