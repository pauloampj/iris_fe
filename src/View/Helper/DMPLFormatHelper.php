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
			case 'id'			: return self::toId($aValue);
			case 'text'			: return self::toText($aValue);
			case 'date'			: return self::toDate($aValue);
			case 'cpfcnpj'		: return self::toCpfCnpj($aValue);
			case 'person_type'	: return self::toPersonType($aValue);
			case 'money'		: return self::toMoney($aValue);
			case 'number'		: return self::toNumber($aValue);
			default				: return self::toText($aValue);
		}
    }
    
    public function toId($aNumber = null){
    	return "#" . $this->_fillWithZeroes($aNumber, 8);
    }
    
    public function toText($aText = null){
    	return $aText;
    }
    
    public function toDate($aDate = null){
    	return date('d/m/Y', strtotime($aDate));
    }
    
    public function toCpfCnpj($aVar = null){
    	if(strlen($aVar) == 11){
    		return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $aVar);
    	}elseif(strlen($aVar) == 14){
    		return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $aVar);
    	}else{
    		return $aVar;
    	}
    }
    
    public function toMoney($aVar = null){
    	return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $aVar);
    }
    
    public function toNumber($aVar = null){
    	return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $aVar);
    }
    
    public function toPersonType($aVar = null){
    	switch($aVar){
    		case 'F'			: return 'Pessoa Física';
    		case 'P'			: return 'Pessoa Juríca';
    		default				: return 'Não identificado';
    	}
    }

}
