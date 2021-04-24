<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailsCommande
 *
 * @ORM\Table(name="details_commande", indexes={@ORM\Index(name="fk_idProduit", columns={"idproduit"})})
 * @ORM\Entity
 */
class DetailsCommande
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
     * @var int
     *
     * @ORM\Column(name="idproduit", type="integer", nullable=false)
     */
    private $idproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="numc", type="string", length=20, nullable=false)
     */
    private $numc;

    /**
     * @var int
     *
     * @ORM\Column(name="qteproduit", type="integer", nullable=false)
     */
    private $qteproduit;

    /**
     * @var float
     *
     * @ORM\Column(name="prixproduit", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixproduit;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduit", referencedColumnName="id")
     * })
     */
    private $idproduit2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdproduit(): ?int
    {
        return $this->idproduit;
    }

    public function setIdproduit(int $idproduit): self
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    public function getNumc(): ?string
    {
        return $this->numc;
    }

    public function setNumc(string $numc): self
    {
        $this->numc = $numc;

        return $this;
    }

    public function getQteproduit(): ?int
    {
        return $this->qteproduit;
    }

    public function setQteproduit(int $qteproduit): self
    {
        $this->qteproduit = $qteproduit;

        return $this;
    }

    public function getPrixproduit(): ?float
    {
        return $this->prixproduit;
    }

    public function setPrixproduit(float $prixproduit): self
    {
        $this->prixproduit = $prixproduit;

        return $this;
    }

    public function getIdproduit2(): ?Produit
    {
        return $this->idproduit2;
    }

    public function setIdproduit2(?Produit $idproduit2): self
    {
        $this->idproduit2 = $idproduit2;

        return $this;
    }


}
