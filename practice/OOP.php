
<?php
/*

class myName{
    public $name = "Mridul";
    public $age = 20;
    public function fullName()
    {
        return "Muhammad Mridul Hosen Kibria";
    }

    public function anotherName($name2)
    {
        return "</br>Hi there".$name2;
    }
}
$object1 = new myName;

echo $object1->age;
echo $object1->anotherName(' Mridul');


1 class over


*/

// -----------------------
/*
class class2{
    public $name;
}
$ob2 = new class2;
$ob2->name = "My name in Mridul";
echo $ob2->name;
*/

// -------------------------

/*
class class2{
    public $name = "Mridul";
    public function GetName()
    {
        // $name = "Kibria";
        return $this-> name;
    }
}
$ob3 = new class2;
echo $ob3-> GetName();
*/




/*

class student{
    public $name;
    public $age;
    public $cgpa;

// getter 
public function getName()
{
    return $this->name;
}
public function getAge()
{
    return $this->age;
}
public function getCgpa()
{
    return $this->cgpa;
}

// setter 
public function setName2($name1)
{
    $this->name = $name1;
}
public function setAge($age1)
{
    $this->age = $age1;
}

public function setCgpa($cgpa1)
{
    $this->cgpa = $cgpa1;
}



}

$ob4 = new student;
$ob4->setName2("kibria");
$ob4->setAge(25);
$ob4->setCgpa(3.45);

echo $ob4->getName();
echo "</br>";
echo $ob4->getAge();
echo "</br>";
echo $ob4->getCgpa();
echo "</br>";

class 2 over
*/

/*
class parentClass{
    public $name = "Mridul";
    public $age = 20;
    public function fullName()
    {
        return "Muhammad Mridul Hosen Kibria";
    }
}

class childClass extends parentClass{
    public $yourName = "Hamim";
}

$ourChild = new childClass;
echo $ourChild->name;
echo $ourChild->yourName;

class 3 over

*/


/*

class test {
public $a = 100;
private $b = 200;
protected $c = 300;

private function bProperty()
{
    return $this->b;
}
public function FBProperty()
{
    return $this->bProperty();
}



}

// class childClass extends test{
//     public function protecM()
//     {
//         return $this->c;
//     }
// }
$ob5 = new test;
echo $ob5->FBProperty();


class 4 over
*/




/*
class test2{
    private const NAME = 'Mridul';
    public function myConst()
    {
       return self::NAME;
    }
}
$ob6 = new test2;
echo $ob6->myConst();

clas 5 over
*/


/*

// magic function 

class test7{
    public function __construct($age)
    {
        echo "Hi there, this is Mridul".$age;
    }
}
$ob8 = new test7(' age 20');
*/


?>
