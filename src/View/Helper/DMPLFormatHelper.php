<?php

namespace App\View\Helper;

use Cake\View\Helper;

class DMPLFormatHelper extends Helper {

	public static $ID = 1;
	public static $TEXT = 2;
	public static $DATE = 3;
	
	private function _fillWithZeroes($aNumber = null, $aLength = 4){
		$num = isset($aNumber) ? $aNumber : '';
		$c = strlen($num);
		$fill = $aLength - $c;
		$lead = '';
		
		if($fill > 0){
			for($i = 0; $i < $fill; $i++){
				$lead .= '0';
			}
			
			$aNumber = $lead . $aNumber;
		}
		
		return $aNumber;
		
	}
	
    public function format($aValue = null, $aFormat = null) {
		switch($aFormat){
			case 'id': return self::toId($aValue); break;
			case 'text': return self::toText($aValue); break;
			case 'date': return self::toDate($aValue); break;
			default: return self::toText($aValue); break;
		}
    }
    
    public function toId($aNumber = null){
    	return "#" . $this->_fillWithZeroes($aNumber, 8);
    }
    
    public function toText($aText = null){
    	return $aText;
    }
    
    public function toDate($aDate = null){
    	return "data: $aDate";
    }

}
