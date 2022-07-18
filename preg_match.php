<?php

// preg_match test
/*
pattern: /<div\s+[^<]*?data-props=[\'\"](?<value>[^<]*?)[\'\"]/g
demo data: <div data-component="CandidatesList" data-props="&quot;initialCandidates&quot;:{&quot;data&quot;:" data-rel="things"></div>

*/
$string = '<div data-component="CandidatesList" data-props="&quot;initialCandidates&quot;:{&quot;data&quot;:" data-rel="things"></div>' ;
$pagina = file_get_contents('datapagina.html') ;
$result = array() ;
preg_match('#<div\s+[^<]*?data-props=[\'\"](?<value>[^<]*?)[\'\"]#', $pagina, $result) ;
// var_dump($result) ;
echo html_entity_decode($result["value"]) ;

