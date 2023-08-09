<!DOCTYPE html>
<html>
<head>
	<title>Image Compression and Upload using PHP</title>
	<style>
@import url('https://fonts.googleapis.com/css?family=Exo:400,700');

*{
    margin: 0px;
    padding: 0px;
}

body{
    font-family: 'Exo', sans-serif;
}


.context {
    width: 100%;
    position: absolute;
    top:50vh;
    
}

.context h1{
    text-align: center;
    color: #fff;
    font-size: 50px;
}


.area{
    background: #4e54c8;  
    background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);  
    width: 100%;
    height:100vh;
    
   
}

.circles{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}

.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes animate {

    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }

}
		body {
			background-color: #f2f2f2;
		}

		.form-container {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
			margin: 50px auto;
			max-width: 600px;
			padding: 20px;
			text-align: center;
			animation-name: slideIn;
			animation-duration: 1s;
			animation-timing-function: ease-in-out;
			animation-delay: 0s;
			animation-iteration-count: 1;
			animation-direction: normal;
			animation-fill-mode: forwards;
		}

		.addimg {
			display: block;
			margin: 20px auto;
		}

		.upload {
			background-color: #4CAF50;
			border: none;
			color: white;
			cursor: pointer;
			font-size: 16px;
			margin-top: 20px;
			padding: 10px 20px;
			text-transform: uppercase;
			animation-name: fadeIn;
			animation-duration: 1s;
			animation-timing-function: ease-in-out;
			animation-delay: 1s;
			animation-iteration-count: 1;
			animation-direction: normal;
			animation-fill-mode: forwards;
		}

		.download {
			display: block;
			margin: 20px auto;
			text-align: center;
			animation-name: slideIn;
			animation-duration: 1s;
			animation-timing-function: ease-in-out;
			animation-delay: 2s;
			animation-iteration-count: 1;
			animation-direction: normal;
			animation-fill-mode: forwards;
		}

		@keyframes slideIn {
			0% {
				transform: translateY(-50%);
				opacity: 0;
			}
			100% {
				transform: translateY(0);
				opacity: 1;
			}
		}

		@keyframes fadeIn {
			0% {
				opacity: 0;
			}
			100% {
				opacity: 1;
			}
		}
	</style>
</head>
<body>
<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
   
	<div class="form-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
		    <label>Select Image File:</label><br>
		    <input class="addimg pointer" type="file" required="" name="image"> <br>
		    <input type="submit" name="submit" class="upload" value="Upload">
		</form>

		<?php
		/* 
		 * Custom function to compress image size and 
		 * upload to the server using PHP 
		 */ 
		function compressImage($source, $destination, $quality) { 
		    // Get image info 
		    $imgInfo = getimagesize($source); 
		    $mime = $imgInfo['mime']; 
		     // Create a new image from file 
	    switch($mime){ 
	        case 'image/jpeg': 
	            $image = imagecreatefromjpeg($source); 
	            break; 
	        case 'image/png': 
	            $image = imagecreatefrompng($source); 
	            break; 
	        case 'image/gif': 
	            $image = imagecreatefromgif($source); 
	            break; 
	        default: 
	            $image = imagecreatefromjpeg($source); 
	    } 
	     
	    // Save image 
	    imagejpeg($image, $destination, $quality); 
	     
	    // Return compressed image 
	    return $destination; 
	} 
	 
	 
	// File upload path 
	$uploadPath = "uploads/"; 
	 
	// If file upload form is submitted 
	$status = $statusMsg = ''; 
	if(isset($_POST["submit"])){ 
	    $status = 'error'; 
	    if(!empty($_FILES["image"]["name"])) { 
	        // File info 
	        $fileName = basename($_FILES["image"]["name"]); 
	        $imageUploadPath = $uploadPath . $fileName; 
	        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
	         
	        // Allow certain file formats 
	        $allowTypes = array('jpg','png','jpeg','gif'); 
	        if(in_array($fileType, $allowTypes)){ 
	            // Image temp source 
	            $imageTemp = $_FILES["image"]["tmp_name"]; 
	                    
	            // Compress size and upload image 
	            $compressedImage = compressImage($imageTemp, $imageUploadPath, 75); 
	             
	
	            if($compressedImage){ 
	                $status = 'success';  
	                $statusMsg = "Image compressed successfully!"; 
	            }else{ 
	                $statusMsg = "Image compress failed!"; 
	            } 
	        }else{ 
	            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
	        } 
	    }else{ 
	        $statusMsg = 'Please select an image file to upload.'; 
	    } 
	} 
	 
	// Display status message 
	echo $statusMsg; 
	
	// Generate download link for compressed image
	if ($status == 'success') {
	    echo "<br><a href='$compressedImage' download>Download Compressed Image</a>";
	}

	?>
</body>
</html>
		   
