<?
function wrap_accents($string){
	if ( !preg_match('/[\x80-\xff]/', $string) ){
        return $string;
	}
    else
    {
    	$unwanted_array = array(
    		chr(195).chr(128), chr(195).chr(129),
		    chr(195).chr(130), chr(195).chr(131),
		    chr(195).chr(132), chr(195).chr(133),
		    chr(195).chr(135), chr(195).chr(136),
		    chr(195).chr(137), chr(195).chr(138),
		    chr(195).chr(139), chr(195).chr(140),
		    chr(195).chr(141), chr(195).chr(142),
		    chr(195).chr(143), chr(195).chr(145),
		    chr(195).chr(146), chr(195).chr(147),
		    chr(195).chr(148), chr(195).chr(149),
		    chr(195).chr(150), chr(195).chr(153),
		    chr(195).chr(154), chr(195).chr(155),
		    chr(195).chr(156), chr(195).chr(157),
		    chr(195).chr(159), chr(195).chr(160),
		    chr(195).chr(161), chr(195).chr(162),
		    chr(195).chr(163), chr(195).chr(164),
		    chr(195).chr(165), chr(195).chr(167),
		    chr(195).chr(168), chr(195).chr(169),
		    chr(195).chr(170), chr(195).chr(171),
		    chr(195).chr(172), chr(195).chr(173),
		    chr(195).chr(174), chr(195).chr(175),
		    chr(195).chr(177), chr(195).chr(178),
		    chr(195).chr(179), chr(195).chr(180),
		    chr(195).chr(181), chr(195).chr(182),
		    chr(195).chr(182), chr(195).chr(185),
		    chr(195).chr(186), chr(195).chr(187),
		    chr(195).chr(188), chr(195).chr(189),
		    chr(195).chr(191),
		    // Decompositions for Latin Extended-A
		    chr(196).chr(128), chr(196).chr(129),
		    chr(196).chr(130), chr(196).chr(131),
		    chr(196).chr(132), chr(196).chr(133),
		    chr(196).chr(134), chr(196).chr(135),
		    chr(196).chr(136), chr(196).chr(137),
		    chr(196).chr(138), chr(196).chr(139),
		    chr(196).chr(140), chr(196).chr(141),
		    chr(196).chr(142), chr(196).chr(143),
		    chr(196).chr(144), chr(196).chr(145),
		    chr(196).chr(146), chr(196).chr(147),
		    chr(196).chr(148), chr(196).chr(149),
		    chr(196).chr(150), chr(196).chr(151),
		    chr(196).chr(152), chr(196).chr(153),
		    chr(196).chr(154), chr(196).chr(155),
		    chr(196).chr(156), chr(196).chr(157),
		    chr(196).chr(158), chr(196).chr(159),
		    chr(196).chr(160), chr(196).chr(161),
		    chr(196).chr(162), chr(196).chr(163),
		    chr(196).chr(164), chr(196).chr(165),
		    chr(196).chr(166), chr(196).chr(167),
		    chr(196).chr(168), chr(196).chr(169),
		    chr(196).chr(170), chr(196).chr(171),
		    chr(196).chr(172), chr(196).chr(173),
		    chr(196).chr(174), chr(196).chr(175),
		    chr(196).chr(176), chr(196).chr(177),
		    chr(196).chr(178), chr(196).chr(179),
		    chr(196).chr(180), chr(196).chr(181),
		    chr(196).chr(182), chr(196).chr(183),
		    chr(196).chr(184), chr(196).chr(185),
		    chr(196).chr(186), chr(196).chr(187),
		    chr(196).chr(188), chr(196).chr(189),
		    chr(196).chr(190), chr(196).chr(191),
		    chr(197).chr(128), chr(197).chr(129),
		    chr(197).chr(130), chr(197).chr(131),
		    chr(197).chr(132), chr(197).chr(133),
		    chr(197).chr(134), chr(197).chr(135),
		    chr(197).chr(136), chr(197).chr(137),
		    chr(197).chr(138), chr(197).chr(139),
		    chr(197).chr(140), chr(197).chr(141),
		    chr(197).chr(142), chr(197).chr(143),
		    chr(197).chr(144), chr(197).chr(145),
		    chr(197).chr(146), chr(197).chr(147),
		    chr(197).chr(148), chr(197).chr(149),
		    chr(197).chr(150), chr(197).chr(151),
		    chr(197).chr(152), chr(197).chr(153),
		    chr(197).chr(154), chr(197).chr(155),
		    chr(197).chr(156), chr(197).chr(157),
		    chr(197).chr(158), chr(197).chr(159),
		    chr(197).chr(160), chr(197).chr(161),
		    chr(197).chr(162), chr(197).chr(163),
		    chr(197).chr(164), chr(197).chr(165),
		    chr(197).chr(166), chr(197).chr(167),
		    chr(197).chr(168), chr(197).chr(169),
		    chr(197).chr(170), chr(197).chr(171),
		    chr(197).chr(172), chr(197).chr(173),
		    chr(197).chr(174), chr(197).chr(175),
		    chr(197).chr(176), chr(197).chr(177),
		    chr(197).chr(178), chr(197).chr(179),
		    chr(197).chr(180), chr(197).chr(181),
		    chr(197).chr(182), chr(197).chr(183),
		    chr(197).chr(184), chr(197).chr(185),
		    chr(197).chr(186), chr(197).chr(187),
		    chr(197).chr(188), chr(197).chr(189),
		    chr(197).chr(190), chr(197).chr(191)
    	);
    	$replacement = array();
    	foreach($unwanted_array as $item)
    	{
    		$replacement[] = '<span class="accent">'.$item.'</span>';	
    	}
    	$output = str_replace($unwanted_array, $replacement, $string);
    	return $output;
    }
}

?>