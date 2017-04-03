<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teacher
 *
 * @ORM\Table(name="teacher")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeacherRepository")
 */
class Teacher
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="telnr", type="string", length=255)
     */
    private $telnr;

    /**
     * @var string
     *
     * @ORM\Column(name="pastabos", type="string", length=255)
     */
    private $pastabos;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Programa", mappedBy="teacher")
     * @ORM\JoinTable(name="programa_teacher")

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
     * Set name
     *
     * @param string $name
     *
     * @return Teacher
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Teacher
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

    /**
     * Set telnr
     *
     * @param integer $telnr
     *
     * @return Teacher
     */
    public function setTelnr($telnr)
    {
        $this->telnr = $telnr;

        return $this;
    }

    /**
     * Get telnr
     *
     * @return int
     */
    public function getTelnr()
    {
        return $this->telnr;
    }

    /**
     * Set pastabos
     *
     * @param string $pastabos
     *
     * @return Teacher
     */
    public function setPastabos($pastabos)
    {
        $this->pastabos = $pastabos;

        return $this;
    }

    /**
     * Get pastabos
     *
     * @return string
     */
    public function getPastabos()
    {
        return $this->pastabos;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teacher = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add teacher
     *
     * @param \AppBundle\Entity\Programa $teacher
     *
     * @return Teacher
     */
    public function addTeacher(\AppBundle\Entity\Programa $teacher)
    {
        $this->teacher[] = $teacher;

        return $this;
    }

    /**
     * Remove teacher
     *
     * @param \AppBundle\Entity\Programa $teacher
     */
    public function removeTeacher(\AppBundle\Entity\Programa $teacher)
    {
        $this->teacher->removeElement($teacher);
    }

    /**
     * Get teacher
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Teacher
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }
}
