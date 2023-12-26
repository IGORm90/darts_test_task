<?php

namespace Models;

use Core\Model;

class Product extends Model {
    
    public function add($post){
        $params = [
            'id' => 0,
            'name' => $post['name'],
            'price' => (float)$post['price'],
        ];

        return $this->db->query('INSERT INTO products VALUES (:id, :name, :price)', $params);
    }

    public function get() {
        return $this->db->row('SELECT * FROM products');
    }

    public function delete($id) {
        $params = [
            'id' =>$id,
        ];
        $this->db->query('DELETE FROM products WHERE id = :id', $params);
    }
}
