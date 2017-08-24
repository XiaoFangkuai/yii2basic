<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-8-24
 * Time: 18:19
 */
namespace app\models;

use Yii;
use yii\base\Model;

class Bubble extends Model
{
    public $input;
    public $output;

    public function con(){
    $a=explode(',',$this->input);
    for($i=0;$i<count($a)-1;$i++){
            for($j=0;$j<count($a)-1-$i;$j++){
            if($a[$j]>$a[$j+1]){
                $temp=$a[$j];
                $a[$j]=$a[$j+1];
                $a[$j+1]=$temp;
            }
            }
        }
    $this->output=implode(",",$a);
    }
    public function rules()
    {
        return [
            [['input', 'uoput'], 'safe'],
            ['input', 'string'],
            ['output', 'con'],
        ];
    }
}