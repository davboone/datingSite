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

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (Validation::validName($fname)) {
                $_SESSION['fName'] = $fname;
            } else {
                $this->_f3->set('errors["fname"]', 'Please enter a first name.');
            }
            if (Validation::validName($lname)) {
                $_SESSION['lname'] = $lname;
            } else {
                $this->_f3->set('errors["lname"]', 'Please enter a last name.');
            }
            if (Validation::validAge($age)) {
                $_SESSION['age'] = $age;
            } else {
                $this->_f3->set('errors["age"]', 'Please enter an age. (18 & up)');
            }
            if (Validation::validPhone($phoneNum)) {
                $_SESSION['phoneNum'] = $phoneNum;
            } else {
                $this->_f3->set('errors["phoneNum"]', 'Please enter a valid phone number.');
            }

            $this->_f3->set('fname', $fname);
            $this->_f3->set('lname', $lname);
            $this->_f3->set('age', $age);
            $this->_f3->set('phoneNum', $phoneNum);

            $_SESSION['gender'] = $_POST['gender'];

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

    }
}