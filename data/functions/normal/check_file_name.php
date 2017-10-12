<?php
function check_design_file($file) {
   $out = explode(".", $file, 2);
       if(count($out)==2){
        if($out[1]=="design")
        {
        if(strlen($file)<=80){
        if(is_dir ( "design/".$file ))
        {
        return $out[0];
        }}}}
        return null;
}

function check_language_file($file) {
   $out = explode(".", $file, 2);
     if(count($out)==2){
        if($out[1]=="lang.xml")
        {
        if(strlen($file)<=80){
        if(!is_dir ( "language/".$file ))
        {
        return $out[0];
        }}}}
        return null;
}
