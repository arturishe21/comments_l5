<?php namespace Vis\Builder\Helpers;

use Vis\Builder\Handlers\CustomHandler;
use Illuminate\Support\Facades\View;

class CommentsHandler extends CustomHandler
{
    /*
     * show field in list comments
     */
    public function onGetListValue($formField, array &$row)
    {
        if ($formField->getFieldName() == "record" && $row['commentpage_type'] && $row['commentpage_id']) {
            $model = $row['commentpage_type'];
            $page = $model::find($row['commentpage_id']);

            return "<a href = '". $page->getUrl() ."' target='_blank'>" . $page->title . "</a>";
        }

        if ($formField->getFieldName() == "name") {
            if (isset($row['user_id']) && $row['user_id']) {
                return "<a href = '/admin/users?id=" .$row['user_id']. "' target='_blank'>" . $row['name'] . "</a>";
            }
        }

    }

    /*
     * not select in db
     */
    public function onAddSelectField($formField, $row)
    {
        if ($formField->getFieldName() == "record") {
            return true;
        }
    }

    public function onGetEditInput($formField, array &$row)
    {
        return $this->onGetListValue($formField, $row);

    }

    /*
     * update record
     */
    public function onUpdateRowData(array &$value, $row)
    {
        if (isset($row['id'])) {

            unset($value['record']);

        }
    }

}