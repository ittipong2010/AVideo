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

namespace Google\Service\GKEHub;

class MembershipFeatureState extends \Google\Model
{
  protected $configmanagementType = ConfigManagementMembershipState::class;
  protected $configmanagementDataType = '';
  protected $stateType = FeatureState::class;
  protected $stateDataType = '';

  /**
   * @param ConfigManagementMembershipState
   */
  public function setConfigmanagement(ConfigManagementMembershipState $configmanagement)
  {
    $this->configmanagement = $configmanagement;
  }
  /**
   * @return ConfigManagementMembershipState
   */
  public function getConfigmanagement()
  {
    return $this->configmanagement;
  }
  /**
   * @param FeatureState
   */
  public function setState(FeatureState $state)
  {
    $this->state = $state;
  }
  /**
   * @return FeatureState
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MembershipFeatureState::class, 'Google_Service_GKEHub_MembershipFeatureState');
