$(function() {
	//initiate create new student modal
	$('#createStudentButton').click( function () {

		$('#modalStudentCreate').modal('show');

		$("div.modal-body").find("#courseStudentModalContainer").load($(this).data('url').toString());
	
	});

	
});