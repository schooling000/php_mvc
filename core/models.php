<?php
namespace core;

class Models{

    public function get_model($model)
    {
        $model = 'app' . DS . 'models' . DS . ucwords($model);
        return new $model();
    }

    public function get_data($data)
    {
        global $db;
        $query = '';

        $flag = is_array($data) && !empty($data);
        if($flag)
        {
            $flag = is_array($data['select_field']) && !empty($data['select_field']);
            if($flag){
                $query = 'SELECT ' . strtolower(implode(',',$data['select_field']));
            }else{
                exit('Models::get_data($data): $data[select_field] không được rổng');
            }

            $flag = is_array($data['select_table']) && !empty($data['select_table']);
            if($flag){
                $query .= ' FROM ' . strtolower(implode(',',$data['select_table']));
            }else{
                exit('Models::get_data($data): $data[select_table] không được rổng');
            }

            $flag = is_array($data['select_condition']) && !empty($data['select_condition']);
            if(is_array($data['select_condition']) && !empty($data['select_condition'])){
                $arr_value = array();
                foreach ($data['select_condition'] as $key => $value) {
                    array_push($arr_value, $key . ' = ' . $value);
                }
                $query .= ' WHERE ' . strtolower(implode(' AND ',$arr_value));
            }else{
                exit('Models::get_data($data): $data[select_field] không được rổng');
            }


            dnd( $query);
        }else{
            return false;
        }
    }

}