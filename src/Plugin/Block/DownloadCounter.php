<?php

namespace Drupal\file_upload\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides  a Download Counter block.
 * 
 * @Block(
 *  id = "file_count_block",
 *  admin_label = @Translation("Count File Downloads")
 * )
 */
class DownloadCounter extends BlockBase
{
    /**
     * Implements Drupal|Core|Block|BlockBase::build().
     */
    public function build() {   
        $build = [
            '#markup' => $this->t('This file was downloaded:  %time.'),
            '#cache' => [
                'keys' => ['file_count:block'],
                'contexts' => ['user'],
                'max-age' => '10',
            ],
          ];


        return $build;
    }
}
