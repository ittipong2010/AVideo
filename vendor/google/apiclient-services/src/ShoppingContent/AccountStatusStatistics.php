<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\ShoppingContent;

class AccountStatusStatistics extends \Google\Model
{
  public $active;
  public $disapproved;
  public $expiring;
  public $pending;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setDisapproved($disapproved)
  {
    $this->disapproved = $disapproved;
  }
  public function getDisapproved()
  {
    return $this->disapproved;
  }
  public function setExpiring($expiring)
  {
    $this->expiring = $expiring;
  }
  public function getExpiring()
  {
    return $this->expiring;
  }
  public function setPending($pending)
  {
    $this->pending = $pending;
  }
  public function getPending()
  {
    return $this->pending;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountStatusStatistics::class, 'Google_Service_ShoppingContent_AccountStatusStatistics');
