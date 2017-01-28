<?php

/*
 * MIT License
 *  
 * Copyright (c) 2016 Hudhaifa Shatnawi
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Jan 6, 2017 - 11:10:05 AM
 */
class EtymologyPage
        extends DataObjectPage {

    private static $icon = "etymologist/images/etymology.png";
    private static $url_segment = 'etymologist';
    private static $menu_title = 'Etymologist';
    private static $allowed_children = 'none';
    private static $description = 'Adds etymology to your website.';

    public function canCreate($member = false) {
        if (!$member || !(is_a($member, 'Member')) || is_numeric($member)) {
            $member = Member::currentUserID();
        }

        return (DataObject::get($this->owner->class)->count() > 0) ? false : true;
    }

}

class EtymologyPage_Controller
        extends DataObjectPage_Controller {

    public function init() {
        parent::init();

        Requirements::css("etymologist/css/jquery.jOrgChart.css");
        Requirements::css("etymologist/css/jquery.jOrgChart-rtl.css");
        Requirements::css("etymologist/css/etymologist.css");
        Requirements::javascript("etymologist/js/jquery.jOrgChart.js");
    }

    protected function searchObjects($list, $keywords) {
        return $list->filter(array(
                    'Word:PartialMatch' => $keywords
        ));
    }

    protected function getObjectsList() {
        return DataObject::get('Word');
    }

    protected function getFiltersList() {
        $lists = array();

        $langs = DataObject::get('OriginLanguage')->Limit(8);
        if (sizeof($langs) > 0) {
            $lists [] = array(
                'Title' => _t('Etymologist.LANGUAGES', 'Languages'),
                'Items' => $langs
            );
        }

        $regions = DataObject::get('OriginRegion')->Limit(8);
        if (sizeof($regions) > 0) {
            $lists [] = array(
                'Title' => _t('Etymologist.REGIONS', 'Regions'),
                'Items' => $regions
            );
        }

        return new ArrayList($lists);
    }

    protected function getPageLength() {
        return 48;
    }

    public function getWords() {
        return DataObject::get('Word');
    }

}
