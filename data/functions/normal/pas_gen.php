<?php
function pas_gen($pas)
{
$salt = generateSalt();
$pas = cryptmytext($salt . $pas);
return array($salt,$pas);
}

