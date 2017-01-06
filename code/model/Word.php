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
 * @version 1.0, Jan 6, 2017 - 10:33:31 AM
 */
class Word
        extends DataObject {

    private static $db = array(
        'Word' => 'Varchar(255)',
        'Spelling' => 'Varchar(255)',
        'Meaning' => 'Varchar(255)',
        'Description' => 'Varchar(255)',
    );
    private static $translate = array(
    );
    private static $has_one = array(
        'Pronunciation' => 'File'
    );
    private static $has_many = array(
    );
    private static $many_many = array(
        'References' => 'OriginReference',
        'Languages' => 'OriginLanguage',
        'Origins' => 'Word',
    );
    private static $searchable_fields = array(
        'Word' => array(
            'field' => 'TextField',
            'filter' => 'PartialMatchFilter',
        ),
    );
    private static $summary_fields = array(
    );

    public function fieldLabels($includerelations = true) {
        $labels = parent::fieldLabels($includerelations);

        $labels['Word'] = _t('WordOrigins.WORD', 'Word');
        $labels['Spelling'] = _t('WordOrigins.SPELLING', 'Spelling');
        $labels['Meaning'] = _t('WordOrigins.MEANING', 'Meaning');
        $labels['Description'] = _t('WordOrigins.DESCRIPTION', 'Description');
        $labels['Pronunciation'] = _t('WordOrigins.PRONUNCIATION', 'Pronunciation');
        $labels['References'] = _t('WordOrigins.REFERENCES', 'References');
        $labels['Languages'] = _t('WordOrigins.LANGUAGES', 'Languages');
        $labels['Origins'] = _t('WordOrigins.ORIGINS', 'Origins');

        return $labels;
    }

    public function getCMSFields() {
        $self = & $this;

        $this->beforeUpdateCMSFields(function ($fields) use ($self) {
            if ($field = $fields->fieldByName('Root.Main.Pronunciation')) {
                $field->getValidator()->setAllowedExtensions(array('mp3'));
                $field->setFolderName("etymologist/pronunciations");

                $fields->removeFieldFromTab('Root.Main', 'Pronunciation');
                $fields->addFieldToTab('Root.Main', $field);
            }

//            $fields->removeFieldFromTab('Root', 'Categories');
//            $fields->removeFieldFromTab('Root', 'Authors');
//
//            $categoryField = TagField::create(
//                            'Categories', //
//                            'Categories', //
//                            BookCategory::get(), //
//                            $self->Categories()
//            );
//            $fields->addFieldToTab('Root.Details', $categoryField);
        });

        $fields = parent::getCMSFields();

        return $fields;
    }

    public function getTitle() {
        return $this->Word;
    }

    public function getName() {
        return $this->Word;
    }

    public function forTemplate() {
        return $this->renderWith('Word');
    }

}