<?php

use App\Model\ValueObject\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function test_article_creation()
    {
        $type = 'standard';
        $title = 'Article1';
        $url = '/France/Article1';
        $intro = 'Ma super introduction';
        $picture = '/src/image/test.jpg';

        $article = new Article($type, $title, $url, $intro, $picture);

        $this->assertInstanceOf('App\Model\ValueObject\Article', $article);
        $this->assertInstanceOf('DateTimeImmutable', $article->getCreationDate());
        $this->assertSame($type, $article->getType());
        $this->assertSame($title, $article->getTitle());
        $this->assertSame($url, $article->getUrl());
        $this->assertSame($intro, $article->getIntro());
        $this->assertSame($picture, $article->getPicture());
    }

    public function test_article_creation_with_nullable_parameters()
    {
        $article = new Article('standard', 'Article1', '/France/Article1', null, null);

        $this->assertNull($article->getIntro());
        $this->assertNull($article->getPicture());
    }
}
