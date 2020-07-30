<?php
namespace App\Model;

    class ProdutoDao{
        public function create(Produto $prod){
            $sql = 'INSERT INTO produtos(nome, descricao) VALUES (?,?)';

            $insert = Conexao::getConn()->prepare($sql);
            $insert->bindValue(1,$prod->getNome());
            $insert->bindValue(2,$prod->getDescricao());

            $insert->execute();
        }
        public function read(){
            $sql = 'SELECT * FROM produtos';

            $select = Conexao::getConn()->prepare($sql);
            $select->execute();

            if($select->rowCount() > 0):
                $resultado = $select->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            endif;
        }
        public function update(Produto $prod){
            $sql = 'UPDATE produtos SET nome = ?, descricao = ? WHERE id = ?';

            $update = Conexao::getConn()->prepare($sql);
            $update->bindValue(1,$produto->getNome());
            $update->bindValue(2,$produto->getDescricao());
            $update->bindValue(3,$produto->getId());
            
            $update->execute();
        }
        public function delete($id){
            $sql = 'DELETE FROM produtos WHERE id = ?';
            $delete = Conexao::getConn()->prepare($sql);
            $delete = bindValue(1,$id);

            $delete->execute();
        }
        
    }
?>