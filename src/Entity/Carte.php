<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Carte
 *
 * @ORM\Table(name="carte", uniqueConstraints={@ORM\UniqueConstraint(name="UserName", columns={"UserName"})})
 * @ORM\Entity
 */
class Carte
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDCard", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idcard;

    /**
     * @var string
     *
     * @ORM\Column(name="typeOfCard", type="string", length=200, nullable=false)
     * @Assert\NotBlank(message="Card cant be empty")
     */
    private $typeofcard;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateIncription", type="date", nullable=true)
     * @Assert\NotBlank(message="Date cant be empty")
     */
    private $dateincription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateExpiration", type="date", nullable=true)
     * @Assert\NotBlank(message="Date cant be empty")
     */
    private $dateexpiration;

    /**
     * @var string
     *
     * @ORM\Column(name="ImageCard", type="string", length=110, nullable=false)
     * @Assert\NotBlank(message="image cant be empty")
     */
    private $imagecard;

    /**
     *
     * @ORM\OneToOne(targetEntity="User",inversedBy="carte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="UserName", nullable=false , referencedColumnName="UserName")
     * })
     *
     * @ORM\Column(name="UserName", type="string", length=20, nullable=false)
     * @Assert\NotBlank(message="Username cant be empty")
     */
    private $username;

    /**
     * @return int
     */
    public function getIdcard(): ?int
    {
        return $this->idcard;
    }

    /**
     * @param int $idcard
     */
    public function setIdcard(int $idcard): void
    {
        $this->idcard = $idcard;
    }

    /**
     * @return string
     */
    public function getTypeofcard(): ?string
    {
        return $this->typeofcard;
    }

    /**
     * @param string $typeofcard
     */
    public function setTypeofcard(string $typeofcard): void
    {
        $this->typeofcard = $typeofcard;
    }

    /**
     * @return \DateTime
     */
    public function getDateincription() :?\DateTime
    {
        return $this->dateincription;
    }

    /**
     * @param \DateTime|null $dateincription
     */
    public function setDateincription($dateincription): void
    {
        $this->dateincription = $dateincription;
    }


    /**
     * @return \DateTime
     */
    public function getDateexpiration() :?\DateTime
    {
        return $this->dateexpiration;
    }

    /**
     * @param \DateTime|null $dateexpiration
     */
    public function setDateexpiration($dateexpiration): void
    {
        $this->dateexpiration = $dateexpiration;
    }

    /**
     * @return string
     */
    public function getImagecard(): ?string
    {
        return $this->imagecard;
    }

    /**
     * @param string $imagecard
     */
    public function setImagecard(string $imagecard): void
    {
        $this->imagecard = $imagecard;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }





}
