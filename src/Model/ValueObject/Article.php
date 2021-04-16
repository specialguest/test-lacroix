<?php
declare(strict_types=1);

namespace App\Model\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class Article
{
    private \DateTimeImmutable $creationDate;
    private string $type;
    private string $title;
    private string $url;
    private ?string $intro;
    private ?string $picture;

    public function __construct(string $type, string $title, string $url, ?string $intro, ?string $picture)
    {
        $this->creationDate = new \DateTimeImmutable('now');
        $this->type = $type;
        $this->title = $title;
        $this->url = $url;
        $this->intro = $intro;
        $this->picture = $picture;
    }

    public function getCreationDate(): \DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getIntro(): ?string
    {
        return $this->intro;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }
}
