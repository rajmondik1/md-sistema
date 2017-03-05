<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programa
 *
 * @ORM\Table(name="programa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProgramaRepository")
 */
class Programa
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pavadinimas", type="string", length=255)
     */
    private $pavadinimas;

    /**
     * @var string
     * @ORM\Column(name="aprasymas", type="text")
     */
    private $aprasymas;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", inversedBy="programa")
     * @ORM\JoinTable(name="programu_useriai")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Calendar", inversedBy="events")
     * @ORM\JoinTable(name="programa_calendar")
     */

    private $events;

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
     * Set pavadinimas
     *
     * @param string $pavadinimas
     *
     * @return Programa
     */
    public function setPavadinimas($pavadinimas)
    {
        $this->pavadinimas = $pavadinimas;

        return $this;
    }

    /**
     * Get pavadinimas
     *
     * @return string
     */
    public function getPavadinimas()
    {
        return $this->pavadinimas;
    }

    /**
     * Set aprasymas
     *
     * @param string $aprasymas
     *
     * @return Programa
     */
    public function setAprasymas($aprasymas)
    {
        $this->aprasymas = $aprasymas;

        return $this;
    }

    /**
     * Get aprasymas
     *
     * @return string
     */
    public function getAprasymas()
    {
        return $this->aprasymas;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Programa
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add event
     *
     * @param \AppBundle\Entity\Calendar $event
     *
     * @return Programa
     */
    public function addEvent(\AppBundle\Entity\Calendar $event)
    {
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \AppBundle\Entity\Calendar $event
     */
    public function removeEvent(\AppBundle\Entity\Calendar $event)
    {
        $this->events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }
}
