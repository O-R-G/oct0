<?php
/* 
    $default_language, $current_language are defined in head.php
*/
$params = array_merge($_GET);

$languages = array(
    array(
        'display' => 'fr',
        'slug'    => 'fr'
    ), 
    array(
        'display' => 'en',
        'slug'    => 'en'
    )
);

$html = '';
// $uri_without_lang = array_slice($uri, 2);
// $uri_without_lang = empty($uri_without_lang) || !$uri_without_lang[0] ? '' : '/' . implode('/', $uri_without_lang);
foreach($languages as $key => $lang) {
    // $url = '/' . $lang['slug'] . $uri_without_lang;
    $url = '/' . $lang['slug'];
    if(!empty($params)) $url .= '?' . implode('&', $params);
    $html .= '<a class="language-button' . ($lang['slug'] == $current_language ? ' active' : '') . '" href="'.$url . '">' . $lang['display'] . '</a>';
    $html .= $key == count($languages) - 1 ? '' : '<span class="language-button-divider">/</span>';
}

$html = '<div id="language-toggle" class="float-container">' . $html . '</div>';
echo $html;
?>
<style>
#language-toggle {
    position: fixed;
    right: var(--padding);
    top: var(--padding);
    z-index: 1100;
}
#language-toggle:after {

}
#language-toggle > * {
    float: left;
}
.language-button {
    /* display: inline-block; */
    padding: 2px 5px;
    border-bottom: 2px solid transparent;
}
.language-button.active, 
.language-button:hover {
    border-bottom: 2px solid #000;
}
/* .language-button:hover {
    animation: var(--font-animation);
} */
</style>
