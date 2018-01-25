function cleanData($data) {
	if (is_array ( $data )) {
		// if array 
		$cleanData = array_map ( 'cleanData', $data );
	} else {
		
		if (filter_var ( $data, FILTER_VALIDATE_EMAIL )) {
			// if EMAIL
			$cleanData = filter_var ( $data, FILTER_SANITIZE_EMAIL );
		} elseif (filter_var ( $data, FILTER_VALIDATE_URL )) {
			// if URL
			$cleanData = filter_var ( $data, FILTER_SANITIZE_URL );
		} else {
			// if anything else (string, ip ...)
			$cleanData = filter_var ( $data, FILTER_SANITIZE_STRIPPED );
			$cleanData = filter_var ( $cleanData, FILTER_SANITIZE_STRING );
			$cleanData = filter_var ( $cleanData, FILTER_SANITIZE_SPECIAL_CHARS );
		}
	}
	return $cleanData;
}

