<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .todo-list { margin-top: 20px; }
        .todo-item { display: flex; justify-content: space-between; }
        .edit-input { display: none; }
    </style>
</head>
<body>

    <h1>To-Do List</h1>
    <input type="text" id="todo-input" placeholder="Add a new task">
    <button id="add-todo">Add</button>

    <div class="todo-list" id="todo-list"></div>

    <script>
        $(document).ready(function() {
            
            $('#add-todo').click(function() {
                if ($('#todo-input').val()) {
                    $('#todo-list').append(`
                        <div class="todo-item" style='border-style:solid; margin-top:20px;'>

                            <span class="todo-text">
                                ${
                                    $('#todo-input').val()
                                }
                            </span>

                            <input type="text" class="edit-input" value="
                            ${
                                $('#todo-input').val()
                            }">

                            <button class="edit-btn">Edit</button>
                            <button class="delete-btn">Delete</button>

                        </div>
                    `);
                }
            });

            $('#todo-list').on('click', '.edit-btn', function() {

                var editInput = $(this).closest('.todo-item').find('.edit-input')
                var textContent = $(this).closest('.todo-item').find('.todo-text')

                if (editInput.is(':visible')) {

                    textContent.text(editInput.val());
                    editInput.hide();
                    textContent.show();

                    $(this).text('Edit');
                } 

                else {
                    editInput.show();
                    textContent.hide();
                    $(this).text('Save');
                }

            });

            $('#todo-list').on('click', '.delete-btn', function() {
                $(this).closest('.todo-item').remove();
            });
        });
    </script>

</body>
</html>