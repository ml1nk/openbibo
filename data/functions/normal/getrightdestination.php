<?php
function getrightdestination($where,$lang)
{
if(!isset($where))
{
return array("home",htmlentities($lang->aaai[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "media_search")
{
return array("media_search",htmlentities($lang->aaap[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "media_display")
{
return array("media_display",htmlentities($lang->aabl[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "media_new")
{
return array("media_new",htmlentities($lang->aacp[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "user_search")
{
return array("user_search",htmlentities($lang->aacv[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "user_display")
{
return array("user_display",htmlentities($lang->aacw[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "user_new")
{
return array("user_new",htmlentities($lang->aacx[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "borrow")
{
return array("borrow",htmlentities($lang->aaee[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "return")
{
return array("return",htmlentities($lang->aadz[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "extend")
{
return array("extend",htmlentities($lang->aaej[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "manager")
{
return array("manager",htmlentities($lang->aafr[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "configuration")
{
return array("configuration",htmlentities($lang->aagk[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "too_late_print")
{
return array("too_late_print",htmlentities($lang->aagx[0], ENT_QUOTES, "UTF-8"),false);
}
else if ($where == "in_time_print")
{
return array("in_time_print",htmlentities($lang->aahz[0], ENT_QUOTES, "UTF-8"),false);
}
else if ($where == "manager_new")
{
return array("manager_new",htmlentities($lang->aagy[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "categories")
{
return array("categories",htmlentities($lang->aaiw[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "types")
{
return array("types",htmlentities($lang->aaiv[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "days_off")
{
return array("days_off",htmlentities($lang->aaix[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "software")
{
return array("software",htmlentities($lang->aajz[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "update_manager")
{
return array("update_manager",htmlentities($lang->aake[0], ENT_QUOTES, "UTF-8"),true);
}
else if ($where == "phpinfo")
{
return array("phpinfo",htmlentities($lang->aakc[0], ENT_QUOTES, "UTF-8"),false);
}
else
{
return array("not_found",htmlentities($lang->aagw[0], ENT_QUOTES, "UTF-8"),true);
}
}