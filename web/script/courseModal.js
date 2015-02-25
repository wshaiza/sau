$(function() {
	//initiate create course modal
	$('#createCourseButton').click( function () {

		$('#modalCourseCreate').modal('show');

		$("div.modal-body").find("#courseCreateModalContainer").load($(this).data('url').toString());
	
	});

	
});