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

        if(!$this->canDelete($id)) {
            return false;
        }

        $this->db->query('DELETE FROM products WHERE id = :id', $params);
    }

    private function canDelete($id){
        $params = [
            'id' => $id,
        ];

        return !(bool)$this->db->row('SELECT COUNT(*) as count FROM product_id WHERE child_id = :id', $params)[0]['count'];
    }
}
