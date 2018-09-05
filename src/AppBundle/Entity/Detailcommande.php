<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detailcommande
 *
 * @ORM\Table(name="detailcommande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetailcommandeRepository")
 */
class Detailcommande
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
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Commande")
      * @ORM\JoinColumn(name="commande_id", onDelete="CASCADE")
      */
    private $commande;
    
    /**
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produit")
      * @ORM\JoinColumn(name="produit_id", onDelete="CASCADE")
      */
    private $produit;

    /**
     * @var int
     *
     * @ORM\Column(name="qtecommande", type="integer", nullable=true)
     */
    private $qtecommande;


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
     * Set qtecommande
     *
     * @param integer $qtecommande
     *
     * @return Detailcommande
     */
    public function setQtecommande($qtecommande)
    {
        $this->qtecommande = $qtecommande;

        return $this;
    }

    /**
     * Get qtecommande
     *
     * @return int
     */
    public function getQtecommande()
    {
        return $this->qtecommande;
    }

    /**
     * Set commande
     *
     * @param \AppBundle\Entity\Commande $commande
     *
     * @return Detailcommande
     */
    public function setCommande(\AppBundle\Entity\Commande $commande = null)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \AppBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return Detailcommande
     */
    public function setProduit(\AppBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \AppBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }
}
