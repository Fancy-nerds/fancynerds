<?
/**
 * Copyright © 2020 Theodore R. Smith <https://www.phpexperts.pro/>
 * License: MIT
 *
 * @see https://stackoverflow.com/a/61168906/430062
 *
 * @param string $path
 * @param bool   $recursive Default: false
 * @param array  $filtered  Default: [., ..]
 * @return array
 */
function getDirs($path, $recursive = false, array $filtered = [])
{
    if (!is_dir($path)) {
        throw new RuntimeException("$path does not exist.");
    }

    $filtered += ['.', '..'];

    $dirs = [];
    $d = dir($path);
    while (($entry = $d->read()) !== false) {
        if (is_dir("$path/$entry") && !in_array($entry, $filtered)) {
            $dirs[] = $entry;

            if ($recursive) {
                $newDirs = getDirs("$path/$entry");
                foreach ($newDirs as $newDir) {
                    $dirs[] = "$entry/$newDir";
                }
            }
        }
    }

    return $dirs;
}
