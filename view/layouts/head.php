<?php
use classes\config;
$config=new config();


$name=$config->get('name');
$author=$config->get('author');
echo '   
   
   <div class="bg-secondary text-white vh-20">
   <div class="text-center "><h1 class="">' . $name . ' - ' . $author . '</h1></div>
          <div class="text-center"><span class="mt-2">' . date("F j, Y, g:i a") . '</span></div>
            <div class="text-center"><span class="mt-2">created using: PHP 7.4, bootstrap 5</span></div>
</div>

';

