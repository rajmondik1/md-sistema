<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
 */
class Student
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
     * @ORM\Column(name="telnumeris", type="string", length=50)
     */
    private $telnumeris;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gimdata", type="date")
     */
    private $gimdata;

    /**
     * @var string
     *
     * @ORM\Column(name="asmkodas", type="string", length=255)
     */
    private $asmkodas;

    /**
     * @var int
     *
     * @ORM\Column(name="klase", type="integer")
     */
    private $klase;

    /**
     * @var string
     *
     * @ORM\Column(name="mokykla", type="string", length=255)
     */
    private $mokykla;

    /**
     * @var string
     *
     * @ORM\Column(name="tevtelef", type="string", length=255)
     */
    private $tevtelef;

    /**
     * @var string
     *
     * @ORM\Column(name="tevuinfo", type="text")
     */
    private $tevuinfo;

    /**
     * @var int
     *
     * @ORM\Column(name="mokslometai", type="integer")
     */
    private $mokslometai;

    /**
     * @var string
     *
     * @ORM\Column(name="baigimonr", type="string", length=255)
     */
    private $baigimonr;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Programa", mappedBy="student")
     */
    private $student;


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
     * @return Student
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
     * Set surname
     *
     * @param string $surname
     *
     * @return Student
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

    /**
     * Set telnumeris
     *
     * @param string $telnumeris
     *
     * @return Student
     */
    public function setTelnumeris($telnumeris)
    {
        $this->telnumeris = $telnumeris;

        return $this;
    }

    /**
     * Get telnumeris
     *
     * @return string
     */
    public function getTelnumeris()
    {
        return $this->telnumeris;
    }

    /**
     * Set gimdata
     *
     * @param \DateTime $gimdata
     *
     * @return Student
     */
    public function setGimdata($gimdata)
    {
        $this->gimdata = $gimdata;

        return $this;
    }

    /**
     * Get gimdata
     *
     * @return \DateTime
     */
    public function getGimdata()
    {
        return $this->gimdata;
    }

    /**
     * Set asmkodas
     *
     * @param string $asmkodas
     *
     * @return Student
     */
    public function setAsmkodas($asmkodas)
    {
        $this->asmkodas = $asmkodas;

        return $this;
    }

    /**
     * Get asmkodas
     *
     * @return string
     */
    public function getAsmkodas()
    {
        return $this->asmkodas;
    }

    /**
     * Set klase
     *
     * @param integer $klase
     *
     * @return Student
     */
    public function setKlase($klase)
    {
        $this->klase = $klase;

        return $this;
    }

    /**
     * Get klase
     *
     * @return int
     */
    public function getKlase()
    {
        return $this->klase;
    }

    /**
     * Set mokykla
     *
     * @param string $mokykla
     *
     * @return Student
     */
    public function setMokykla($mokykla)
    {
        $this->mokykla = $mokykla;

        return $this;
    }

    /**
     * Get mokykla
     *
     * @return string
     */
    public function getMokykla()
    {
        return $this->mokykla;
    }

    /**
     * Set tevtelef
     *
     * @param string $tevtelef
     *
     * @return Student
     */
    public function setTevtelef($tevtelef)
    {
        $this->tevtelef = $tevtelef;

        return $this;
    }

    /**
     * Get tevtelef
     *
     * @return string
     */
    public function getTevtelef()
    {
        return $this->tevtelef;
    }

    /**
     * Set tevuinfo
     *
     * @param string $tevuinfo
     *
     * @return Student
     */
    public function setTevuinfo($tevuinfo)
    {
        $this->tevuinfo = $tevuinfo;

        return $this;
    }

    /**
     * Get tevuinfo
     *
     * @return string
     */
    public function getTevuinfo()
    {
        return $this->tevuinfo;
    }

    /**
     * Set mokslometai
     *
     * @param integer $mokslometai
     *
     * @return Student
     */
    public function setMokslometai($mokslometai)
    {
        $this->mokslometai = $mokslometai;

        return $this;
    }

    /**
     * Get mokslometai
     *
     * @return int
     */
    public function getMokslometai()
    {
        return $this->mokslometai;
    }

    /**
     * Set baigimonr
     *
     * @param string $baigimonr
     *
     * @return Student
     */
    public function setBaigimonr($baigimonr)
    {
        $this->baigimonr = $baigimonr;

        return $this;
    }

    /**
     * Get baigimonr
     *
     * @return string
     */
    public function getBaigimonr()
    {
        return $this->baigimonr;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->student = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add student
     *
     * @param \AppBundle\Entity\Programa $student
     *
     * @return Student
     */
    public function addStudent(\AppBundle\Entity\Programa $student)
    {
        $this->student[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \AppBundle\Entity\Programa $student
     */
    public function removeStudent(\AppBundle\Entity\Programa $student)
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

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Student
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
