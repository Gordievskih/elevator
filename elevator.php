<?php 
//Скрипт для лифта. Перемещение обьекта вверх и вниз.Так как в ТЗ не указан функционал, мой лифт умеет проверять перевес, передвигаться между этажами и в случае попадания на нулевой этаж ( 0 floor) выдает дополнительную информацию что это паркинг.

$object = new Elevator;       // создаем обьект класса Elevator.
$object->maxweight = "250";   //грузоподьемность лифта
$object->weight_users = "150";//вес пасажиров 
$object->startFloor = "1";    //этаж на котором находиться лифт
$object->needFloor = "15";	//этаж на который нужно попасть
$object->elevatorMove();
$result = $object->startFloor; // присваиваем переменной $result результат вызова  метода класса Elevator - elevatorMove.

if ($result == '0') {
	$result = "0 - Parking";
}

echo "Your floor is ".$result;// выводим результат.

class Elevator
{
	public $startFloor,$needFloor,$maxweight,$weight_users;

	public function elevatorMove()
	{
		if ($this->weight_users < $this->maxweight) //проверяем нет ли перевеса если все ок выполняем код,													если нет выдаем сообщение об ошибке.
		{
			if ($this->startFloor < $this->needFloor)
						//если стартовая точка меньше чем конечная тогда выполняем цикл и после каждой итерации поднимаемся на этаж выше.
				{
						echo "Elevator coming up...<br>";
							for ($this->startFloor; $this->startFloor<$this->needFloor ; $this->startFloor++) 
							{ 
								echo $this->startFloor." floor<br>";
							}
				}else 	
						//если конечная точка меньше чем стартовая тогда выполняем цикл и после каждой итерации опускаемся на этаж ниже.
					{
						echo "Elevator coming down...<br>";
							for ($this->startFloor; $this->startFloor > $this->needFloor; $this->startFloor--) 
							{ 
								echo $this->startFloor." floor<br>";
							}
					}
			}else{
				echo "Warning max weight!";
		}

	
	} 


}
