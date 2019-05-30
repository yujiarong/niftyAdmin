<?php
if (! function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];
        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory.$filename)) {
                array_push($directory_list, $directory.$filename.'/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory.'*.php') as $filename) {
                require  $filename;
            }
        }
    }
}

function getPermissionCacheKey($id){
    return "permission_{$id}";
}

function getNow($format = "Y-m-d H:i:s"){
    return date($format);
}

/**
 * [xmlencode xml实体转义]
 * @param  [type] $tag 
 * @return [type] $tag    
 */
function xmlencode($tag){
    $tag = str_replace("&", "&amp;", $tag);
    $tag = str_replace("<", "&lt;", $tag);
    $tag = str_replace(">", "&gt;", $tag);
    $tag = str_replace("'", "&apos;", $tag);
    $tag = str_replace("\"", '&quot;', $tag);
    return $tag;
}

?>