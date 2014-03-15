<?php
include 'dbc.php';
page_protect();
include 'facebooklibs/auth.php';
include 'instagramlibs/instagramAuth.php';
include 'twitterlibs/twitterauth.php';

class AccountsLoggedIn {
       public $facebook = "";
       public $twitter  = "";
       public $instagram = "";
       public $vine = "";
       public $facebookIO = "";
       public $twitterIO  = "";
       public $instagramIO = "";
       public $vineIO = "";
   }
   $e = new AccountsLoggedIn();
//fb
if($user){
    $e->facebook = $logoutUrl;
    $e->facebookIO = 'out';
}else{
     $e->facebook = $loginUrl;  
    $e->facebookIO = 'in';

}
//INSTAGRAM
if(isset($_SESSION['instagram'])){
     //$e->instagram = $logoutUrl;###NEED TO MAKE THIS
     $e->instagramIO = 'out';
}else{
     $e->instagram = $instagram_loginUrl ;  
     $e->instagramIO = 'in';

}
//TWITTER
if(isset($_SESSION['access_token'])){
     $e->twitter = 'http://localhost/Mashd/Mash-D/twitterlibs/twitter_logout.php'; //LOGOUT URL
     $e->twitterIO = 'out';
}else{
     $e->twitter = 'http://localhost/Mashd/Mash-D/twitterlibs/redirect.php';//LOGIN  
     $e->twitterIO = 'in';

}
///VINE
if(isset($_SESSION['vine_key'])){
     $e->vine = 'http://localhost/Mashd/Mash-D/vinelibs/vinelogout.php'; //LOGOUT URL
     $e->vineIO = 'out';

}else{
     $e->vine = "#/vineLogin";//LOGIN  
     $e->vineIO = 'in';

}

 echo json_encode($e);

?>