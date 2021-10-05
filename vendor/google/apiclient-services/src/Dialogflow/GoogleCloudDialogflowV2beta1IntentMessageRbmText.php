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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2beta1IntentMessageRbmText extends \Google\Collection
{
  protected $collection_key = 'rbmSuggestion';
  protected $rbmSuggestionType = GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestion::class;
  protected $rbmSuggestionDataType = 'array';
  public $text;

  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestion[]
   */
  public function setRbmSuggestion($rbmSuggestion)
  {
    $this->rbmSuggestion = $rbmSuggestion;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestion[]
   */
  public function getRbmSuggestion()
  {
    return $this->rbmSuggestion;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1IntentMessageRbmText::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmText');
