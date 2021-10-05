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

namespace Google\Service\ServiceConsumerManagement;

class ServiceAccountConfig extends \Google\Collection
{
  protected $collection_key = 'tenantProjectRoles';
  public $accountId;
  public $tenantProjectRoles;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setTenantProjectRoles($tenantProjectRoles)
  {
    $this->tenantProjectRoles = $tenantProjectRoles;
  }
  public function getTenantProjectRoles()
  {
    return $this->tenantProjectRoles;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceAccountConfig::class, 'Google_Service_ServiceConsumerManagement_ServiceAccountConfig');
