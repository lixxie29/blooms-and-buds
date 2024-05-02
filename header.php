<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fa-regular fa-circle-xmark" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<header class="header">
    
</header>