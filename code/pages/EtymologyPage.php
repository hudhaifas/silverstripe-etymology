<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Jan 6, 2017 - 11:10:05 AM
 */
class EtymologyPage
        extends Page {

    private static $icon = "etymologist/images/etymology.png";
    private static $url_segment = 'etymologist';
    private static $menu_title = 'Etymologist';
    private static $allowed_children = 'none';
    private static $description = 'Adds etymology to your website.';

}

class EtymologyPage_Controller
        extends Page_Controller {

    private static $allowed_actions = array(
        'word',
        // Search Actions
        'SearchWord',
        'doSearchWord'
    );

    public function word() {
        $id = $this->getRequest()->param('ID');
        $word = WordOriginsHelper::get_word($id);

        return $word->renderWith("Word");
    }

    /// Search Book ///
    public function SearchWord() {
        $fields = new FieldList(
                TextField::create('SearchTerm', _t('WordOrigins.SEARCH', 'Search'))
        );

        // Create Validators
        $validator = new RequiredFields('SearchTerm');

        $form = new Form($this, 'SearchWord', $fields, new FieldList(new FormAction('doSearchWord')), $validator);
        $form->setTemplate('Form_SearchPerson');

        return $form;
    }

    public function doSearchWord($data, $form) {
        $term = $data['SearchTerm'];

        $words = WordOriginsHelper::search_all_words($this->request, $term);
        $title = _t('WordOrigins.SEARCH_RESULTS', 'Search Results') . ': ' . $term;

        if ($words) {
            $paginate = PaginatedList::create(
                            $words, $this->request
                    )->setPageLength(50)
                    ->setPaginationGetVar('s');


            return $this
                            ->customise(array(
                                'Words' => $words,
                                'Results' => $paginate,
                                'Title' => $title
                            ))
                            ->renderWith(array('EtymologyPage', 'Page'));
        } else {
            return $this->httpError(404, 'No books could be found!');
        }
    }

    public function getWords() {
        return DataObject::get('Word');
    }

}