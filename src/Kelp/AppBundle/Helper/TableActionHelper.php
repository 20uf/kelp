<?php
namespace Kelp\AppBundle\Helper;

use Symfony\Component\Routing\Router;

class TableActionHelper implements TableHelperInterface
{
    /**
     * @var Router
     */
    protected $router;

    /**
     * TableActionHelper constructor.
     *
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param array $table
     * @param array $element
     * @return array
     */
    public function addTableAction(array $table, array $element)
    {
        $tableAction = [];
        foreach ($table as $key => $value) {
            $action = [];
            $action[] = '<div class="btn-group" role="group">';
            if (array_key_exists('edit', $element)) {
                $editUrl = $this->router->generate(
                    $element['edit'],
                    ['id' => $value->getId()]
            );
                $action[] =
                '<button type="button" class="btn-edit btn btn-default btn-xs" title="Editer"'.
                        'data-url="' . $editUrl . '" data-id="' . $value->getId() . '">'.
                            '<i class="fa fa-pencil fa-lg"></i>'.
                '</button>';
            }

            if (array_key_exists('delete', $element)) {
                $deleteUrl =  $this->router->generate(
                    $element['delete'],
                    ['id' => $value->getId()]
                );
                $action[] =
                    '<button type="button" class="btn-delete btn btn-danger btn-xs" title="Editer"'.
                        'data-url="' . $deleteUrl . '">'.
                    '<i class="fa fa-trash-o fa-lg"></i>'.
                    '</button>';
            }
            $action[] = '</div>';
            $tableAction[$key] = implode($action);
        }
        return $tableAction;
    }
}
