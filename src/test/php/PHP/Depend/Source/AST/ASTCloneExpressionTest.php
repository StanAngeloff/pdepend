<?php
/**
 * This file is part of PDepend.
 *
 * PHP Version 5
 *
 * Copyright (c) 2008-2013, Manuel Pichler <mapi@pdepend.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @copyright 2008-2013 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 */

namespace PHP\Depend\Source\AST;

/**
 * Test case for the {@link \PHP\Depend\Source\AST\ASTCloneExpression} class.
 *
 * @copyright 2008-2013 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 *
 * @covers \PHP\Depend\Source\Language\PHP\AbstractPHPParser
 * @covers \PHP\Depend\Source\AST\ASTCloneExpression
 * @group pdepend
 * @group pdepend::ast
 * @group unittest
 */
class ASTCloneExpressionTest extends \PHP\Depend\Source\AST\ASTNodeTest
{
    /**
     * testCloneExpressionHasExpectedStartLine
     *
     * @return void
     */
    public function testCloneExpressionHasExpectedStartLine()
    {
        $expr = $this->_getFirstCloneExpressionInFunction(__METHOD__);
        $this->assertEquals(4, $expr->getStartLine());
    }

    /**
     * testCloneExpressionHasExpectedStartColumn
     *
     * @return void
     */
    public function testCloneExpressionHasExpectedStartColumn()
    {
        $expr = $this->_getFirstCloneExpressionInFunction(__METHOD__);
        $this->assertEquals(12, $expr->getStartColumn());
    }

    /**
     * testCloneExpressionHasExpectedEndLine
     *
     * @return void
     */
    public function testCloneExpressionHasExpectedEndLine()
    {
        $expr = $this->_getFirstCloneExpressionInFunction(__METHOD__);
        $this->assertEquals(6, $expr->getEndLine());
    }

    /**
     * testCloneExpressionHasExpectedEndColumn
     *
     * @return void
     */
    public function testCloneExpressionHasExpectedEndColumn()
    {
        $expr = $this->_getFirstCloneExpressionInFunction(__METHOD__);
        $this->assertEquals(21, $expr->getEndColumn());
    }

    /**
     * Returns a node instance for the currently executed test case.
     *
     * @param string $testCase Name of the calling test case.
     *
     * @return \PHP\Depend\Source\AST\ASTCloneExpression
     */
    private function _getFirstCloneExpressionInFunction($testCase)
    {
        return $this->getFirstNodeOfTypeInFunction(
            $testCase, \PHP\Depend\Source\AST\ASTCloneExpression::CLAZZ
        );
    }
}