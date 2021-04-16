<?php
declare(strict_types=1);

namespace App\Traits;

use App\Model\ValueObject\NonEmpty;

trait FromXMLTrait
{
    /** Return URL node value From article XML */
    final public function transform(\DOMElement $root, string $name = 'URL'): ?string
    {
        $object = $this->childToNonEmpty($root, $name);

        if ($object instanceof NonEmpty) {
            return $object->getValue();
        }

        return null;
    }

    /**
     * Tries to return child node text value of the given element as a NonEmpty value object.
     *
     * Returns NULL on failure.
     */
    final public function childToNonEmpty(\DOMElement $root, string $name, string $type = NonEmpty::class): ?NonEmpty
    {
        if (null === $value = $this->childValue($root, $name)) {
            return null;
        }

        return $this->toNonEmpty($value, $type);
    }

    /**
     * Converts string value to NonEmpty value object
     */
    final public function toNonEmpty(string $value, string $type = NonEmpty::class): NonEmpty
    {
        // Je n'ai pas compris de quelle lib provenait ce Assert
        // $isValid = is_a($type, NonEmpty::class, true);
        // Assert::true($isValid, 'INVALID TYPE');

        return new NonEmpty($value);
    }

    /**
     * Returns child node value.
     */
    final private function childValue(\DOMElement $root, string $name): ?string
    {
        /** @var \DOMElement $node */
        foreach ($root->childNodes as $node) {
            if ($name === $node->tagName) {
                return $node->firstChild->nodeValue;
            }
        }

        return null;
    }
}
