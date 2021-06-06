<?php

class PremiumMember extends Member
{
    private array $_inDoorInterests;
    private array $_outDoorInterests;

    public function __construct($fname = "", $lname = "", $age = 0, $gender = "", $phone = "")
    {
        parent::__construct($fname, $lname, $age, $gender, $phone);
    }

    /**
     * @return string
     */
    public function getFname(): string
    {
        return parent::getFname();
    }

    /**
     * @param string $fname
     */
    public function setFname(string $fname): void
    {
        parent::setFname($fname);
    }

    /**
     * @return string
     */
    public function getLname(): string
    {
        return parent::getLname();
    }

    /**
     * @param string $lname
     */
    public function setLname(string $lname): void
    {
        parent::setLname($lname);
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return parent::getAge();
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        parent::setAge($age);
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return parent::getGender();
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        parent::setGender($gender);
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return parent::getPhone();
    }

    /**
     * @param string $phone
     */
    public function setPhone(mixed $phone): void
    {
        parent::setPhone($phone);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return parent::getEmail();
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        parent::setEmail($email);
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return parent::getState();
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        parent::setState($state);
    }

    /**
     * @return string
     */
    public function getSeeking(): string
    {
        return parent::getSeeking();
    }

    /**
     * @param string $seeking
     */
    public function setSeeking(string $seeking): void
    {
        parent::setSeeking($seeking);
    }

    /**
     * @return string
     */
    public function getBio(): string
    {
        return parent::getBio();
    }

    /**
     * @param string $bio
     */
    public function setBio(string $bio): void
    {
        parent::setBio($bio);
    }

    /**
     * @return array
     */
    public function getInDoorInterests(): array
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param array $inDoorInterests
     */
    public function setInDoorInterests(array $inDoorInterests): void
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return array
     */
    public function getOutDoorInterests(): array
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param array $outDoorInterests
     */
    public function setOutDoorInterests(array $outDoorInterests): void
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}