<?php

namespace Tests\Traits;

use App\Model\Entity\Article;
use App\Model\ValueObject\Article as ArticleVO;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

class ArticleTest extends TestCase
{
    public function test_article_creation()
    {
        $articleVO = new ArticleVO('standard', 'Article1', '/France/Article1', null, null);

        $article = new Article();
        $article->setId(Uuid::v4());
        $article->setArticle($articleVO);

        $this->assertInstanceOf('App\Model\Entity\Article', $article);
        $this->assertInstanceOf('App\Model\ValueObject\Article', $article->getArticle());
    }
}
