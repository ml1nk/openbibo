<?php
if ($isindex){
$head = "<title>".htmlentities($lang->aaaa[0], ENT_QUOTES, "UTF-8")."</title>".load_design($configuration[1],"login",false);
$body='<div id="login"><p id="login_title">'.$configuration[3].'</p>';
// $session[0] = 0 no login, 1 login fail, 2 session key fail, 3 login true 
if($session[0]==1)
{
$body = $body.'<div id="login_error">'.htmlentities($lang->aaae[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aaaf[0], ENT_QUOTES, "UTF-8").'</div>';
}
else if($session[0]==2)
{
logout();
$body = $body.'<div id="login_error">'.htmlentities($lang->aaag[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aaah[0], ENT_QUOTES, "UTF-8").'</div>';
}
else
{
$body = $body . '<div id="login_error_height"></div>';
}

$body = $body . '<div id="login_main">
<form action="index.php" method="post">
<div id="login_name"><div id="login_name_text">'.htmlentities($lang->aaab[0], ENT_QUOTES, "UTF-8").': </div><input id="login_name_form" name="name" type="text" size="40" maxlength="40" /></div>
<div id="login_password"><div id="login_password_text">'.htmlentities($lang->aaac[0], ENT_QUOTES, "UTF-8").': </div><input id="login_password_form" name="password" type="password" size="64" maxlength="64" /></div>
<div id="login_submit"><input id="login_submit_form" type="submit" value="'.htmlentities($lang->aaad[0], ENT_QUOTES, "UTF-8").'"></div>
</form>
</div></div>';

html_out($head,"<div id='main'><div id='body'>".$body."</div></div>");
}