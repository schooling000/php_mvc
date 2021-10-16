<?php

namespace core {
    class Database
    {
        private $db = null;

        public function __construct($host = 'localhost', $user = 'root', $pass = '')
        {
            try {
                $this->db = new \PDO("mysql:host=" . $host . ";", $user, $pass);
                $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                exit('Không kết nối được với database: ' . $e->getMessage());
            }
        }

        /**
         * Hàm giúp chọ database khi đã kết nối với mysql
         * @param string $db_name
         * @return true|false
         */
        public function select_db($db_name)
        {
            if (is_string($db_name) && $db_name !== '') {
                if ($this->db->exec('use ' . $db_name) !== false) {
                    return true;
                } else {
                    return false;
                };
            } else {
                exit('Bạn cần nhập tên database vào');
            }
        }
        /**
         * Hàm lấy dữ liệu từ bảng
         * @param array $data
         * $data[
         *  "select_field"=>["field1, field2,.."],
         *  "select_table"=>["table1","table2",..],
         *  "select_condition"=>["field1"=>":field1","field2"=>":field2"],
         *  "select_sort"=>["field1"=>"acs", "field2"=>"dcse]
         * ];
         */
        public function select(array $data)
        {
            $query = '';

            $flag = is_array($data) && !empty($data);
            if ($flag) {

                $flag = isset($data['select_field']) && is_array($data['select_field']) && !empty($data['select_field']);
                if ($flag) {
                    $query = 'select ' . strtolower(implode(',', $data['select_field']));
                } else {
                    $query = 'select *';
                }

                $flag = is_array($data['select_table']) && !empty($data['select_table']);
                if ($flag) {
                    $query .= ' from ' . strtolower(implode(',', $data['select_table']));
                } else {
                    exit('$data[select_table] phải tồn tại và không được rổng');
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
                    $stmt = $this->db->prepare($query);
                    $stmt->setFetchMode(\PDO::FETCH_ASSOC);
                    $stmt->execute($data['select_param']);
                    $return_value = $stmt->fetchAll();
                    $stmt->closeCursor();
                    return $return_value;
                } catch (\PDOException $e) {
                    exit('Không kết nối được với database: ' . $e->getMessage());
                }
            } else {
                return false;
            }
        }

        public function insert($data)
        {
            $query = '';

            $flag = isset($data) && is_array($data) && !empty($data);
            if ($flag) {
                $flag = isset($data['insert_table']) && is_string($data['insert_table']) && $data['insert_table'] !== '';
                if ($flag) {
                    $query = 'insert into ' . strtolower($data['insert_table']) . " (";
                } else {
                    exit('$data[insert_table] phải tồn tại và không được rổng');
                }

                $flag = isset($data['insert_field']) && is_array($data['insert_field']) && !empty($data['insert_field']);
                if ($flag) {
                    $arr_field_name_insert = array();
                    $arr_field_value_insert = array();
                    foreach ($data['insert_field'] as $key => $value) {
                        array_push($arr_field_name_insert, $key);
                        array_push($arr_field_value_insert, $value);
                    }
                    $query .= strtolower(implode(',', $arr_field_name_insert)) . ") values (" . strtolower(implode(',', $arr_field_value_insert)) . ");";
                } else {
                    exit('$data[insert_field] phải tồn tại và không được rổng');
                }

                try {
                    $stmt = $this->db->prepare($query);
                    $stmt->execute($data['insert_param']);
                    $last_id = $this->db->lastInsertId();
                    $stmt->closeCursor();
                    return $last_id;
                } catch (\PDOException $e) {
                    exit('Không kết nối được với database: ' . $e->getMessage());
                }
            }
            return false;
        }

        public function update($data)
        {
            $query = '';
            $flag = isset($data) && is_array($data) && !empty($data);
            if ($flag) {
                $flag = isset($data['update_table']) && is_string($data['update_table']) && $data['update_table'] !== '';
                if ($flag) {
                    $query = 'update ' . strtolower($data['update_table']) . ' set ';
                } else {
                    exit('$data[update_table] phải tồn tại và không được rổng');
                }

                $flag = isset($data['update_field']) && is_array($data['update_field']) && !empty($data['update_field']);
                if ($flag) {
                    $arr_value = array();
                    foreach ($data['update_field'] as $key => $value) {
                        array_push($arr_value, $key . ' = ' . $value);
                    }
                    $query .= strtolower(implode(',', $arr_value));
                } else {
                    exit('$data[update_field] phải tồn tại và không được rổng');
                }

                $flag = isset($data['update_condition']) && is_array($data['update_condition']) && !empty($data['update_condition']);
                if ($flag) {
                    $arr_value = array();
                    foreach ($data['update_condition'] as $key => $value) {
                        array_push($arr_value, $key . ' = ' . $value);
                    }
                    $query .= ' where ' . strtolower(implode(' and ', $arr_value));
                } else {
                    exit('$data[update_field] phải tồn tại và không được rổng');
                }

                try {
                    $stmt = $this->db->prepare($query);
                    $result = $stmt->execute($data['update_param']);
                    $stmt->closeCursor();
                    return $result;
                } catch (\PDOException $e) {
                    exit('Không kết nối được với database: ' . $e->getMessage());
                }
            } else {
                return false;
            }
        }

        public function delete($data)
        {
            $query = '';
            $flag = isset($data) && is_array($data) && !empty($data);
            if ($flag) {
                $flag = isset($data['delete_table']) && is_string($data['delete_table']) && $data['delete_table'] !== '';
                if ($flag) {
                    $query = 'delete from ' . strtolower($data['delete_table']);
                } else {
                    exit('$data[delete_table] phải tồn tại và không được rổng');
                }

                $flag = isset($data['delete_condition']) && is_array($data['delete_condition']) && !empty($data['delete_condition']);
                if ($flag) {
                    $arr_value = array();
                    foreach ($data['delete_condition'] as $key => $value) {
                        array_push($arr_value, $key . ' = ' . $value);
                    }
                    $query .= ' where ' . strtolower(implode(' and ', $arr_value));
                } else {
                    exit('$data[delete_condition] phải tồn tại và không được rổng');
                }

                try {
                    $stmt = $this->db->prepare($query);
                    $result = $stmt->execute($data['delete_param']);
                    $stmt->closeCursor();
                    return $result;
                } catch (\PDOException $e) {
                    exit('Không kết nối được với database: ' . $e->getMessage());
                }
            } else {
                return false;
            }
        }

        public function __destruct()
        {
            $this->db = null;
        }
    }
}
