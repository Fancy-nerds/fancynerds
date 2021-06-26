<?
function M4GetVideoSettingsAttrs($opts)
{
    return 'data-type="' . $opts['type'] . '"' . ($opts['autoplay'] ? ' data-autoplay ' : '') . '' . ($opts['aspect_ratio'] ? ' data-ratio="' . $opts['aspect_ratio'] . '" ' : '') . 'data-ref="' . ($opts['type'] === 'native' ? $opts['file'] : $opts['yt_id']) . '"';
}
