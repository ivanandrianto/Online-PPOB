function check_all(chk){
	if (chk.checked == true) {
		$('input[name*=check_list]').attr('checked', 'checked');
	}else {
		$('input[name*=check_list]:checked').removeAttr('checked');
	}
}

function uncheck_all(chk) {
	for (i = 1; i < chk.length; i++)
		chk[i].checked = false ;
}

function justify_label() {
	var max = 0;
	$('.fields .label').each(function() {
		if ($(this).width() > max) {
			max = $(this).width();
		}
	});
	$('.fields .label').width(max);

	var fieldset_padding_left = $('.fields fieldset').css('padding-left');
	if (fieldset_padding_left == undefined) {
		fieldset_padding_left = 0;
	}
	var label_margin_right = $('.fields .label').css('margin-right');
	if (label_margin_right == undefined) {
		label_margin_right = 0;
	}
	$('.fields .actions').css('padding-left', max + parseInt(fieldset_padding_left) + parseInt(label_margin_right));
}

$(function() {
	justify_label();

	$('.datepicker').datepicker({
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
		changeYear: true,
		yearRange: 'c-60:c+1'
	});

	$('table.list .action .delete').click(function(event) {
		var $tr = $(this).parent().parent().parent();
		var num = $tr.find('td.rownum').stop().text();
		if (!confirm('Anda yakin ingin menghapus data baris #'+num+' ?')) {
			event.preventDefault();
		}
	});
	
	$('table.list .action .delete_batch').click(function(event) {
		if (!confirm('Anda yakin ingin menghapus data ?')) {
			event.preventDefault();
		}
	});

	$("#position_id").change(function() {
        //var src = $(this).val();
		var position_text = $("#position_id option:selected").text();
        if(position_text=="Wali Kelas"){
			$("#class_id").show("normal");
			$("#subject_id").hide("normal");
			$("#hidden_label").text("Kelas : ");
			$("#hidden_label").show("normal");
		}
		else if(position_text=="Koord Bidang Studi"){
			$("#subject_id").show("normal");
			$("#class_id").hide("normal");
			$("#hidden_label").text("Bidang Studi : ");
			$("#hidden_label").show("normal");
		}
		else{
			$("#class_id").hide("normal");
			$("#subject_id").hide("normal");
			$("#hidden_label").hide("normal");
		}
    });
	var position_text = $("#position_id option:selected").text();
	if(position_text=="Wali Kelas"){
		$("#class_id").show("normal");
		$("#subject_id").hide("normal");
		$("#hidden_label").text("Kelas : ");
		$("#hidden_label").show("normal");
	}
	else if(position_text=="Koord Bidang Studi"){
		$("#subject_id").show("normal");
		$("#class_id").hide("normal");
		$("#hidden_label").text("Bidang Studi : ");
		$("#hidden_label").show("normal");
	}
	else{
		$("#class_id").hide("normal");
		$("#subject_id").hide("normal");
		$("#hidden_label").hide("normal");
	}
	
	/*	
	setTimeout(function(){
		$('.ui-state-highlight ui-corner-all').fadeOut("slow",function () { 
			$('.ui-state-highlight ui-corner-all').remove();		
		});
		3000);
	});
	*/

});
