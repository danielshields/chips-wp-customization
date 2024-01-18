<?php 

// CUSTOM RTE FORMATS
add_filter( 'mce_buttons', 'chips_wp_custom_format_buttons' );
function chips_wp_custom_format_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'tiny_mce_before_init', 'chips_wp_custom_mce_before_init' );

function chips_wp_custom_mce_before_init( $settings ) {
	$style_formats = array();
	$formatsRaw = get_option('chips_wp_custom_rte_formats');

    if($formatsRaw){
		$formats = explode("\n", $formatsRaw);

		if(!empty($formats)){
			foreach($formats as $rteSingle){
				$fArray = array();
				$formatOptions = explode('|', $rteSingle);
				if(isset($formatOptions[0]) && $formatOptions[0] !== ''){
					$fArray['title'] = $formatOptions[0];
				}

				if(isset($formatOptions[3]) && $formatOptions[3] !== ''){
					if($formatOptions[3] === 'block'){
						$fArray[$formatOptions[3]] = 'div';
					} else {
						// $fArray[$formatOptions[3]] = $formatOptions[3];
						$fArray[$formatOptions[3]] = 'span';
					}
				}
				
				if(isset($formatOptions[1]) && $formatOptions[1] !== ''){
					$fArray['classes'] = $formatOptions[1];
				}

				if(isset($formatOptions[4]) && $formatOptions[4] === 'wrap'){
					$fArray['wrapper'] = true;
				}
				
				if(isset($formatOptions[2]) && $formatOptions[2] !== ''){
					$fArray['selector'] = $formatOptions[2];
				}

				// print_r($fArray);

				$style_formats[] = $fArray;
			}
		}


		/*
		foreach($formats as $frmt){
	    	$fArray = array();

			// Jumbo|jumbo|selector|inline|wrap


	    	$fArray['title'] = $frmt['title'];
	    	if($frmt['type'] === 'inline' && $frmt['type'] !== null){
	    		$fArray['inline'] = $frmt['inline'];
	    	} else {
	    		$fArray['block'] = $frmt['block'];
	    	}

	    	if($frmt['classes'] !== '' && $frmt['classes'] !== null){
	    		$fArray['classes'] = $frmt['classes'];
	    	}

	    	if($frmt['selector'] !== '' && $frmt['selector'] !== null){
	    		$fArray['selector'] = $frmt['selector'];
	    	}

	    	if($frmt['exact']){
	    		$fArray['exact'] = true;
	    	}

	    	if($frmt['wrapper']){
	    		$fArray['wrapper'] = true;
	    	}

			$style_formats[] = $fArray;
		}
		*/
    }

	$settings['style_formats'] = json_encode( $style_formats );
	return $settings;
}