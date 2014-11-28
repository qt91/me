<?php
	/**
	 * Convert Days of week
	 * @param number $num is number from 2 to 8
	 * @return string Days of Week
	 */
	function number_to_day_of_week($num){
		$out = 'Thứ hai';
		switch ($num) {
			case 3: $out = 'Thứ ba';break;
			case 4: $out = 'Thứ tư';break;
			case 5: $out = 'Thứ năm';break;
			case 6: $out = 'Thứ sáu';break;
			case 7: $out = 'Thứ bảy';break;
			case 8: $out = 'Chủ Nhật';break;
			default: $out = 'Thứ hai';break;
		}
		return $out;
	}