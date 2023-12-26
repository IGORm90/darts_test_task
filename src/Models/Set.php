<?php

namespace Models;

use Core\Model;

class Set extends Model
{

    public function add($post)
    {
        $params = [
            'name' => $post['name'],
            'sets' => $post['sets'] ?? [],
            'products' => $post['products'] ?? []
        ];

        if ($params['products']) $params['products'] = array_unique($params['products']);
        if ($params['sets']) $params['sets'] = array_unique($params['sets']);

        $setParams = [
            'id' => 0,
            'name' => $params['name'],
            'total_price' => '0'
        ];

        if ($this->db->query('INSERT INTO sets VALUES (:id, :name, :total_price)', $setParams)) {
            $newSetId = $this->db->lastInsertId();

            foreach ($params['products'] as $productId) {
                $productParam = [
                    'set_id' => $newSetId,
                    'product_id' => $productId,
                    'parent_id' => null
                ];

                $this->db->query('INSERT INTO sets_items VALUES (:set_id, :product_id, :parent_id)', $productParam);
            }

            foreach ($params['sets'] as $setId) {
                $productParam = [
                    'set_id' => $newSetId,
                    'product_id' => null,
                    'child_id' => $setId
                ];

                $this->db->query('INSERT INTO sets_items VALUES (:set_id, :product_id, :parent_id)', $productParam);
            }

            return true;
        }

        return false;
    }

    public function get()
    {
        return $this->db->row('SELECT * FROM sets');
    }

    public function single(int $id)
    {
        $params = [
            'id' => $id,
        ];

        $set = $this->db->row('SELECT * FROM sets WHERE id = :id', $params)[0];

        $setData = [
            'set' => $set,
            'setData' => $this->setData($id)
        ];

        return $setData;
    }

    public function setData(int $id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->row('SELECT si.set_id, p.name as product_name, s.name as set_name, s.id as child_set_id FROM sets_items si
                                  LEFT JOIN sets s
                                  ON si.child_id = s.id
                                  LEFT JOIN products p
                                  ON si.product_id = p.id
                                  WHERE si.set_id = :id', $params);
    }

    public function delete($id)
    {
        $params = [
            'id' => $id,
        ];

        if(!$this->canDelete($id)) {
            return false;
        }

        return $this->db->query('DELETE FROM sets WHERE id = :id', $params);
    }

    private function canDelete($id){
        $params = [
            'id' => $id,
        ];

        return !(bool)$this->db->row('SELECT COUNT(*) as count FROM sets_items WHERE child_id = :id', $params)[0]['count'];
    }
}
