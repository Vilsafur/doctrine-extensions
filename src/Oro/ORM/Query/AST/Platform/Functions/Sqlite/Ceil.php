<?php

namespace Oro\ORM\Query\AST\Platform\Functions\Mysql;

use Oro\ORM\Query\AST\Functions\SimpleFunction;
use Oro\ORM\Query\AST\Platform\Functions\PlatformFunctionNode;
use Doctrine\ORM\Query\SqlWalker;

class Ceil extends PlatformFunctionNode
{
    /**
     * {@inheritdoc}
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        $value = $this->parameters[SimpleFunction::PARAMETER_KEY];

        return sprintf(
            'CAST ( %s as int ) + ( %s > CAST ( %s as int ))',
            $this->getExpressionValue($value, $sqlWalker)
        );
    }
}
