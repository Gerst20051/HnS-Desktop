<?php
function compressCSS($d) {
	$d = preg_replace('#/\*.*?\*/#s', '', $d); // single line comments
	$d = preg_replace('/(\/\/.*\n)/', '', $d); // new lines and tabs
	$d = preg_replace('/(\t|\r|\n)/', '', $d); // multi spaces
	$d = preg_replace('/(\s+)/', ' ', $d); // empty rules
	$d = preg_replace('/[^}{]+{\s?}/', '', $d); // whitespace around selectors and braces
	$d = preg_replace('/\s*{\s*/', '{', $d); // whitespace at end of rule
	$d = preg_replace('/\s*}\s*/', '}', $d); // make every rule 1 line tall
	$d = preg_replace('/}/', "}\n", $d);
	$d = preg_replace('#\s+#', ' ', $d);
	$d = str_replace(';}', '}', $d);
	$d = str_replace(', ', ',', $d);
	$d = str_replace('; ', ';', $d);
	$d = str_replace(': ', ':', $d);
	return $d;
}

function compressJS($d) {
	$d = preg_replace('#/\*.*?\*/#s', '', $d);
	$d = preg_replace('/[ \\t]*\\n+\\s*/', "\n", $d);
	$d = str_replace(';}', '}', $d);
	// $exclude = array('^','*');
	// $operators = array(';',',','?',':','||','&&','|','^','&','===','==','=','!==','!=','<<','<=','<','>>>','>>','>=','>','+=','-=','*=','/=','%=','++','--','+','-','*','/','%','!','~','.','[',']','{','}','(',')');
	// foreach ($operators as $operator) { if (!in_array($operator, $exclude)) { $d = str_replace(" $operator", $operator, $d); $d = str_replace("$operator ", $operator, $d); }}
	return $d;
}

function compressJSON($d) {
	$d = preg_replace('/(\t|\r|\n)/', '', $d);
	return $d;
}

function css_compress($css) {
	$css = preg_replace('!//[^\n\r]+!', ”, $css);#comments
	$css = preg_replace('/[\r\n\t\s]+/s', ' ', $css);#new lines, multiple spaces/tabs/newlines
	$css = preg_replace('#/\*.*?\*/#', ”, $css);#comments
	$css = preg_replace('/[\s]*([\{\},;:])[\s]*/', '\1', $css);#spaces before and after marks
	$css = preg_replace('/^\s+/', ”, $css);#spaces on the begining
	return $css;
}

function html_compress($html) {
	preg_match_all('!(<(?:code|pre).*>[^<]+</(?:code|pre)>)!',$html,$pre);#exclude pre or code tags
	$html = preg_replace('!<(?:code|pre).*>[^<]+</(?:code|pre)>!', '#pre#', $html);#removing all pre or code tags
	$html = preg_replace('#<!–[^\[].+–>#', ”, $html);#removing HTML comments
	$html = preg_replace('/[\r\n\t]+/', ' ', $html);#remove new lines, spaces, tabs
	$html = preg_replace('/>[\s]+</', '><', $html);#remove new lines, spaces, tabs
	$html = preg_replace('/[\s]+/', ' ', $html);#remove new lines, spaces, tabs
	if(!empty($pre[0]))
	foreach($pre[0] as $tag)
	$html = preg_replace('!#pre#!', $tag, $html,1);#putting back pre|code tags
	return $html;
}
?>