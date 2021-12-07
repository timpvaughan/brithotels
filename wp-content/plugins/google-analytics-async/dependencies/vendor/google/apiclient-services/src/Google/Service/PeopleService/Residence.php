<?php

namespace Beehive;

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
class Google_Service_PeopleService_Residence extends \Beehive\Google_Model
{
    public $current;
    protected $metadataType = 'Google_Service_PeopleService_FieldMetadata';
    protected $metadataDataType = '';
    public $value;
    public function setCurrent($current)
    {
        $this->current = $current;
    }
    public function getCurrent()
    {
        return $this->current;
    }
    /**
     * @param Google_Service_PeopleService_FieldMetadata
     */
    public function setMetadata(\Beehive\Google_Service_PeopleService_FieldMetadata $metadata)
    {
        $this->metadata = $metadata;
    }
    /**
     * @return Google_Service_PeopleService_FieldMetadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
    public function setValue($value)
    {
        $this->value = $value;
    }
    public function getValue()
    {
        return $this->value;
    }
}
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
\class_alias('Beehive\\Google_Service_PeopleService_Residence', 'Google_Service_PeopleService_Residence', \false);