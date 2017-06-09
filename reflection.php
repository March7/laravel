<?php
//PHP反射学习
interface Abc {

}
class test {

	public $test;

	public function __construct(Abc $test1)
	{
		$this->test = $test;
	} 
	public function setTest ($test)
	{
		$this->test = $test;
	}
	public function getTest()
	{
		echo $this->test;
	}
}

//获取test类的反射
$test = new ReflectionClass('test');

//获取test类的构造函数
$construct = $test->getConstructor();
//获取test类构造函数的参数
$para = $construct->getParameters();
//获取参数名
$className = $para[0]->name;
//如果参数是实例化对象，获取对象名称
$paraClassName = $para[0]->getClass();


echo $className;
echo '<br>';
var_dump($paraClassName);

?>