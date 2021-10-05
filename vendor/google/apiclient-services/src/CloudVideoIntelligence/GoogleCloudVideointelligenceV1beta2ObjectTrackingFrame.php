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

namespace Google\Service\CloudVideoIntelligence;

class GoogleCloudVideointelligenceV1beta2ObjectTrackingFrame extends \Google\Model
{
  protected $normalizedBoundingBoxType = GoogleCloudVideointelligenceV1beta2NormalizedBoundingBox::class;
  protected $normalizedBoundingBoxDataType = '';
  public $timeOffset;

  /**
   * @param GoogleCloudVideointelligenceV1beta2NormalizedBoundingBox
   */
  public function setNormalizedBoundingBox(GoogleCloudVideointelligenceV1beta2NormalizedBoundingBox $normalizedBoundingBox)
  {
    $this->normalizedBoundingBox = $normalizedBoundingBox;
  }
  /**
   * @return GoogleCloudVideointelligenceV1beta2NormalizedBoundingBox
   */
  public function getNormalizedBoundingBox()
  {
    return $this->normalizedBoundingBox;
  }
  public function setTimeOffset($timeOffset)
  {
    $this->timeOffset = $timeOffset;
  }
  public function getTimeOffset()
  {
    return $this->timeOffset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1beta2ObjectTrackingFrame::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2ObjectTrackingFrame');
