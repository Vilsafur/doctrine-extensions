<?php

namespace Oro\ORM\Query\AST\Platform\Functions\Sqlite;

use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\SqlWalker;
use Oro\ORM\Query\AST\Functions\Numeric\TimestampDiff as BaseFunction;
use Oro\ORM\Query\AST\Platform\Functions\PlatformFunctionNode;

class Timestampdiff extends PlatformFunctionNode
{
    /**
     * {@inheritdoc}
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        /** @var Node $val1 */
        $val1 = $this->parameters[BaseFunction::VAL1_KEY];
        /** @var Node $val2 */
        $val2 = $this->parameters[BaseFunction::VAL2_KEY];

        return sprintf(
            'CAST(strftime(\'\%s\', %s) as integer) - CAST(strftime(\'%s\', %s) as integer)',
            $this->getExpressionValue($val1, $sqlWalker),
            $this->getExpressionValue($val2, $sqlWalker)
        );
    }
}
