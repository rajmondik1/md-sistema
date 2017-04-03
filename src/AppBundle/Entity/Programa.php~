<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\Criteria;
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
     * @ORM\Column(name="pavadinimas", type="string", length=255)
     */
    private $pavadinimas;

    /**
     * @var string
     * @ORM\Column(name="aprasymas", type="text")
     */
    private $aprasymas;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Student", inversedBy="student")
     * @ORM\JoinTable(name="programa_student")
     */
    private $student;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Calendar", mappedBy="events")
     * @ORM\JoinTable(name="programa_calendar")
     */
    private $events;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Mokslometai", mappedBy="metai")
     * @ORM\JoinTable(name="programa_metai")
     */
    private $metai;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Teacher", inversedBy="teacher")
     */
    private $teacher;


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
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
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
        $today = new \DateTime();
        $today->setTime(0,0,0);
        $endDate = clone $today;
        $endDate->modify('+1month');

        $criteria = Criteria::create()
            ->orderBy(['start' => Criteria::ASC])
            ->where(Criteria::expr()->gte('start', $today))
            ->andWhere(Criteria::expr()->lte('start', $endDate));

        return $this->events->matching($criteria);
    }

    public function __toString()
    {
        return $this->pavadinimas;
    }

    /**
     * Add metai
     *
     * @param \AppBundle\Entity\Mokslometai $metai
     *
     * @return Programa
     */
    public function addMetai(\AppBundle\Entity\Mokslometai $metai)
    {
        $this->metai[] = $metai;

        return $this;
    }

    /**
     * Remove metai
     *
     * @param \AppBundle\Entity\Mokslometai $metai
     */
    public function removeMetai(\AppBundle\Entity\Mokslometai $metai)
    {
        $this->metai->removeElement($metai);
    }

    /**
     * Get metai
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMetai()
    {
        return $this->metai;
    }

    /**
     * Set teacher
     *
     * @param \AppBundle\Entity\Teacher $teacher
     *
     * @return Programa
     */
    public function setTeacher(\AppBundle\Entity\Teacher $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \AppBundle\Entity\Teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set pteacher
     *
     * @param \AppBundle\Entity\Teacher $pteacher
     *
     * @return Programa
     */
    public function setPteacher(\AppBundle\Entity\Teacher $pteacher = null)
    {
        $this->pteacher = $pteacher;

        return $this;
    }

    /**
     * Get pteacher
     *
     * @return \AppBundle\Entity\Teacher
     */
    public function getPteacher()
    {
        return $this->pteacher;
    }

    /**
     * Add student
     *
     * @param \AppBundle\Entity\Student $student
     *
     * @return Programa
     */
    public function addStudent(\AppBundle\Entity\Student $student)
    {
        $this->student[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \AppBundle\Entity\Student $student
     */
    public function removeStudent(\AppBundle\Entity\Student $student)
    {
        $this->student->removeElement($student);
    }

    /**
     * Get student
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudent()
    {
        return $this->student;
    }
}
