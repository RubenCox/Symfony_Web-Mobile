<?php
// src/AppBundle/Entity/Product.php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
class Product
{
// ...
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     */
    private $brochure;
    public function getBrochure()
    {
        return $this->brochure;
    }
    public function setBrochure($brochure){
        $this->brochure = $brochure;
        return $this;
    }
}