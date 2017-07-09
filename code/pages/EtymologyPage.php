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

    private static $icon = "heritage-etymology/images/etymology.png";
    private static $url_segment = 'etymology';
    private static $menu_title = 'Etymology';
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

        Requirements::css(ETYMOLOGY_DIR . "/css/jquery.jOrgChart.css");
        Requirements::css(ETYMOLOGY_DIR . "/css/jquery.jOrgChart-rtl.css");
        Requirements::css(ETYMOLOGY_DIR . "/css/etymology.css");
        if ($this->isRTL()) {
            Requirements::css(ETYMOLOGY_DIR . "/css/etymology-rtl.css");
        }
        Requirements::javascript(ETYMOLOGY_DIR . "/js/jquery.jOrgChart.js");
    }

    protected function searchObjects($list, $keywords) {
        return $list->filter(array(
                    'Word:PartialMatch' => $keywords
        ));
    }

    protected function getObjectsList() {
        return DataObject::get('EtymologyWord');
    }

    protected function getFiltersList() {
//        $lists = array();
//
//        $langs = DataObject::get('EtymologyLanguage')->Limit(8);
//        if (sizeof($langs) > 0) {
//            $lists [] = array(
//                'Title' => _t('Etymology.LANGUAGES', 'Languages'),
//                'Items' => $langs
//            );
//        }
//
//        return new ArrayList($lists);
        return null;
    }

    protected function getPageLength() {
        return 48;
    }

    public function getWords() {
        return DataObject::get('EtymologyWord');
    }

}
