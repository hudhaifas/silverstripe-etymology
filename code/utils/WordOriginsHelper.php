<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Jan 6, 2017 - 12:07:31 PM
 */
class WordOriginsHelper {

    public static function get_word($id) {
        return DataObject::get_by_id('Word', (int) $id);
    }

    public static function search_all_words($request, $term) {
        if (is_numeric($term)) {
            return DataObject::get_by_id('Word', $term);
        }

        // to fetch books that's name contains the given search term
        $words = DataObject::get('Word')->filterAny(array(
            'Word:PartialMatch' => $term,
            'Spelling:PartialMatch' => $term,
            'Meaning:PartialMatch' => $term,
            'Description:PartialMatch' => $term,
        ));

        return $words;
    }

}