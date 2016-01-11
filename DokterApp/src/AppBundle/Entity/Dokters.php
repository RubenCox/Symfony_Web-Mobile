<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dokters
 *
 * @ORM\Table(name="dokters")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DoktersRepository")
 */
class Dokters
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
     * @ORM\Column(name="naam", type="string", length=55)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="voornaam", type="string", length=55)
     */
    private $voornaam;

    /**
     * @var string
     *
     * @ORM\Column(name="profielfoto", type="string", length=255)
     */
    private $profielfoto;


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
     * Set naam
     *
     * @param string $naam
     *
     * @return Dokters
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set voornaam
     *
     * @param string $voornaam
     *
     * @return Dokters
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    /**
     * Get voornaam
     *
     * @return string
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * Set profielfoto
     *
     * @param string $profielfoto
     *
     * @return Dokters
     */
    public function setProfielfoto($profielfoto)
    {
        $this->profielfoto = $profielfoto;

        return $this;
    }

    /**
     * Get profielfoto
     *
     * @return string
     */
    public function getProfielfoto()
    {
        return $this->profielfoto;
    }
}
