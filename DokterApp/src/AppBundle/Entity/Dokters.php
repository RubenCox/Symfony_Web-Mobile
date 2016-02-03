<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Dokters
 *
 * @ORM\Table(name="dokters")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DoktersRepository")
 */
class Dokters
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string")
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
     * @ORM\Column(name="profielfoto", type="string", length=255)
     *     /**
     * @Assert\Image(
     *     minWidth = 200,
     *     maxWidth = 400
     * )
     */

    private $profielfoto;

    /**
     * @ORM\Column(name="nummer", type="string", length=25)
     *
     */
    private $nummer;

    /**
     * @ORM\Column(name="lokaal", type="string", length=5)
     *
     */
    private $lokaal;

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
     * Get profielfoto
     *
     * @return string
     */
    public function getProfielfoto()
    {
        return $this->profielfoto;
    }

    /**
     * Set profielfoto
     *
     * @param string $profielfoto
     *
     * @return Dokters
     */
    public function setProfielfoto($profielfoto){
        $this->profielfoto = $profielfoto;
        return $this;
    }

    /**
     * Get nummer
     *
     * @return string
     */
    public function getNummer()
    {
        return $this->nummer;
    }

    /**
     * Set nummer
     *
     * @param string $nummer
     *
     * @return Dokters
     */
    public function setNummer($nummer){
        $this->nummer = $nummer;
        return $this;
    }

    /**
     * Get lokaal
     *
     * @return string
     */
    public function getLokaal()
    {
        return $this->lokaal;
    }

    /**
     * Set lokaal
     *
     * @param string $lokaal
     *
     * @return Dokters
     */
    public function setLokaal($lokaal){
        $this->nummer = $lokaal;
        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->voornaam.' '.$this->naam.' '.$this->id;
    }


}
