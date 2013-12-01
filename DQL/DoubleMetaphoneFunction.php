<?php

namespace CL\CLSymfonyDoctrineSearchFunctionsBundle\DQL;

use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;


/**
 * 
 * DoubleMetaphone ::= "DOUBLEMETAPHONE" "(" StringPrimary " ")"
 *
 * @author julien.fastre@champs-libres.coop
 */
class DoubleMetaphoneFunction extends FunctionNode {
    
    private $value;
    
    public function parse(\Doctrine\ORM\Query\Parser $parser) {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        
        $this->value = $parser->StringPrimary();
        
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
    
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker) {
        return 'dmetaphone('.
                $this->value->dispatch($sqlWalker) .
                ')';
    }
}
