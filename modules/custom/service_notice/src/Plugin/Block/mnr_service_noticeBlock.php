<?php

namespace Drupal\service_notice\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'mnr_service_notice' Block.
 *
 * @Block(
 *   id = "mnr_service_notice_block",
 *   admin_label = @Translation("MNR Service Notices"),
 *   
 * )
 */
class mnr_service_noticeBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $val = $this->service_notice_file_get_contents('http://www.mta.info/supplemental/mnr/blurb.php');
    return [
    '#theme' => 'service_notice',
    '#service_notice' => $val,
  ];

}

public function service_notice_file_get_contents($file_path){
  $file_content = file_get_contents($file_path);
  // find and replace relative paths with absolutes
  $file_content = str_replace('src="/','src="http://www.mta.info/',$file_content);
  $file_content = str_replace('href="/','href="http://www.mta.info/',$file_content);
  return $file_content;
}

}
