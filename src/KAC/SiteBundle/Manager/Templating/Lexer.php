<?php
namespace KAC\SiteBundle\Manager\Templating;


class Lexer
{
    // Define token constants
    protected static $terminals = array(
        '/^(@)/'    => 'T_AT',
        '/^(\^)/'   => 'T_CARET',
        '/^(\|)/'   => 'T_PIPE',
        '/^(\s+)/'  => 'T_WHITESPACE',
        '/^([\w\.]+)/' => 'T_IDENTIFIER',
        '/^(\"((.*)(?:[\"]|[^"]|""))+\")/' => 'T_STRING_LITERAL',
    );

    public function run($source) {
        $tokens = array();

        $offset = 0;
        while($offset < strlen($source)) {
            $result = $this->match($source, $offset);
            if($result === false) {
                throw new \Exception("Unable to parse character " . ($offset+1) . ".");
            }
            $tokens[] = $result;
            $offset += strlen($result['raw']);
        }

        return $tokens;
    }

    protected function match($string, $offset) {
        $string = substr($string, $offset);

        foreach(static::$terminals as $pattern => $name) {
            if(preg_match($pattern, $string, $matches)) {
                // Special case for string literal to remove quotes
                if($name === 'T_STRING_LITERAL')
                {
                    $match = $matches[1];
                    $value = $matches[2];
                } else {
                    $match = $matches[1];
                    $value = $matches[1];
                }

                return array(
                    'value' => $value,
                    'raw'   => $match,
                    'type' => $name,
                    'char'  => $offset+1
                );
            }
        }

        return false;
    }
}