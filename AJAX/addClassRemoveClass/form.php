<?php
if(isset($_POST['sampleEntry'])){
    $input = $_POST['sampleEntry'];
    // Process the input (e.g., perform some operations)
    
    if (!empty($input)) {
    	echo "success";
    }
    else {
    	echo "failed";
    }

}

if (isset($_GET['getRequestTest'])) {
    $getInput = $_GET['getInputTest'];

    echo "Message: " . $getInput;
}
?>
