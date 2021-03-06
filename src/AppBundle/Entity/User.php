<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(name="surname", type="string", length=255)
     */
    protected $surname;

    /**
     * @ORM\Column(name="telnumeris", type="string", length=25, nullable=true)
     */
    protected $telnumeris;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gimdata", type="date", nullable=true)
     */
    protected $gimdata;

    /**
     * @ORM\Column(name="asmkodas", type="string", length=255, nullable=true)
     */
    protected $asmkodas;

    /**
     * @ORM\Column(name="klase", type="integer", nullable=true)
     */
    protected $klase;

    /**
     * @ORM\Column(name="miestas", type="string", length=255, nullable=true)
     */
    protected $miestas;

    /**
     * @ORM\Column(name="mokykla", type="string", length=255, nullable=true)
     */
    protected $mokykla;

    /**
     * @ORM\Column(name="tevtelef", type="string", length=255, nullable=true)
     */
    protected $tevtelef;

    /**
     * @ORM\Column(name="tevuinfo", type="text", nullable=true)
     */
    protected $tevuinfo;

    /**
     * @ORM\Column(name="mokslometai", type="integer", nullable=true)
     */
    protected $mokslometai;

    /**
     * @ORM\Column(name="baigimonr", type="string", length=255, nullable=true)
     */
    protected $baigimonr;




    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set programa
     *
     * @param string $programa
     *
     * @return User
     */
    public function setPrograma($programa)
    {
        $this->programa = $programa;

        return $this;
    }

    /**
     * Get programa
     *
     * @return string
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * Add programa
     *
     * @param \AppBundle\Entity\Programa $programa
     *
     * @return User
     */
    public function addPrograma(\AppBundle\Entity\Programa $programa)
    {
        $this->programa[] = $programa;

        return $this;
    }

    /**
     * Remove programa
     *
     * @param \AppBundle\Entity\Programa $programa
     */
    public function removePrograma(\AppBundle\Entity\Programa $programa)
    {
        $this->programa->removeElement($programa);
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
     */
    public function setKlase($klase)
    {
        $this->klase = $klase;

        return $this;
    }

    /**
     * Get klase
     *
     * @return integer
     */
    public function getKlase()
    {
        return $this->klase;
    }

    /**
     * Set miestas
     *
     * @param string $miestas
     *
     * @return User
     */
    public function setMiestas($miestas)
    {
        $this->miestas = $miestas;

        return $this;
    }

    /**
     * Get miestas
     *
     * @return string
     */
    public function getMiestas()
    {
        return $this->miestas;
    }

    /**
     * Set mokykla
     *
     * @param string $mokykla
     *
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
     */
    public function setMokslometai($mokslometai)
    {
        $this->mokslometai = $mokslometai;

        return $this;
    }

    /**
     * Get mokslometai
     *
     * @return integer
     */
    public function getMokslometai()
    {
        return $this->mokslometai;
    }

    /**
     * Set baigimonr
     *
     * @param integer $baigimonr
     *
     * @return User
     */
    public function setBaigimonr($baigimonr)
    {
        $this->baigimonr = $baigimonr;

        return $this;
    }

    /**
     * Get baigimonr
     *
     * @return integer
     */
    public function getBaigimonr()
    {
        return $this->baigimonr;
    }
}
