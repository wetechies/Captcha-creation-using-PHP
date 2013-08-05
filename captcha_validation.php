<?php
//Start the session so we can store what the security code actually is
session_start();

//Send a generated image to the browser
create_image();
exit();

function create_image()
{
    //Let's generate a totally random string using md5
    $md5_hash = md5(rand(0,999)); 
    //We don't need a 32 character long string so we trim it down to ,say 5 
    $security_code = substr($md5_hash, 15,5); 

    //Set the session to store the security code
    $_SESSION["wetechies_security_code"] = $security_code;

 //Let us Set the  width and height of the image.
    $width = 100;
    $height = 50; 

 //Firstly we call the imagecreate() function  with the dimensions of the image, namely its width and height. 
    $image = ImageCreate($width, $height);  

//Before we use any color , we should first allocate it using the ImageColorAllocate() , in its parameters the first digit denotes the Red component, the second the Green and the third Blue, hence RGB.
    
//We are making three colors, white, black and gray
    $white = ImageColorAllocate($image, 255, 255, 255);
    $black = ImageColorAllocate($image, 0, 0, 0);
    $grey = ImageColorAllocate($image, 204, 204, 204);

//Lets make the background black 
    ImageFill($image, 0, 0, $black); 

//Lets add randomly generated string in grey to the image
    ImageString($image, 30, 30, 15, $security_code, $grey); 

//LetsThrow in some lines to make it a little bit harder for any bots to break 
    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
    imageline($image, 0, $height/2, $width, $height/2, $grey); 
    imageline($image, $width/2, 0, $width/2, $height, $grey); 
 
//Finally we output the newly created image in jpeg format 
    ImageJpeg($image);
   
}
?>
