<?php

class Controller
{
    private $_f3; //router

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    public function home()
    {
        //Display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    public function personalInfo()
    {
        //Reinitialize session array
        $_SESSION = array();

        $_SESSION['member'] = new Member();

        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $age = $_POST['age'];
        $phoneNum = $_POST['phoneNum'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['premiumChoice'] = $_POST['premium'];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (Validation::validName($fname)) {
                $_SESSION['member']->setFname($fname);
            } else {
                $this->_f3->set('errors["fname"]', 'Please enter a first name.');
            }
            if (Validation::validName($lname)) {
                $_SESSION['member']->setLname($lname);
            } else {
                $this->_f3->set('errors["lname"]', 'Please enter a last name.');
            }
            if (Validation::validAge($age)) {
                $_SESSION['member']->setAge($age);
            } else {
                $this->_f3->set('errors["age"]', 'Please enter an age. (18 & up)');
            }
            if (Validation::validPhone($phoneNum)) {
                $_SESSION['member']->setPhone($phoneNum);
            } else {
                $this->_f3->set('errors["phoneNum"]', 'Please enter a valid phone number.');
            }
            if(!empty($_SESSION['premiumChoice'])&&empty($this->_f3->get('errors'))){
                $_SESSION['member'] = new PremiumMember($_SESSION['member']->getFname(),$_SESSION['member']->getLname(),
                                                        $_SESSION['member']->getAge(), $_SESSION['member']->getGender(),
                                                        $_SESSION['member']->getPhone());
            }

            $this->_f3->set('fname', $fname);
            $this->_f3->set('lname', $lname);
            $this->_f3->set('age', $age);
            $this->_f3->set('phoneNum', $phoneNum);



            if (empty($this->_f3->get('errors'))) {
                header("location: profile");
            }
        }

        //Display personal info form
        $view = new Template();
        echo $view->render('views/personalInfo.html');
    }

    public function profile()
    {
        $email = $_POST['email'];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(Validation::validEmail($email)){
                $_SESSION['member']->setEmail($email);
            }
            else{
                $this->_f3->set('errors["email"]','Please enter a valid email.');
            }

            $_SESSION['choice'] = false;
            $_SESSION['member']->setState($_POST['state']);
            $_SESSION['member']->setBio($_POST['bio']);
            $_SESSION['member']->setSeeking($_POST['seeking']);

            if(empty($this->_f3->get('errors'))&&!empty($_SESSION['premiumChoice'])) {
                $_SESSION['choice'] = true;
                header("location: interests");
            } else {
                header("location: summary");
            }

        }
        $this->_f3->set('email',$email);

        //Display the profile form
        $view = new Template();
        echo $view->render('views/profile.html');
    }

    public function interests()
    {
        //Display the interests options

        $inDoor = $_POST['inDoor'];
        $outDoor = $_POST['outDoor'];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!empty($outDoor))
            {
                if(Validation::validOutdoor($outDoor)){
                    $_SESSION['member']->setOutDoorInterests(implode(", ",$outDoor));
                }
                else{
                    $this->_f3->set('errors["outDoor"]','Please pick valid out-door interests.');
                }
            }
            if(!empty($inDoor))
            {
                if(Validation::validIndoor($inDoor)){
                    $_SESSION['member']->setInDoorInterests(implode(", ",$inDoor));
                }
                else{
                    $this->_f3->set('errors["inDoor"]','Please pick valid in-door interests.');
                }
            }
            if(empty($this->_f3->get('errors'))){
                header("location: summary");
            }

        }

        //get the data from the model
        $this->_f3->set("indoorInterests",DataLayer::getIndoorInterests());
        $this->_f3->set("outdoorInterests",DataLayer::getOutdoorInterests());

        //user data
        $this->_f3->set('inDoor',$inDoor);
        $this->_f3->set('outDoor',$outDoor);

        $view = new Template();
        echo $view->render('views/interests.html');
    }

    public function summary()
    {
        //Display the profile summary
        $view = new Template();
        echo $view->render('views/profileSummary.html');
    }
}