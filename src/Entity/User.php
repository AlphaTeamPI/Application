<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=20, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=20, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=20, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ImageUser", type="string", length=2000, nullable=true)
     */
    private $imageuser;

    /**
     * @var string
     *
     * @ORM\Column(name="Role", type="string", length=20, nullable=false)
     */
    private $role;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateDeNaissance", type="date", nullable=true)
     */
    private $datedenaissance;

    /**
     * @var int|null
     *
     * @ORM\Column(name="PasswordOublie", type="integer", nullable=true)
     */
    private $passwordoublie;

    /**
     * @var int
     *
     * @ORM\Column(name="online", type="integer", nullable=false)
     */
    private $online;

    /**
     * @ORM\OneToMany(targetEntity=Suggestions::class, mappedBy="participantId")
     */
    private $suggestions;
    /**
     * @ORM\OneToMany(targetEntity=Produits::class, mappedBy="participantId")
     */
    private $produit;

    /**
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param mixed $produit
     */
    public function setProduit($produit): void
    {
        $this->produit = $produit;
    }


    /**
     * @ORM\ManyToMany(targetEntity=Suggestions::class, mappedBy="likes")
     */
    private $likes;
    /**
     * @ORM\ManyToMany(targetEntity=Suggestions::class, mappedBy="likes")
     */
    private $likesp;

    public function __construct()
    {

        $this->likes = new ArrayCollection();


    }

    public function addLike(Suggestions $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->addLike($this);
        }

        return $this;
    }

    public function removeLike(Suggestions $like): self
    {
        if ($this->likes->removeElement($like->getId())) {
            $like->removeLike($this);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getImageuser(): ?string
    {
        return $this->imageuser;
    }

    /**
     * @param string|null $imageuser
     */
    public function setImageuser(?string $imageuser): void
    {
        $this->imageuser = $imageuser;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatedenaissance(): ?\DateTime
    {
        return $this->datedenaissance;
    }

    /**
     * @param \DateTime|null $datedenaissance
     */
    public function setDatedenaissance(?\DateTime $datedenaissance): void
    {
        $this->datedenaissance = $datedenaissance;
    }

    /**
     * @return int|null
     */
    public function getPasswordoublie(): ?int
    {
        return $this->passwordoublie;
    }

    /**
     * @param int|null $passwordoublie
     */
    public function setPasswordoublie(?int $passwordoublie): void
    {
        $this->passwordoublie = $passwordoublie;
    }

    /**
     * @return int
     */
    public function getOnline(): int
    {
        return $this->online;
    }

    /**
     * @param int $online
     */
    public function setOnline(int $online): void
    {
        $this->online = $online;
    }

    /**
     * @return mixed
     */
    public function getSuggestions()
    {
        return $this->suggestions;
    }

    /**
     * @param mixed $suggestions
     */
    public function setSuggestions($suggestions): void
    {
        $this->suggestions = $suggestions;
    }

    /**
     * @return ArrayCollection
     */
    public function getLikesp(): ArrayCollection
    {
        return $this->likesp;
    }

    /**
     * @param ArrayCollection $likesp
     */
    public function setLikesp(ArrayCollection $likesp): void
    {
        $this->likesp = $likesp;
    }

    /**
     * @return ArrayCollection
     */
    public function getLikes(): ArrayCollection
    {
        return $this->likes;
    }

    /**
     * @param ArrayCollection $likes
     */
    public function setLikes(ArrayCollection $likes): void
    {
        $this->likes = $likes;
    }

}
