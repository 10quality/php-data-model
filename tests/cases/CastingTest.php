<?php

/**
 * Tests casting.
 *
 * @author Cami M <info@10quality.com>
 * @copyright 10 Quality <info@10quality.com>
 * @package TenQuality\Data\Model
 * @version 1.0.0
 */
class CastingTest extends PHPUnit_Framework_TestCase
{
    /**
     * Array casting.
     * @since 1.0.0
     */
    public function testArrayCasting()
    {
        // Prepare
        $model = new TestModel;
        $model->name = 'Test';
        $model->price = 19.99;
        $model->properties = ['price','displayPrice'];
        // Execute
        $array = $model->toArray();
        // Assert
        $this->assertInternalType('array', $array);
        $this->assertArrayHasKey('price', $array);
        $this->assertArrayHasKey('displayPrice', $array);
        $this->assertArrayNotHasKey('name', $array);
        $this->assertEquals(19.99, $array['price']);
        $this->assertEquals('$19.99', $array['displayPrice']);
    }
    /**
     * String casting.
     * @since 1.0.0
     */
    public function testStringCasting()
    {
        // Prepare
        $model = new TestModel;
        $model->name = 'Test';
        $model->price = 19.99;
        $model->properties = ['price','displayPrice'];
        // Execute
        $json = (string)$model;
        // Assert
        $this->assertInternalType('string', $json);
        $this->assertEquals('{"price":19.99,"displayPrice":"$19.99"}', $json);
    }
}