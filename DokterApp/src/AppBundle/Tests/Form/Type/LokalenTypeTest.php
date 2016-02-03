<?php
/*namespace AppBundle\Tests\Form\Type;

use AppBundle\Form\LokalenType;
use AppBundle\Model\TestObject;
use Symfony\Component\Form\Test\TypeTestCase;

class LokalenTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            'Omschrijving' => 'L250',
            'ArtsID' => 11
        );

        $type = LokalenType::class;
        $form = $this->factory->create($type);

        $object = TestObject::fromArray($formData);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($object, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}