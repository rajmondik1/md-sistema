<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mokslometai
 *
 * @ORM\Table(name="mokslometai")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MokslometaiRepository")
 */
class Mokslometai
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Programa", inversedBy="metai")
     */
    private $metai;


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
     * Set metai
     *
     * @param integer $metai
     *
     * @return Mokslometai
     */
    public function setMetai($metai)
    {
        $this->metai = $metai;

        return $this;
    }

    /**
     * Get metai
     *
     * @return int
     */
    public function getMetai()
    {
        return $this->metai;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->metai = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add metai
     *
     * @param \AppBundle\Entity\Programa $metai
     *
     * @return Mokslometai
     */
    public function addMetai(\AppBundle\Entity\Programa $metai)
    {
        $this->metai[] = $metai;

        return $this;
    }

    /**
     * Remove metai
     *
     * @param \AppBundle\Entity\Programa $metai
     */
    public function removeMetai(\AppBundle\Entity\Programa $metai)
    {
        $this->metai->removeElement($metai);
    }
}
