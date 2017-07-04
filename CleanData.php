<?php
		function sauber($data) {
			if (is_array ( $data )) {
				// if data is array then do the mapping and send the values back to the same function one by one
				$cleanData = array_map ( 'sauberMachen', $data );
			} else {
				
				if (filter_var ( $data, FILTER_VALIDATE_EMAIL )) {
					// if EMAIL
					$cleanData = filter_var ( $data, FILTER_SANITIZE_EMAIL );
				}			
				
				elseif (filter_var ( $data, FILTER_VALIDATE_URL )) {
					// if URL
					$cleanData = filter_var ( $data, FILTER_SANITIZE_URL );
				}			
				
				else {
					// if anything else (string, ip ...)
					$cleanData = filter_var ( $data, FILTER_SANITIZE_STRIPPED );
					$cleanData = filter_var ( $cleanData, FILTER_SANITIZE_STRING );
					$cleanData = filter_var ( $cleanData, FILTER_SANITIZE_SPECIAL_CHARS );
				}
			}
			return $cleanData;
		}
?>