<?php
class TodoList extends TORM\Model {

    public static function lastId() {
        $info = TodoList::where()->order('position DESC')->limit(1)->current();
        return $info->position + 1;
    }

    public static function factory($array) {
        $object = TodoList::find($array['id']);
        try {
            if (!is_object($object)) $object = new TodoList();

            $object->title = $array['title'];
            $object->description = $array['description'];
            $object->position = (intval($array['position'])>0) ? $array['position'] : TodoList::lastId();
            $object->save();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

TodoList::setTableName('todolist');
TodoList::setPK('id');
