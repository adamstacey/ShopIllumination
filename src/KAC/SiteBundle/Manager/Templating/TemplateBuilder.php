<?php
namespace KAC\SiteBundle\Manager\Templating;

use Doctrine\ORM\EntityManager;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyPath;

abstract class TemplateBuilder
{
    protected $i = -1;
    protected $em;
    protected $aliases = array();

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function buildString($object, $template)
    {
        $wordsToIgnore = array('N/A', 'n/a', 'Yes', 'yes', 'No', 'no');

        $parts = array();

        $lexer = new Lexer();
        $tokens = $lexer->run($template);
        while ($token = $this->getNextToken($tokens))
        {
            // If token is a string literal then add directly to the string
            if ($token["type"] === "T_STRING_LITERAL")
            {
                $parts[] = $token["value"];
            } elseif($token["type"] === "T_IDENTIFIER") {
                // Attempt to fetch the specified value from the object
                $parts[] = $this->getPropertyValue($object, $token["value"]);
            // Check if part is an entity
            } elseif ($token["type"] === "T_AT") {
                // Check the next token
                if ($token = $this->getNextToken($tokens))
                {
                    if ($token["type"] === "T_IDENTIFIER")
                    {
                        $entityAlias = $token["value"];
                        // Check the next token
                        if ($token = $this->getNextToken($tokens))
                        {
                            if ($token["type"] === "T_PIPE")
                            {
                                // Check the next token
                                if ($token = $this->getNextToken($tokens))
                                {
                                    if ($token["type"] === "T_IDENTIFIER")
                                    {
                                        $entityId = $token["value"];
                                        // Check the next token
                                        if ($token = $this->getNextToken($tokens))
                                        {
                                            if ($token["type"] === "T_PIPE")
                                            {
                                                // Check the next token
                                                if ($token = $this->getNextToken($tokens))
                                                {
                                                    if ($token["type"] === "T_IDENTIFIER")
                                                    {
                                                        // Fetch value
                                                        $entity = $this->getEntity($object, $entityAlias, $entityId);
                                                        $parts[] = $this->getPropertyValue($entity, $token["value"]);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        // Remove any null or empty parts
        $parts = array_filter($parts, function ($part) {
            return $part != '' || $part != null;
        });

        // Remove any words to ignore
        foreach ($parts as $index => $part)
        {
            if (in_array($part, $wordsToIgnore))
            {
                unset($parts[$index]);
            }
        }

        $parts = implode(' ', $parts);
        $parts = preg_replace("/[\r\n\t\s]+/s", " ", $parts);

        return $parts;
    }

    abstract function getEntity($object, $alias, $id);

    private function getPropertyValue($object, $name)
    {
        if ($object) {
            try {
                $accessor = PropertyAccess::createPropertyAccessor();
                return $accessor->getValue($object, $this->getPropertyName($name));
            } catch (\Exception $e) {
                return null;
            }
        }
    }

    private function getPropertyName($alias)
    {
        if (isset($this->aliases[$alias]))
        {
            return $this->aliases[$alias];
        }

        return $alias;
    }

    private function getNextToken($tokens)
    {
        $this->i++;
        if ($this->i >= count($tokens)) {
            return false;
        }

        return $tokens[$this->i];
    }
}