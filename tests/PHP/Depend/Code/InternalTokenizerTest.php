<?php
/**
 * This file is part of PHP_Depend.
 * 
 * PHP Version 5
 *
 * Copyright (c) 2008, Manuel Pichler <mapi@pmanuel-pichler.de>.
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
 * @category  QualityAssurance
 * @package   PHP_Depend
 * @author    Manuel Pichler <mapi@manuel-pichler.de>
 * @copyright 2008 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version   SVN: $Id$
 * @link      http://www.manuel-pichler.de/
 */

require_once dirname(__FILE__) . '/../AbstractTest.php';

require_once 'PHP/Depend/Code/Tokenizer/InternalTokenizer.php';

/**
 * Abstract test case implementation for the PHP_Depend package.
 *
 * @category  QualityAssurance
 * @package   PHP_Depend
 * @author    Manuel Pichler <mapi@manuel-pichler.de>
 * @copyright 2008 Manuel Pichler. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version   Release: @package_version@
 * @link      http://www.manuel-pichler.de/
 */
class PHP_Depend_Code_InternalTokenizerTest extends PHP_Depend_AbstractTest
{
    public function testInternalTokenizerWithClasses()
    {
        $tokenizer = new PHP_Depend_Code_Tokenizer_InternalTokenizer(
            dirname(__FILE__) . '/code/classes.php'
        );
        
        $tokens = array(
            PHP_Depend_Code_Tokenizer::T_DOC_COMMENT,
            PHP_Depend_Code_Tokenizer::T_ABSTRACT,
            PHP_Depend_Code_Tokenizer::T_CLASS,
            PHP_Depend_Code_Tokenizer::T_STRING,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_OPEN,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_CLOSE,
            PHP_Depend_Code_Tokenizer::T_CLASS,
            PHP_Depend_Code_Tokenizer::T_STRING,
            PHP_Depend_Code_Tokenizer::T_STRING,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_OPEN,
            PHP_Depend_Code_Tokenizer::T_FUNCTION,
            PHP_Depend_Code_Tokenizer::T_STRING,
            PHP_Depend_Code_Tokenizer::T_PARENTHESIS_OPEN,
            PHP_Depend_Code_Tokenizer::T_PARENTHESIS_CLOSE,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_OPEN,
            PHP_Depend_Code_Tokenizer::T_STRING,
            PHP_Depend_Code_Tokenizer::T_DOUBLE_COLON,
            PHP_Depend_Code_Tokenizer::T_STRING,
            PHP_Depend_Code_Tokenizer::T_PARENTHESIS_OPEN,
            PHP_Depend_Code_Tokenizer::T_PARENTHESIS_CLOSE,
            PHP_Depend_Code_Tokenizer::T_SEMICOLON,
            PHP_Depend_Code_Tokenizer::T_SEMICOLON,
            PHP_Depend_Code_Tokenizer::T_SEMICOLON,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_CLOSE,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_CLOSE
        );
        
        foreach ($tokens as $token) {
            $t = $tokenizer->next();
            $this->assertEquals($token, $t[0]);
        }
    }
    
    public function testInternalTokenizerWithMixedContent()
    {
        $tokenizer = new PHP_Depend_Code_Tokenizer_InternalTokenizer(
            dirname(__FILE__) . '/code/func_class.php'
        );
        
        $tokens = array(
            PHP_Depend_Code_Tokenizer::T_FUNCTION,
            PHP_Depend_Code_Tokenizer::T_STRING,
            PHP_Depend_Code_Tokenizer::T_PARENTHESIS_OPEN,
            PHP_Depend_Code_Tokenizer::T_PARENTHESIS_CLOSE,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_OPEN,
            PHP_Depend_Code_Tokenizer::T_NEW,
            PHP_Depend_Code_Tokenizer::T_STRING,
            PHP_Depend_Code_Tokenizer::T_PARENTHESIS_OPEN,
            PHP_Depend_Code_Tokenizer::T_PARENTHESIS_CLOSE,
            PHP_Depend_Code_Tokenizer::T_SEMICOLON,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_CLOSE,
            PHP_Depend_Code_Tokenizer::T_DOC_COMMENT,
            PHP_Depend_Code_Tokenizer::T_CLASS,
            PHP_Depend_Code_Tokenizer::T_STRING,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_OPEN,
            PHP_Depend_Code_Tokenizer::T_CURLY_BRACE_CLOSE,
        );
        
        foreach ($tokens as $token) {
            $t = $tokenizer->next();
            $this->assertEquals($token, $t[0]);
        }
    }
}