var arrOrder = []; // Tabulas kārtošanas masīvs
var ordDirect = 0; // Kārtošanas virziens
var paginR = 0; // r priekš tabulas


$( document ).ready(function()
{
	fnLoadTable();
});


function fnOrder(ord, direct)
{
	var arVal = [0,1]; // Derīgo vērtību massīvs

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
		'parts-category.table', 
		{ r:r, f:f, rc:rc, 
			arrOrder:arrOrder, 
			ordDirect:ordDirect }, 
		function(result)
		{
			$('#idTable').html(result);
			$('#mainGifLoader').fadeOut('fast');
		});	
};



function fnAddItemPanel()
{
	$.get(
		'parts-category.item-panel', 
		{},
		function(result)
		{
			$("#add_item_panel").html(result);

			var f = $('#tFind').val();
			f = f.trim();
			if(f.length > 0)
				$('#new_item').val(f);	

			$("#add_item_panel").slideDown('normal');
		});	
	
}


function fnAddItem()
{
	$('#new_item_alert').slideUp(100, function(){
		$(this).remove();
	});

	var f = $('#new_item').val();

	f = f.trim();
	f = f.substring(0,255);

	if(f.length == 0)
	{
		fnAlertPanel('danger', 'Tukšu ierakstu ievadīt nevar!');
		return false;
	};


	$.post(
		'parts-category.add-item', 
		{ f:f }, 
		function(result)
		{
			switch(result.status) {
				case 0: 
						fnAlertPanel('danger', 'Tukšu ierakstu ievadīt nevar!');
						break;
				case 1: 
						fnAlertPanel('danger', 'Šāds ieraksts jau eksistē!');
						break;
				case 2: 
						fnAlertPanel('success', 'Ieraksts pievienots!');
						$('#new_item').val('');
						fnLoadTable();
						break;
				case 3: 
						fnAlertPanel('danger', 'Pievienošana nav izdevusies!');
						break;

				default: alert('Unknown error: ' + result.status);
			}
			console.log(result);
		}, 'json');		
}


function fnClosePanel()
{
	$("#add_item_panel").slideUp('fast', function() {
		$(this).html('');
	});
}


function fnAlertPanel(alert, val)
{
	$('#new_item').after('<div class="alert alert-'+alert+'" id="new_item_alert"> <strong>'+val+'</strong></div>');
	$('#new_item_alert').slideDown('fast');
}