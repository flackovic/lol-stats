<?php

$config = PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        'align_multiline_comment' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => ['align_double_arrow' => true],
        'blank_line_before_statement' => true,
        'concat_space' => ['spacing' => 'one'],
        'heredoc_to_nowdoc' => true,
        'list_syntax' => ['syntax' => 'long'],
        'no_null_property_initialization' => true,
        'no_short_echo_tag' => true,
        'no_unneeded_curly_braces' => true,
        'no_unneeded_final_method' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => false,
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'semicolon_after_instruction' => true,
        'single_line_comment_style' => true,
        'strict_comparison' => false,
        'strict_param' => false,
        'no_superfluous_phpdoc_tags' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('bin')
            ->exclude('config')
            ->exclude('public')
            ->exclude('var')
            ->notPath('src/Kernel.php')
            ->in(__DIR__)
            ->ignoreVCS(true)
            ->files()
    )
;

return $config;
