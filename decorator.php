<?php
//PHP装饰者设计模式

//具体执行类和装饰类的共同抽象父类
interface Component {

	public function display();

}

//具体执行类
class Concrete implements Component {

	public function display() 
	{
		echo 'do';
	}
}

//装饰类的共同父类
class Decorator implements Component {

	private $component;

	public function __construct(Component $component)
	{
		$this->component = $component;
	}

	public function display() 
	{
		$this->component->display();
	}
}

//具体装饰类
class Eat extends Decorator {

	public function display()
	{
		echo 'eat ';
		parent::display();
	}
}

//具体装饰类
class Sleep extends Decorator {

	public function display()
	{
		parent::display();
		echo ' sleep';
	}
}


$do = new Concrete();
//注入具体执行类
$eat = new Eat($do);
//多层装饰
$sleep = new Sleep($eat);

$sleep->display();
 
?>