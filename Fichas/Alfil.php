<?php

class Alfil {

	protected $_color;

	public function __construct($color) {
		$this->_color = $color;
	}

	public function __toString() {
        return "Alfil";
    }

	public function getColor() {
		return $this->_color;
	}

	public function dibujarFicha() {
		switch ($this->_color) {
			case 'blanco':
				return "img/default/alfil-b.png";
			break;
			
			case 'negro':
				return "img/default/alfil-n.png";
			break;
		}
	}

	// Devuelve la posición mas cercana permitida para la ficha con su respectivo color
	public static function closestPos($desde,$hasta) {
		$Desde = explode('-', $desde);
		$Hasta = explode('-', $hasta);

		$from_x = $Desde[0];
		$from_y = $Desde[1];
		$to_x = $Hasta[0];
		$to_y = $Hasta[1];

		// Se mueve en diagonal [SE]
		if ($from_x<$to_x && $from_y<$to_y) {
			$x= $from_x+1;
			$y= $from_y+1;
			return $x."-".$y;
		// Se mueve en diagonal [SO]
		} elseif ($from_x<$to_x && $from_y>$to_y) {
			$x= $from_x+1;
			$y= $from_y-1;
			return $x."-".$y;
		// Se mueve en diagonal [NE]
		} elseif ($from_x>$to_x && $from_y<$to_y) {
			$x= $from_x-1;
			$y= $from_y+1;
			return $x."-".$y;
		// Se mueve en diagonal [NO]
		} elseif ($from_x>$to_x && $from_y>$to_y) {
			$x= $from_x-1;
			$y= $from_y-1;
			return $x."-".$y;
		}

	}

	public function puedeMover($From,$To) {
		$Desde = explode('-', $From);
		$Hasta = explode('-', $To);

		$from_x = $Desde[0];
		$from_y = $Desde[1];
		$to_x = $Hasta[0];
		$to_y = $Hasta[1];
		
		if (abs($to_x - $from_x) == abs($to_y - $from_y)) {
			return TRUE;
		}else{
			return FALSE;
		}


	}
}
?>
