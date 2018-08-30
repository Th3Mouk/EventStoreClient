<?php

$header = <<<EOF
(c) Jérémy Marodon <marodon.jeremy@gmail.com>
For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->exclude('datas')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_after_opening_tag' => true,
        'header_comment' => ['header' => $header],
        'no_unused_imports' => true,
        'ordered_imports' => true,
        'class_keyword_remove' => true,
    ])
    ->setFinder($finder)
;
