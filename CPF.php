<?php 
    class CPF {
        var $cpf = null;
        var $uf = array(
            'Rio Grande do Sul',
            'Distrito Federal, Goiás, Mato Grosso do Sul e Tocantins',
            'Acre, Amapá, Amazonas,Pará, Rondonia e Roraima',
            'Ceará, Maranhão, Piauí',
            'Alagoas, Paraíba, Pernambuco e Rio Grande do Norte',
            'Bahia e Sergipe',
            'Minas Gerais',
            'Espírito Santo e Rio de Janeiro',
            'São Paulo',
            'Paraná e Santa Catarina'
        );
    
 		function __construct($data) {		
			$this->cpf = $data;		
		}
		
        function isValid() {
            if(empty($this->cpf)) {
                return false;
            }
            $this->cpf = preg_replace('[^0-9]', '', $this->cpf);
            $this->cpf = str_pad($this->cpf, 11, '0', STR_PAD_LEFT);
            if (strlen($this->cpf) != 11) {
                return false;
            }
            else if (
                $this->cpf == '00000000000' || 
                $this->cpf == '11111111111' || 
                $this->cpf == '22222222222' || 
                $this->cpf == '33333333333' || 
                $this->cpf == '44444444444' || 
                $this->cpf == '55555555555' || 
                $this->cpf == '66666666666' || 
                $this->cpf == '77777777777' || 
                $this->cpf == '88888888888' || 
                $this->cpf == '99999999999'
            ) {
                    return false;
            }
            else {   
                for ($t = 9; $t < 11; $t++) {
                    for ($d = 0, $c = 0; $c < $t; $c++) {
                        $d += $this->cpf{$c} * (($t + 1) - $c);
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($this->cpf{$c} != $d) {
                        return false;
                    }
                }
                return true;
            }
        }

        function getUF(){
            if($this->isValid()) {
                $this->cpf = preg_replace('/[^0-9]/','',$this->cpf);
	            $this->cpf = str_split($this->cpf);    
	            return $this->uf[$this->cpf[8]];
	        }
        }
	}
?>