<?php

namespace core;

class Models
{

    public function get_model($model)
    {
        $model = 'app' . DS . 'models' . DS . ucwords($model);
        return new $model();
    }

    /**
     * 
     **/
    public function get_data($data)
    {
        global $db;
        $query = '';

        $flag = is_array($data) && !empty($data);
        if ($flag) {

            $flag = isset($data['select_field']) && is_array($data['select_field']) && !empty($data['select_field']);
            if ($flag) {
                $query = 'select ' . strtolower(implode(',', $data['select_field']));
            } else {
                exit('Models::get_data($data): $data[select_field] không được rổng');
            }

            $flag = is_array($data['select_table']) && !empty($data['select_table']);
            if ($flag) {
                $query .= ' from ' . strtolower(implode(',', $data['select_table']));
            } else {
                exit('Models::get_data($data): $data[select_table] không được rổng');
            }

            $flag = isset($data['select_condition']) && is_array($data['select_condition']) && !empty($data['select_condition']);
            if ($flag) {
                $arr_value = array();
                foreach ($data['select_condition'] as $key => $value) {
                    array_push($arr_value, $key . ' = ' . $value);
                }
                $query .= ' where ' . strtolower(implode(' AND ', $arr_value));
            }

            $flag = isset($data['select_sort']) && is_array($data['select_sort']) && !empty($data['select_sort']);
            if ($flag) {
                $arr_value = array();
                foreach ($data['select_sort'] as $key => $value) {
                    array_push($arr_value, $key . ' ' . $value);
                }
                $query .= ' order by ' . strtolower(implode(' , ', $arr_value));
            }

            $query .= ' ;';

            try {
                $stmt = $db->prepare($query);
                $stmt->setFetchMode(\PDO::FETCH_ASSOC);
                $stmt->execute($data['select_param']);
                return $stmt->fetchAll();
            } catch (\PDOException $e) {
                exit($e->getMessage());
            }
        } else {
            return false;
        }
    }
}
