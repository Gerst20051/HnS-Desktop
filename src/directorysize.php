<?php
function insert_tabs($count = 1) {
	for ($x = 1; $x <= $count; $x++) $output .= "\t";
	return $output;
}

$config = array
(
	"os"		=> "windows",
	"directory"	=> ".",
	"format"	=> "KiB",
	"page"	=> true,
	"verbose"	=> true
);

function sizeof_directory($dir, $issubdir = false) {
	global $config;
	if ($config['os'] == "unix") $delimiter = "/";
	else if ($config['os'] == "windows") $delimiter = "\\";
	$size = 0;
	
	if (!file_exists($dir) || !is_dir($dir) || !is_readable($dir)) {
		echo "Error: \"$dir\" is not a directory, or I cannot read it properly.";
		return 0;
	} else if ($od = opendir($dir)) {
		if (!$issubdir && $config['verbose']) echo "Calculating the size of $dir\r\n";
		while ($file = readdir($od)) {
			if ($file != "." && $file != "..") {
				$path = $dir . $delimiter . $file;
				if (is_file($path)) {
					if ($config['verbose']) echo "Parsing file: $path ";
					$filesize = filesize($path);
					$size += $filesize;
					if ($config['verbose']) echo "&hellip; $filesize bytes.\r\n";
				} else if (is_dir($path)) {
					if ($config['verbose']) echo "Parsing directory: $path\r\n";
					$dirsize = sizeof_directory($path, true);
					$size += $dirsize;
					if ($config['verbose']) echo "Done parsing directory: $path, $dirsize bytes.\r\n";
				}
			}
		}
		if (!$issubdir && $config['verbose']) echo "Parse complete: $size bytes.\r\n";
		closedir($od);
	}
	return $size;
}

function format_bytes($size) {
	global $config;
	if ($config['format'] == "B") $output = $size;
	else if ($config['format'] == "KiB") $output = $size / 1024;
	else if ($config['format'] == "MiB") $output = ($size / 1024) / 1024;
	else if ($config['format'] == "GiB") $output = (($size / 1024) / 1024) / 1024;
	else if ($config['format'] == "TiB") $output = ((($size / 1024) / 1024) / 1024) / 1024;
	else if ($config['format'] == "KB") $output = $size / 1000;
	else if ($config['format'] == "MB") $output = ($size / 1000) / 1000;
	else if ($config['format'] == "GB") $output = (($size / 1000) / 1000) / 1000;
	else if ($config['format'] == "TB") $output = ((($size / 1000) / 1000) / 1000) / 1000;
	else $output = $size;
	return number_format(round($output, 2));
}

ob_implicit_flush(true);
ob_end_flush();

if ($config['page']) {
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Recursive Directory Size</title>
</head>
<body>
<h1>Size of <?php echo $config['directory']; ?></h1>
<?php
}
if ($config['verbose']) echo "\t\t<pre>";
$size = sizeof_directory($config['directory'], false);
if ($config['verbose']) echo "</pre>\r\n";
echo "\t\t<p>" . format_bytes($size) . ' ' . $config['format'] . '</p>';
if ($config['page']) {
?>
</body>
</html>
<?php } ?>