<?php

abstract class Human
{
    private $jmbg;

    protected $firstName;

    protected $lastName;

    public function __construct($firstName, $lastName, $jmbg)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->jmbg = $jmbg;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getJmbg()
    {
        return $this->jmbg;
    }

    public function setJmbg($jmbg)
    {
        $this->jmbg = $jmbg;
    }


    abstract public function about();

    abstract public function walk();

    abstract public function sleep();

    abstract public function eat();

    abstract public function talk();



}

class Male extends Human
{

    protected $gender;

    public function __construct($firstName, $lastName, $jmbg, $gender)
    {
        parent::__construct($firstName, $lastName, $jmbg);

        $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }


    public function about()
    {
        echo "Moji podaci su:\n";
        echo "ime: " . $this->firstName . "\n";
        echo "prezime: " . $this->lastName . "\n";
        echo "jmbg: " . $this->getJmbg() . "\n";
        echo "pol: " . $this->gender . "\n";
    }

    public function walk()
    {
        echo $this->firstName ."je krenuo u setnju \n";
    }

    public function sleep()
    {
        echo $this->firstName ."spava \n";
    }

    public function eat()
    {
        echo $this->firstName ."je seo da jede \n";
    }

    public function talk()
    {
        echo $this->firstName ."prica \n";
    }
}

class Female extends Human
{

    protected $gender;

    public function __construct($firstName, $lastName, $jmbg, $gender)
    {
        parent::__construct($firstName, $lastName, $jmbg);

        $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }


    public function about()
    {
        echo "Moji podaci su:\n";
        echo "ime: " . $this->firstName . "\n";
        echo "prezime: " . $this->lastName . "\n";
        echo "jmbg: " . parent::getJmbg() . "\n";
        echo "pol: " . $this->gender . "\n";
    }

    public function walk()
    {
        echo $this->firstName ." voli duge setnje \n";
    }

    public function sleep()
    {
        echo $this->firstName ."cesto spava \n";
    }

    public function eat()
    {
        echo $this->firstName ."malo jede \n";
    }

    public function talk()
    {
        echo $this->firstName ."voli da prica \n";
    }

}

class People
{

    /**
     * @var Human[]
     */
    protected $humans = array();

    public function addPerson(Human $human)
    {

        $this->humans[] = $human;
    }

    public function izlistajOsobe()
    {

        echo "Lista osoba: \n\n";

        foreach ($this->humans as $human)
        {
            $human->about();
            echo "\n";
        }
    }
}


header('Content-Type: text/plain');

$m1 = new Male('Petar', 'Petrovic', '123456789', 'muski');
$m2 = new Male('Nikola', 'Nikolic', '123456789', 'muski');
$m3 = new Male('Marko', 'Markovic', '123456789', 'muski');

$f1 = new Female('Ivana', 'Ivanic', '123456789', 'zenski');
$f2 = new Female('Marija', 'Maric', '123456789', 'zenski');
$f3 = new Female('Tijana', 'Tijanic', '123456789', 'zenski');


$people = new People();

$people->addPerson($m1);
$people->addPerson($m2);
$people->addPerson($m3);
$people->addPerson($f1);
$people->addPerson($f2);
$people->addPerson($f3);

$people->izlistajOsobe();