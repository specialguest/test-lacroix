<?php

namespace Tests\Traits;

use App\Traits\FromXMLTrait;
use PHPUnit\Framework\TestCase;

class FromXMLTraitTest extends TestCase
{
    use FromXMLTrait;

    private $articleDocElt;
    private const ARTICLEXML = '<Article id="a5147990-9191-4fdf-968b-6ae5f562cef3"><CreationDate>2020-05-19T13:17:11+02:00</CreationDate><Type>standard</Type><Title>Article1</Title><URL>/France/Article1</URL><Intro/><Picture/></Article>';

    public function setUp(): void
    {
        $document = new \DOMDocument();
        $document->loadXML(self::ARTICLEXML);
        $this->articleDocElt = $document->documentElement;
    }

    // A tester mais je n'ai pas d'information sur le Assert contenu dans le code
    //public function test_if_NonEmpty_failed_with_wrong_class_type(){}

    public function test_if_toNonEmpty_returns_a_NonEmptyVO()
    {
        $this->assertInstanceOf('App\Model\ValueObject\NonEmpty', $this->toNonEmpty('MyValue', 'WrongClass'));
    }

    public function test_if_childToNonEmpty_with_fake_value_return_null()
    {
        $this->assertNull($this->childToNonEmpty($this->articleDocElt, 'FAKE_VALUE'));
    }

    public function test_if_childToNonEmpty_with_valid_value_return_a_NonEmpty()
    {
        $this->assertInstanceOf('App\Model\ValueObject\NonEmpty', $this->childToNonEmpty($this->articleDocElt, 'URL'));
    }

    public function test_transform_xml_with_fake_value_or_missing_url_value()
    {
        $this->assertNull($this->transform($this->articleDocElt, 'fake'));
    }

    public function test_transform_xml_to_url()
    {
        $this->assertSame('/France/Article1', $this->transform($this->articleDocElt, 'URL'));
    }
}
