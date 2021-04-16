<?php
declare(strict_types=1);

namespace App\Exception;

use App\Traits\FromXMLTrait;

final class ArticleNotFoundException extends \Exception
{
    use FromXMLTrait;

    public function __construct(\DOMElement $root)
    {
        $articleUrl = $this->transform($root, 'URL');
        $message = "Aucun article n'a été trouvé pour cette url {{ ${articleUrl} }}";

        parent::__construct($message);
    }
}
