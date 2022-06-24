<?php

/**
 * This file is part of the "Laravel-Lang/publisher" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/Laravel-Lang/publisher
 */

declare(strict_types=1);

namespace LaravelLang\Publisher\Services\Filesystem;

use DragonCode\Contracts\Support\Filesystem;
use DragonCode\PrettyArray\Services\File as Pretty;
use DragonCode\PrettyArray\Services\Formatter;
use DragonCode\Support\Facades\Filesystem\File;
use DragonCode\Support\Facades\Helpers\Arr;
use LaravelLang\Publisher\Concerns\Has;
use LaravelLang\Publisher\Helpers\Config;

abstract class Base implements Filesystem
{
    use Has;

    public function __construct(
        protected Pretty    $pretty = new Pretty(),
        protected Formatter $formatter = new Formatter(),
        protected Config    $config = new Config()
    ) {
    }

    public function load(string $path): array
    {
        return File::load($path);
    }

    protected function sort(array $items): array
    {
        return Arr::ksort($items);
    }
}
