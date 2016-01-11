<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lokalen
 *
 * @ORM\Table(name="lokalen")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LokalenRepository")
 */
class Lokalen
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
     * @ORM\Column(name="Omschrijving", type="string", length=4)
     */
    private $omschrijving;

    /**
     * @var int
     *
     * @ORM\Column(name="ArtsID", type="integer")
     */
    private $artsID;


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
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return Lokalen
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * Set artsID
     *
     * @param integer $artsID
     *
     * @return Lokalen
     */
    public function setArtsID($artsID)
    {
        $this->artsID = $artsID;

        return $this;
    }

    /**
     * Get artsID
     *
     * @return int
     */
    public function getArtsID()
    {
        return $this->artsID;
    }
}
