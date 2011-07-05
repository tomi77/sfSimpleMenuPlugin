<?php

/**
 * One menu level
 *
 * @package    sfSimpleMenuPlugin
 * @subpackage model
 * @author     Tomasz Jakub Rup <tomasz.rup@gmail.com>
 */
class sfMenu implements ArrayAccess, Iterator
{

  /**
   *
   * @var array[sfMenuItem]
   */
  private $menu = array();
  
  /**
   * Current offset for iterator
   * @var integer
   */
  private $currentOffset = 0;

  public function __construct(array $menuItems)
  {
    foreach ($menuItems as $menuItem) {
      if (isset($menuItem['credentials']) && !sfContext::getInstance()->getUser()->hasCredential($menuItem['credentials'])) {
        continue;
      }
      $this->menu[] = new sfMenuItem($menuItem);
    }
  }
  
  /*
   * ArrayAccess interface
   */

  public function offsetExists($offset)
  {
    return isset($this->menu[$offset]);
  }

  public function offsetGet($offset)
  {
    return $this->menu[$offset];
  }

  public function offsetSet($offset, $value)
  {
    $this->menu[$offset] = $value;
  }

  public function offsetUnset($offset)
  {
    unset($this->menu[$offset]);
  }
  
  /*
   * Iterator interface
   */

  public function current()
  {
    return $this->menu[$this->currentOffset];
  }

  public function next()
  {
    $keys = array_keys($this->menu);
    $next = null;
    foreach ($keys as $idx => $key) {
      if ($key == $this->currentOffset) {
        $next = $idx + 1;
      }
    }
    if ($next) {
      $this->currentOffset = isset($keys[$next]) ? $keys[$next] : null;
    }

    return $this->currentOffset;
  }

  public function key()
  {
    return $this->currentOffset;
  }

  public function valid()
  {
    return isset($this->menu[$this->currentOffset]);
  }

  public function rewind()
  {
    $keys = array_keys($this->menu);
    $this->currentOffset = $keys[0];
  }

}
