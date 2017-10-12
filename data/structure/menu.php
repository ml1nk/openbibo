<?php
if(isset($isindex)){
$menu = '

<div id="menu">

<ul>
<li><a class="direkt" href="index.php">'.htmlentities($lang->aaai[0], ENT_QUOTES).'</a></li>
</ul>

<ul>
<li>
<h3>'.htmlentities($lang->aaam[0], ENT_QUOTES).'</h3>
<ul>
<li><a href="index.php?where=media_search">'.htmlentities($lang->aaan[0], ENT_QUOTES).'</a></li>
<li><a href="index.php?where=media_new">'.htmlentities($lang->aaao[0], ENT_QUOTES).'</a></li>
</ul>
</li>
</ul>

<ul>
<li>
<h3>'.htmlentities($lang->aacy[0], ENT_QUOTES).'</h3>
<ul>
<li><a href="index.php?where=user_search">'.htmlentities($lang->aaan[0], ENT_QUOTES).'</a></li>
<li><a href="index.php?where=user_new">'.htmlentities($lang->aaao[0], ENT_QUOTES).'</a></li>
</ul>
</li>
</ul>

<ul>
<li>
<h3>'.htmlentities($lang->aaeh[0], ENT_QUOTES).'</h3>
<ul>
<li><a href="index.php?where=borrow">'.htmlentities($lang->aaef[0], ENT_QUOTES).'</a></li>
<li><a href="index.php?where=return">'.htmlentities($lang->aaei[0], ENT_QUOTES).'</a></li>
<li><a href="index.php?where=extend">'.htmlentities($lang->aaej[0], ENT_QUOTES).'</a></li>
<li><a target="_blank" href="index.php?where=too_late_print">'.htmlentities($lang->aagt[0], ENT_QUOTES).'</a></li>
<li><a target="_blank" href="index.php?where=in_time_print">'.htmlentities($lang->aahy[0], ENT_QUOTES).'</a></li>

</ul>
</li>
</ul>

<ul>
<li>
<h3>'.htmlentities($lang->aagf[0], ENT_QUOTES).'</h3>
<ul>
<li><a href="index.php?where=types">'.htmlentities($lang->aagg[0], ENT_QUOTES).'</a></li>
<li><a href="index.php?where=categories">'.htmlentities($lang->aagh[0], ENT_QUOTES).'</a></li>
<li><a href="index.php?where=days_off">'.htmlentities($lang->aagi[0], ENT_QUOTES).'</a></li>
<li><a href="index.php?where=manager_new">'.htmlentities($lang->aagj[0], ENT_QUOTES).'</a></li>
<li><a href="index.php?where=configuration">'.htmlentities($lang->aagk[0], ENT_QUOTES).'</a></li>
</ul>
</li>
</ul>


<ul>
<li>
<h3>'.htmlentities($lang->aajx[0], ENT_QUOTES).'</h3>
<ul>
<li><a href="index.php?where=software">'.htmlentities($lang->aajy[0], ENT_QUOTES).'</a></li>
<li><a target="_blank" href="index.php?where=phpinfo">'.htmlentities($lang->aakd[0], ENT_QUOTES).'</a></li>
<li><a href="index.php?where=update_manager">'.htmlentities($lang->aakf[0], ENT_QUOTES).'</a></li>
</ul>
</li>
</ul>


<ul>
<li><a class="direkt" href="index.php?where=manager">'.htmlentities($lang->aafr[0], ENT_QUOTES).'</a></li>
</ul>
<ul>
<li><a class="direkt" href="index.php?where=logout">'.htmlentities($lang->aaft[0], ENT_QUOTES).'</a></li>
</ul>
</div>
';
}