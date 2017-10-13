<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @link https://github.com/localheinz/github-changelog
 */

namespace Localheinz\GitHub\ChangeLog\Resource;

use Assert;

final class PullRequest implements PullRequestInterface
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $title;

    /**
     * @param string $number
     * @param string $title
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($number, $title)
    {
        Assert\that($number)->integerish()->greaterThan(0);
        Assert\that($title)->string();

        $this->number = $number;
        $this->title = $title;
    }

    public function number()
    {
        return $this->number;
    }

    public function title()
    {
        return $this->title;
    }
}
