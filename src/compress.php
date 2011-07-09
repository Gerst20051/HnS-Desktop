<?php
function compressCSS($data) {
	$data = preg_replace('#/\*.*?\*/#s', '', $data); // single line comments
	$data = preg_replace('/(\/\/.*\n)/', '', $data); // new lines and tabs
	$data = preg_replace('/(\t|\r|\n)/', '', $data); // multi spaces
	$data = preg_replace('/(\s+)/', ' ', $data); // empty rules
	$data = preg_replace('/[^}{]+{\s?}/', '', $data); // whitespace around selectors and braces
	$data = preg_replace('/\s*{\s*/', '{', $data); // whitespace at end of rule
	$data = preg_replace('/\s*}\s*/', '}', $data); // make every rule 1 line tall
	$data = preg_replace('/}/', "}\n", $data);
	$data = preg_replace('#\s+#', ' ', $data);
	$data = str_replace(';}', '}', $data);
	$data = str_replace(', ', ',', $data);
	$data = str_replace('; ', ';', $data);
	$data = str_replace(': ', ':', $data);
	return $data;
}

function compressJS($data) {
	$data = preg_replace('#/\*.*?\*/#s', '', $data);
	$data = preg_replace('/[ \\t]*\\n+\\s*/', "\n", $data);
	$data = str_replace(';}', '}', $data);
	// $exclude = array('^','*');
	// $operators = array(';',',','?',':','||','&&','|','^','&','===','==','=','!==','!=','<<','<=','<','>>>','>>','>=','>','+=','-=','*=','/=','%=','++','--','+','-','*','/','%','!','~','.','[',']','{','}','(',')');
	// foreach ($operators as $operator) { if (!in_array($operator, $exclude)) { $data = str_replace(" $operator", $operator, $data); $data = str_replace("$operator ", $operator, $data); }}
	return $data;
}
?>