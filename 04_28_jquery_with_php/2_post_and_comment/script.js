$('.commentDescription').on('dblclick', function (event) {
	$(this).closest('.commentContainer').toggleClass('redBorder').find('.editCommentForm').toggleClass('d-none')
});

$('.postDescription').on('dblclick', function (event) {
	$(this).closest('.postContainer').toggleClass('redBorder').find('.editPostForm').toggleClass('d-none')
});

$('#createPostForm').on('submit', function (event) {
	event.preventDefault();
	// Store inside a JSON variable our
	// input field values
	var formData = {
		postDescInputField: $("#postDescInputField").val(),

	    // This key is for us to label this
	    // event inside the PHP script  
	    createNewPost:1
	};

	if (formData.postDescInputField != "") {
		$.ajax({
			type:"POST",
			url: "controller.php",
			data: formData,
			success: function (data) {
				location.reload();
			}
		})
	}
	else {
		alert("Make sure to not leave anything empty!")
	}
})

$('.createCommentForm').on('submit', function (event) {
	event.preventDefault();

	var form = $(this); 
	var commentsContainer = form.closest('.comments');
	var allCommentsDiv = commentsContainer.find('.allComments');

	var formData = {
		commentDescInputField: form.find(".commentDescInputField").val(),
		postID: commentsContainer.attr('postIDattr'),
		createNewComment: 1
	};

	if (formData.commentDescInputField != "" && formData.postID != "") {
		$.ajax({
			type: "POST",
			url: "controller.php",
			data: formData,
			success: function (data) {
				// allCommentsDiv.html(data);
				// form.find(".commentDescInputField").val("");
				// setTimeout(function () {
				// 	location.reload()
				// }, 1000) 
				location.reload();
			}
		});
	} 
	else {
		alert("Make sure to not leave anything empty!");
	}
});

$('.editPostForm').on('submit', function (event) {
	event.preventDefault();

	var postItem = $(this).closest('.allPosts').find('.postContainer')
	var formData = {
		postDescForEdit: $(this).find('.postDescForEdit').val(),
		postIDForEdit: $(this).find('.postIDForEdit').val(),
		editPost: 1
	};


	if (formData.postDescForEdit != "" && formData.postIDForEdit !="") {
		$.ajax({
			type:"POST",
			url: "controller.php",
			data: formData,
			success: function (data) {
				location.reload();	
			}
		});

	}
	else {
		alert("Make sure to not leave anything empty!");
	}

});
	
$('.editCommentForm').on('submit', function (event) {
	event.preventDefault();
    var form = $(this); // Store a reference to the form
    var commentsContainer = form.closest('.comments');
    var allCommentsDiv = commentsContainer.find('.allComments'); // Get the .allComments element

    var formData = {
    	commentDescEditField: form.find('.commentDescEditField').val(),
    	commentIDEditField: form.find('.commentIDEditField').val(),
    	postIDForEdit: commentsContainer.attr('postIDattr'),
    	editComment: 1
    };

    if (formData.commentDescEditField != "" && formData.commentIDEditField !="" && formData.postIDForEdit != "") {
    	$.ajax({
    		type:"POST",
    		url: "controller.php",
    		data: formData,
    		success: function (data) {
    			// allCommentsDiv.html(data);
    			// setTimeout(function () {
    			// 	location.reload()
    			// }, 1000)
    			location.reload()
    		}
    	});
    } 
    else {
    	alert("Make sure to not leave anything empty!");
    }
});	