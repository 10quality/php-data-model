<?php

namespace TenQuality\Data;

use TenQuality\Data\Contracts\Arrayable;
use TenQuality\Data\Contracts\Stringable;
use TenQuality\Data\Traits\DataTrait;
use TenQuality\Data\Traits\CastTrait;

/**
 * Base abstract "DATA MODEL" class.
 *
 * @author Cami M <info@10quality.com>
 * @copyright 10 Quality <info@10quality.com>
 * @package TenQuality\Data\Model
 * @version 1.0.0
 */
abstract class Model implements Arrayable, Stringable
{
    use DataTrait, CastTrait;
}