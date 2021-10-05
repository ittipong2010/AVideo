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

namespace Google\Service\Dfareporting;

class AccountPermissionsListResponse extends \Google\Collection
{
  protected $collection_key = 'accountPermissions';
  protected $accountPermissionsType = AccountPermission::class;
  protected $accountPermissionsDataType = 'array';
  public $kind;

  /**
   * @param AccountPermission[]
   */
  public function setAccountPermissions($accountPermissions)
  {
    $this->accountPermissions = $accountPermissions;
  }
  /**
   * @return AccountPermission[]
   */
  public function getAccountPermissions()
  {
    return $this->accountPermissions;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountPermissionsListResponse::class, 'Google_Service_Dfareporting_AccountPermissionsListResponse');
