$(function() {
	//initiate create department modal
	$('#createDeptButton').click( function () {

		$('#modalDeptCreate').modal('show');

		$("div.modal-body").find("#deptCreateModalContainer").load($(this).data('url').toString());
	
	});

	
});