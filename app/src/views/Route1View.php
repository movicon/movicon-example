<?php
/**
 * The only purpose of  this file is to illustrate a 'view'. A 'view' is
 * responsible for preparing documents, which are printed from the 'routes'.
 *
 * Please delete this file in production.
 */
namespace views;
use core\http\View;
use controllers\Route1Controller;

class Route1View extends View
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(new Route1Controller());
    }

    /**
     * Makes a document.
     *
     * This abstract method must be implemented in each view. Note also the
     * 'json_encode' function. It converts any string to a JSON format.
     *
     * @return string
     */
    public function getDocument()
    {
        return json_encode(
            [
                "title" => $this->controller->title,
                "items" => array_map(
                    function ($item) {
                        return [
                            "id" => $item["id"],
                            "title" => $item["title"]
                        ];
                    },
                    $this->controller->items
                )
            ]
        );
    }
}
