<?php

namespace Models;

use Core\Model;

class Set extends Model {
    
    public function add($post){
        $params = [
            'name' => $post['name'],
            'sets' => $post['sets'] ?? [],
            'products' => $post['products'] ?? []
        ];

        if ($params['products']) $params['products'] = array_unique( $params['products']);
        if ($params['sets']) $params['sets'] = array_unique( $params['sets']);

        $setParams = [
            'id' => 0,
            'name' => $params['name'],
            'total_price' => '0'
        ];

        if ($this->db->query('INSERT INTO sets VALUES (:id, :name, :total_price)', $setParams)) {
            $newSetId = $this->db->lastInsertId();

            foreach($params['products'] as $productId) {
                $productParam = [
                    'set_id' => $newSetId,
                    'product_id' => $productId,
                    'parent_id' => null
                ];

                $this->db->query('INSERT INTO sets_items VALUES (:set_id, :product_id, :parent_id)', $productParam);
            }

            foreach($params['sets'] as $setId) {
                $productParam = [
                    'set_id' => $newSetId,
                    'product_id' => null,
                    'parent_id' => $setId
                ];

                $this->db->query('INSERT INTO sets_items VALUES (:set_id, :product_id, :parent_id)', $productParam);
            }

            return true;
        }

        return false;
    }

    public function get() {
        return $this->db->row('SELECT * FROM sets');
    }

    public function delete($id) {
        $params = [
            'id' =>$id,
        ];
        $this->db->query('DELETE FROM sets WHERE id = :id', $params);
    }

}