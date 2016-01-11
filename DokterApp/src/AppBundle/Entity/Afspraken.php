<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Afspraken
 *
 * @ORM\Table(name="afspraken")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AfsprakenRepository")
 */
class Afspraken
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
     * @var int
     *
     * @ORM\Column(name="DokterID", type="integer")
     */
    private $dokterID;

    /**
     * @var int
     *
     * @ORM\Column(name="PatientID", type="integer")
     */
    private $patientID;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datum", type="date")
     */
    private $datum;

    /**
     * @var string
     *
     * @ORM\Column(name="Uur", type="string", length=5)
     */
    private $uur;

    /**
     * @var string
     *
     * @ORM\Column(name="Symptomen", type="string", length=255)
     */
    private $symptomen;


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
     * Set dokterID
     *
     * @param integer $dokterID
     *
     * @return Afspraken
     */
    public function setDokterID($dokterID)
    {
        $this->dokterID = $dokterID;

        return $this;
    }

    /**
     * Get dokterID
     *
     * @return int
     */
    public function getDokterID()
    {
        return $this->dokterID;
    }

    /**
     * Set patientID
     *
     * @param integer $patientID
     *
     * @return Afspraken
     */
    public function setPatientID($patientID)
    {
        $this->patientID = $patientID;

        return $this;
    }

    /**
     * Get patientID
     *
     * @return int
     */
    public function getPatientID()
    {
        return $this->patientID;
    }

    /**
     * Set datum
     *
     * @param \DateTime $datum
     *
     * @return Afspraken
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum
     *
     * @return \DateTime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set uur
     *
     * @param string $uur
     *
     * @return Afspraken
     */
    public function setUur($uur)
    {
        $this->uur = $uur;

        return $this;
    }

    /**
     * Get uur
     *
     * @return string
     */
    public function getUur()
    {
        return $this->uur;
    }

    /**
     * Set symptomen
     *
     * @param string $symptomen
     *
     * @return Afspraken
     */
    public function setSymptomen($symptomen)
    {
        $this->symptomen = $symptomen;

        return $this;
    }

    /**
     * Get symptomen
     *
     * @return string
     */
    public function getSymptomen()
    {
        return $this->symptomen;
    }
}
