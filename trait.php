<?php
trait Calculator {
    public function sum($a, $b) {
        return $a + $b;
    }

    public function sub($a, $b) {
        return $a - $b;
    }

    public function mul($a, $b) {
        return $a * $b;
    }

    public function div($a, $b) {
        if ($b == 0) {
            throw new InvalidArgumentException("Division by zero");
        }
        return $a / $b;
    }

    public function sqr($a) {
        return sqrt($a);
    }
}

class Rettangolo {
    use Calculator; // Utilizza il trait Calculator

    private $b; // Base
    private $h; // Altezza

    public function __construct($b, $h) {
        $this->b = $b;
        $this->h = $h;
    }

    public function area() {
        return $this->mul($this->b, $this->h);
    }

    public function perimetro() {
        return $this->sum($this->sum($this->b, $this->b), $this->sum($this->h, $this->h));
    }

    public function diagonale() {
        return $this->sqr($this->sum($this->mul($this->b, $this->b), $this->mul($this->h, $this->h)));
    }
}

$rettangolo = new Rettangolo(3, 4);

echo "Area: " . $rettangolo->area() . "\n";          // Output: Area: 12
echo "Perimetro: " . $rettangolo->perimetro() . "\n"; // Output: Perimetro: 14
echo "Diagonale: " . $rettangolo->diagonale() . "\n";  // Output: Diagonale: 5

?>