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
namespace App\Service;

use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;
use Intervention\Image\AbstractShape;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class ImageService extends Service
{
    #[Inject]
    protected ImageManager $manager;

    public function graphical()
    {
        $this->fire();
        $this->gold();
    }

    public function gold()
    {
        $path = BASE_PATH . '/storage/assets/gold_90.png';
        $image = $this->manager->canvas(90, 90);
        $image->circle(90, 45, 45, fn(AbstractShape $draw) => $draw->background('#FFFFFF'));

        $fire = $this->manager->make(BASE_PATH . '/storage/assets/gold.png');
        $fire->heighten(90);
        $image->insert($fire, 'center');

        $image->save($path);
    }

    public function fire()
    {
        $path = BASE_PATH . '/storage/assets/fire_90.png';

        $image = $this->manager->canvas(90, 90);

        $image->circle(90, 45, 45, fn(AbstractShape $draw) => $draw->background('#FFFFFF'));
        $fire = $this->manager->make(BASE_PATH . '/storage/assets/fire.png');
        $fire->heighten(90);
        $image->insert($fire, 'center');

        $image->save($path);
    }

}
