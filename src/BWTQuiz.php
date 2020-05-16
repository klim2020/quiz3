<?php
namespace app;

/**
 * Class BWTQuiz
 * @package app
 */
class BWTQuiz{
    /**
     * 1.Returns max element from arrray
     * @param array $arr
     * @return mixed returns max element from array, if no  returns false;
     */
    public function firstTask(array $arr){

        if ((!is_array($arr))|(count($arr)===0)){return false;}
        $max = $arr[0];
        foreach ($arr as $val){
            if ($max<$val){
                $max=$val;
            }
        }
        return $max;
    }

    /**
     * 2. Bubble sort
     * @param array $arr
     * @return array sorted array
     */
    public function secondTask(array $arr){
        usort($arr,function( $a, $b ) {
                if(  $a ==  $b ){ return 0 ; }
                return ($a < $b) ? -1 : 1;
        });
        return $arr;
    }


    /**
     * 4. Performs binary search in a sorted(by ascending order) array
     * returns element index or -1 if no element exists
     * @param mixed $value
     * @param array $arr
     * @return int value index
     */
    public function fourthTask(array $arr, $value){

        if (count($arr) === 0) return false;
        $low = 0;
        $high = count($arr) - 1;

        while ($low <= $high) {

            // compute middle index
            $mid = floor(($low + $high) / 2);

            // element found at mid
            if($arr[$mid] == $value) {
                return $mid;
            }

            if ($value < $arr[$mid]) {
                // search the left side of the array
                $high = $mid -1;
            }
            else {
                // search the right side of the array
                $low = $mid + 1;
            }
        }

        // If we reach here element value doesnt exist
        return -1;

    }


    public function sixthTask($text){
       $length     = mb_strlen($text);/*получаем длину строки*/
       $halfLength = floor($length / 2);
       $lastCharIndex = $length - 1;
         for ($i = 0; $i <= $halfLength; $i ++) {
            if ($text[$i] != $text[$lastCharIndex - $i]){
                return false;
            }
             return true;
         }

    }

}

class Vector{
    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }
    private int $x, $y;
    public function __construct($x,$y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    public function add(Vector $v){
        return new Vector($v->getX()+$this->x,$v->getY()+$this->y);
    }
    public function subtract(Vector $v){
        return new Vector($this->x-$v->getX(),$this->y-$v->getY());
    }
    public function multiply(int $val){
        return new Vector($this->x*$val,$this->y*$val);
    }
    public function print($color="\e[34m"){
        return $color.'vector(x='.$this->x.',y='.$this->y.')'."\e[0m";
    }




}

$tests = new BWTQuiz();
echo "\e[32m 1.Task. find maximum \e[0m \n";
echo "input is [1,3,4,5,6], max is:\e[34m".$tests->firstTask([1,3,4,5,6])."\e[0m\n";
echo "input is [3,4,5,1], max is:\e[34m".$tests->firstTask([3,4,5,1,2])."\e[0m\n";

echo "\e[32m  2.Task. bubble sort \e[0m\n";
echo "input is [1,9,4,5,6], out is:\e[34m".join(',',$tests->secondTask([1,9,4,5,6]))."\e[0m\n";
echo "input is [3,4,5,1], out is:\e[34m".join(',',$tests->secondTask([3,4,5,1,2]))."\e[0m\n";

echo "\e[32m 4.Task bubble sort \e[0m\n";
echo "input is [1,2,4,5,6],search for 6 out index is is:\e[34m".$tests->fourthTask([1,2,4,5,6],6)."\e[0m\n";
echo "input is [9,11,15,61,99,101],search for 6 out index is is:\e[34m".$tests->fourthTask([9,11,15,61,99,101],6)."\e[0m\n";
echo "input is [9,11,15,61,99,101],search for 6 out index is is:\e[34m".$tests->fourthTask([9,11,15,61,99,101],99)."\e[0m\n";

echo "\e[32m 5.Task. Math vector \e[0m\n";
$vector = new Vector(3,4);
echo "vector is ".$vector->print()."\n";
$vector2 = new Vector(2,3);
echo "create new vector ".$vector2->print()."\n";
$addvector = $vector->add($vector2);
echo "add: ".$vector->print()."+".$vector2->print()."=".$addvector->print()."\n";
$vector3 = new Vector(1,2);
$subtractvector = $addvector->subtract($vector3);
echo "subtraction from ".$addvector->print()." - ".$vector3->print()."=".$subtractvector->print()."\n";
$mulvector = $subtractvector->multiply(3);
echo "multiply:".$subtractvector->print()."*3 = ".$mulvector->print()."\n";

echo "\e[32m 6. Task. Check if string is Palindrome \e[0m\n";
echo "checking string 543345:\e[34m".(($tests->sixthTask("543345")==true)?'true':'false')."\e[0m\n";
echo "checking string 5433452:\e[34m".(($tests->sixthTask("5433452")==true)?'true':'false')."\e[0m\n";
echo "checking string civic:\e[34m".(($tests->sixthTask("civic")==true)?'true':'false')."\e[0m\n";
?>
