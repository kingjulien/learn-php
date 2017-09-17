<?php

/**
* @param string $file - cesta k template
* @param array $data - data pouzite v template
* @return string - obsah template (html)
*/
function getContent($file, $data = []) {
	foreach ($data as $key => $value) {
		$$key = $value;
	}
    ob_start();
    include($file);
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}