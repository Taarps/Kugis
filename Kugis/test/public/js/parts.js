var timer = null;
var timerCount = 600;
var selCategoryID = 0;
var arrOrder = []; // Tabulas kārtošanas masīvs
var ordDirect = 0; // Kārtošanas virziens
var paginR = 0; // r priekš tabulas

$( document ).ready(function()
{
	fnLoadTable();

	$('body').on('shown.bs.modal', '#ItemModalBox', function () {
		$('#mdItemName').focus()
	})

});



function fnOrder(ord, direct)
{
	var arVal = [0,1,2]; // Derīgo vērtību massīvs

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
		'parts.table', 
		{ r:r, f:f, rc:rc, 
			arrOrder:arrOrder, 
			ordDirect:ordDirect },
		function(result)
		{
			$('#idTable').html(result);
			$('#mainGifLoader').fadeOut('fast');
		});	
};



function fnItemEditPanel()
{
	if($('#ItemModalBox').length < 1)
	{
		$.get(
			'parts.item-modal', 
			{},
			function(result)
			{
				$('body').append(result);
				fnClearModalBox();

				var f = $('#tFind').val();
				f = f.trim();
				if(f.length > 0)
					$('#mdItemName').val(f);

				$('#ItemModalBox').modal('show');
			});			
	} else {
		fnClearModalBox();
		$('#ItemModalBox').modal('show');		
	}

}


function fnClearModalBox()
{
	selCategoryID = 0;
	$('#mdItemName').val('');
	$('#mdFindCategory').val('');
	$('#mdAlertBox').html('');	
	fnFindCategory();
}


function fnFindCategoryTimer() {
	clearTimeout(timer); 
    timer = setTimeout(fnFindCategory, timerCount);		
};

function fnFindCategory()
{
	var f = $('#mdFindCategory').val();

	$.post('parts.category-list', 
		{s:selCategoryID, f:f }, 
		function(result) {
			$('#mdCategoryList').html(result);
	});

};




function fnAddItem()
{
	$('#mdAlertBoxText').fadeOut(100, function(){
		$(this).remove();
	});

	var v = $('#mdItemName').val();

	v = v.trim();
	v = v.substring(0,255);

	if(v.length == 0)
	{
		fnAlertPanel('danger', 'Tukšu ierakstu ievadīt nevar!');
		return false;
	};

	if(selCategoryID < 1)
	{
		fnAlertPanel('danger', 'Nav atzīmēta kategorija!');
		return false;
	};		


	$.get(
		'parts.add-item', 
		{ v:v, c:selCategoryID }, 
		function(result)
		{
			switch(result.status) {
				case 0: 
						fnAlertPanel('danger', 'Tukšu ierakstu ievadīt nevar!');
						break;
				case 1: 
						fnAlertPanel('danger', 'Nav atzīmēta kategorija!');
						break;						
				case 2: 
						fnAlertPanel('danger', 'Šāds ieraksts jau eksistē!');
						break;
				case 3: 
						fnAlertPanel('success', 'Ieraksts pievienots!');
						$('#mdItemName').val('');
						selCategoryID = 0;
						fnFindCategory();
						fnLoadTable();
						break;
				case 4: 
						fnAlertPanel('danger', 'Pievienošana nav izdevusies!');
						break;

				default: alert('Unknown error: ' + result.status);
			}
			console.log(result);
		}, 'json');		
}



function fnAlertPanel(alert, val)
{
	$('#mdAlertBox').html('<div class="alert alert-'+alert+'" id="mdAlertBoxText"> <strong>'+val+'</strong></div>');
	$('#mdAlertBoxText').fadeIn('fast');
};



function fnClickCategoryList(id)
{
	selCategoryID = id;
	$('#mdCategoryList>*').removeClass('selected');
	$('#mdCategoryList_i_' + id).addClass('selected');
	console.log(selCategoryID);
}