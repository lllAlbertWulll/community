<?php
/**
 * Created by PhpStorm.
 * User: gargamel
 * Date: 2017/12/1
 * Time: 16:51
 */

namespace App\Markdown;


class Markdown
{
  protected $parser;

  /**
   * Markdown constructor.
   * @param $parser
   */
  public function __construct(Parser $parser)
  {
	$this->parser = $parser;
  }

  public function markdown($text)
  {
    $html = $this->parser->makeHtml($text);
    return $html;
  }
}