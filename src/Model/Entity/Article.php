<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\UuidV4;
use App\Model\ValueObject\Article as ArticleVO;

/**
 * @ORM\Entity()
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="uuid", unique=true)
     */
    private UuidV4 $id;

    /**
     * @ORM\Embedded(class="App\Model\ValueObject\Article")
     */
    private ArticleVO $article;

    public function getId(): UuidV4
    {
        return $this->id;
    }

    public function setId(UuidV4 $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getArticle(): ArticleVO
    {
        return $this->article;
    }

    public function setArticle(ArticleVO $article): self
    {
        $this->article = $article;

        return $this;
    }
}
