<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apartment
 *
 * @ORM\Table(name="apartment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ApartmentRepository")
 */
class Apartment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="move_in_date", type="date")
     */
    private $moveInDate;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var int
     *
     * @ORM\Column(name="post_code", type="integer")
     */
    private $postCode;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=100)
     */
    private $town;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set moveInDate
     *
     * @param \DateTime $moveInDate
     *
     * @return Apartment
     */
    public function setMoveInDate($moveInDate)
    {
        $this->moveInDate = $moveInDate;

        return $this;
    }

    /**
     * Get moveInDate
     *
     * @return \DateTime
     */
    public function getMoveInDate()
    {
        return $this->moveInDate;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Apartment
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set postCode
     *
     * @param integer $postCode
     *
     * @return Apartment
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return int
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set town
     *
     * @param string $town
     *
     * @return Apartment
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Apartment
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Apartment
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}

