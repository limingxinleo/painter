<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Command;

use App\Service\ImageService;
use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Intervention\Image\Image;
use Psr\Container\ContainerInterface;

#[Command]
class DrawCommand extends HyperfCommand
{
    public function __construct(protected ContainerInterface $container)
    {
        parent::__construct('draw:graphical');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('画简单的图形');
    }

    public function handle()
    {
        di()->get(ImageService::class)->graphical();
    }
}
