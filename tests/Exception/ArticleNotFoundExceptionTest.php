<?php

namespace Tests\Traits;

use App\Exception\ArticleNotFoundException;
use PHPUnit\Framework\TestCase;

class ArticleNotFoundExceptionTest extends TestCase
{
    private $articleDocElt;
    private const ARTICLEXML = '<Article id="a5147990-9191-4fdf-968b-6ae5f562cef3"><CreationDate>2020-05-19T13:17:11+02:00</CreationDate><Type>standard</Type><Title>Article1</Title><URL>/France/Article1</URL><Intro/><Picture/></Article>';

    public function setUp(): void
    {
        $document = new \DOMDocument();
        $document->loadXML(self::ARTICLEXML);
        $this->articleDocElt = $document->documentElement;
    }

    // Je n'ai pas vraiment de contexte pour lancer cette exception.
    public function test_if_ArticleNotFoundException_returns_a_valid_message()
    {
        try {
            throw new ArticleNotFoundException($this->articleDocElt);
        } catch (\Exception $e) {
            $this->assertSame("Aucun article n'a été trouvé pour cette url {{ /France/Article1 }}", $e->getMessage());
        }
    }
}
