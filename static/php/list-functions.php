<?php
function render_filter($items, $id='', $class=array(), $url_base = '', $active_slug=''){
    $class[] = 'filter-wrapper';
    $class = implode(' ', $class);
    $output = '<div id="'.$id.'" class="'.$class.'">';
    foreach($items as $i) 
        $output .= render_filter_item($i, array(), $url_base, $active_slug);
    $output .= '</div>';
    return $output;
}
function render_filter_item($o, $class=array(), $url_base = '', $active_slug=''){
    $filter_slug = $o['url'];
    $active = $filter_slug === $active_slug;
    if($active) $class[] = 'active';
    $class[] = 'filter-item';
    $class = implode(' ', $class);
    $output = '<a class="'.$class.'" data-filter-slug="'.$filter_slug.'" href="'.$url_base . '/' . $o['url'].'">' . $o['name1'] . '</a>';
    return $output;
}
function render_list_item($o, $class=array(), $url = ''){
    global $oo;
    $output = '';
    $class[] = 'list-item';
    if(!empty($oo->media($o['id'])))
        $thumbnail = '<div class="list-item-thumbnail-wrapper"><img class="list-item-thumbnail" src="' . m_url($oo->media($o['id'])[0]) . '" /></div>';
    else {
        $thumbnail = '';
        $class[] = 'no-thumbnail';
    }
    $class = implode(' ', $class);
    $output .= '<a class="'.$class.'" href="'.$url.'">' . $thumbnail . '<h2 class="list-item-title">' . $o['name1'] . '</h2></a>';
    return $output;
}
function render_list($items, $id, $class=array(), $url_base = ''){
    $class[] = 'list-wrapper';
    $class = implode(' ', $class);
    $output = '<div id="'.$id.'" class="'.$class.'">';
    foreach($items as $i) 
        $output .= render_list_item($i, array(), $url_base, $active_slug);
    $output .= '</div>';
    return $output;
}
