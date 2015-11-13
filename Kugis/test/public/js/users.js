var arrOrder = []; // Tabulas kārtošanas masīvs
var ordDirect = 0; // Kārtošanas virziens
var paginR = 0; // r priekš tabulas

$( document ).ready(function()
{
	fnLoadTable();
});



function fnOrder(ord, direct)
{
	var arVal = [0,1,2,3,4,5]; // Derīgo vērtību massīvs

	// Pārbauda vai elements ir derīgs
	var key = arVal.indexOf(ord); 

	if(key > -1)
	{
		// Iegūst elementa indeksu
		var idx = arrOrder.indexOf(ord);
	
		// Aizvāc norādīto elementu no masīva
		if(idx > -1)
			arrOrder.splice(idx, 1); 

		// Pievieno jauno elementu masīva sākumā
		arrOrder.unshift(ord); 
		ordDirect = direct;	

		fnLoadTable();	
	}
}


function fnFindKeyEnter(e) {
    if (e.keyCode == 13) {
        fnLoadTable(0);
        return false;
    }
}


function fnLoadTable(r)
{
	$('#mainGifLoader').fadeIn('fast');

	if(typeof r == 'undefined') 
		r = paginR;
	else 
		paginR = r;
			
	var f = $('#tFind').val();
	var rc = $('#pageTableRowCount').val();	

	if(typeof rc == 'undefined')
		rc = 5;

	$.post(
		'users.table', 
		{ r:r, f:f, rc:rc, 
			arrOrder:arrOrder, 
			ordDirect:ordDirect }, 
		function(result)
		{
			$('#idTable').html(result);
			$('#mainGifLoader').fadeOut('fast');
		});	
};




function fnEditLastName(id)
{
	var h = $('#trLastName_' + id).css('height');
	var w = $('#trLastName_' + id).css('width');

	h = h.substring(0,2)-2+'px';

	$('#trLastName_' + id).css('width', w);

	$('.edit_in_row').remove();

	$.get(
		'users.last_name', 
		{ id:id },
		function(result)
		{
			if(result.status == 2)
			{
				if(result.last_name == null)
					res_last_name = '';
				else
					res_last_name = result.last_name;

				$('#trLastName_' + id)
					.addClass('field_padding_0')
					.html('<input type="text" class="edit_in_row" id="Edit_'+id+'" onblur="fnSaveLastName('+id+')" value="'
						+res_last_name
						+'"">');					
				$('#Edit_' + id)
					.css('height', h)
					.css('width', w)
					.focus();
			} else {
 				alert('Error1: ' + result.status);
 			}
		});	

};



function fnSaveLastName(id)
{
	var v = $('#Edit_'+id).val();
	v = v.trim();
	v = v.substring(0,255);

	$.get(
		'users.set_last_name', 
		{ id:id, v:v },
		function(result)
		{
			if(result.status == 1) 
			{


				$.get(
					'users.last_name', 
					{ id:id },
					function(result2)
					{
						if(result2.status == 2)
						{
							if(result2.last_name == null)
								res_last_name = '';
							else
								res_last_name = result2.last_name;


							$('#trLastName_' + id)
								.removeClass('field_padding_0')
								.html('<a>'+res_last_name+'</a>');

						} else {
			 				alert('Error1: ' + result2.status);
			 			}
					});	


			} else { 
				$('#trLastName_' + id)
					.removeClass('field_padding_0')
					.html(result.status);
			};

		},'json');		
}



function fnEditFirstName(id)
{
	var h = $('#trFirstName_' + id).css('height');
	var w = $('#trFirstName_' + id).css('width');

	h = h.substring(0,2)-2+'px';

	$('#trFirstName_' + id).css('width', w);

	$('.edit_in_row').remove();

	$.get(
		'users.first_name', 
		{ id:id },
		function(result)
		{
			if(result.status == 2)
			{
				if(result.first_name == null)
					res_first_name = '';
				else
					res_first_name = result.first_name;

				$('#trFirstName_' + id)
					.addClass('field_padding_0')
					.html('<input type="text" class="edit_in_row" id="Edit_'+id+'" onblur="fnSaveFirstName('+id+')" value="'
						+res_first_name
						+'"">');					
				$('#Edit_' + id)
					.css('height', h)
					.css('width', w)
					.focus();
			} else {
 				alert('Error1: ' + result.status);
 			}
		});	

};



function fnSaveFirstName(id)
{
	var v = $('#Edit_'+id).val();
	v = v.trim();
	v = v.substring(0,255);

	$.get(
		'users.set_first_name', 
		{ id:id, v:v },
		function(result)
		{
			if(result.status == 1) 
			{


				$.get(
					'users.first_name', 
					{ id:id },
					function(result2)
					{
						if(result2.status == 2)
						{
							if(result2.first_name == null)
								res_first_name = '';
							else
								res_first_name = result2.first_name;


							$('#trFirstName_' + id)
								.removeClass('field_padding_0')
								.html('<a>'+res_first_name+'</a>');

						} else {
			 				alert('Error1: ' + result2.status);
			 			}
					});	


			} else { 
				$('#trFirstName_' + id)
					.removeClass('field_padding_0')
					.html(result.status);
			};

		},'json');		
}