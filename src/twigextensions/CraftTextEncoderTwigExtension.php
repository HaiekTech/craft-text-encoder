<?php
/**
 * Craft Text Encoder plugin for Craft CMS 3.x
 *
 * Encodes email addresses separately or inside text fields
 *
 * @link      https://github.com/HaiekTech
 * @copyright Copyright (c) 2018 HAIEK
 */

namespace haiek\crafttextencoder\twigextensions;

use haiek\crafttextencoder\CraftTextEncoder;

use Craft;

/**
 * @author    HAIEK
 * @package   CraftTextEncoder
 * @since     0.0.1
 */
class CraftTextEncoderTwigExtension extends \Twig_Extension
{

  // Private Methods
  // =========================================================================

  /**
   * @param null $text
   *
   * @return string
   */   
  private function encodeMail($text = null) {
    $output = "";
    for ($i = 0; $i < strlen($text); $i++) { $output .= '&#'.ord($text[$i]).';'; }
    return $output;
  }

  // Public Methods
  // =========================================================================

  /**
   * @inheritdoc
   */
  public function getName()
  {
    return 'CraftTextEncoder';
  }

  /**
   * @inheritdoc
   */
  public function getFilters()
  {
    return [
        new \Twig_SimpleFilter('encodeMail', [$this, 'encodeMailInternal']),
        new \Twig_SimpleFilter('findEncodeMail', [$this, 'findEncodeMailInternal']),
    ];
  }

  /**
   * @inheritdoc
   */
  public function getFunctions()
  {
    return [
        new \Twig_SimpleFunction('encodeMail', [$this, 'encodeMailInternal']),
        new \Twig_SimpleFunction('findEncodeMail', [$this, 'findEncodeMailInternal']),
    ];
  }

  /**
   * @param null $text
   *
   * @return string
   */
  public function encodeMailInternal($text = null)
  {
    return $this->encodeMail($text);
  }

  /**
   * @param null $text
   *
   * @return string
   */
  public function findEncodeMailInternal($text = null)
  {
    $result = $text;
    $result = preg_replace_callback(
        "/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/i",
        function($str) {
            return $this->encodeMail($str[0]);
        }, $result);

    return $result;
  }
}
