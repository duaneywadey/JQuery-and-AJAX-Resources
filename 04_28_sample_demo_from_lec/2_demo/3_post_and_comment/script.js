// If comment description is double clicked, an input field is displayed
// to edit the comment 
$('.commentDescription').on('dblclick', function (event) {
	$(this)
		.closest('.commentContainer')
		.toggleClass('redBorder')
		.find('.editCommentForm')
		.toggleClass('d-none')
});

// If post description is double clicked, an input field is displayed
// to edit the post 
$('.postDescription').on('dblclick', function (event) {
	$(this)
		.closest('.postContainer')
		.toggleClass('redBorder')
		.find('.editPostForm')
		.toggleClass('d-none')
});