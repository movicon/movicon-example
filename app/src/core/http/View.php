<?php
namespace core\http;
use \Exception;
use movicon\http\HttpController;
use movicon\http\HttpView;

/**
 * The base class of any view .
 */
abstract class View extends HttpView
{
    /**
     * Constructor.
     *
     * @param HttpController $controller Controller
     */
    public function __construct($controller)
    {
        parent::__construct($controller, "application/json");
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function printDocument()
    {
        try {
            parent::printDocument();
        } catch (Exception $e) {
            echo $e->getMessage();
            throw $e;
        }
    }
}
