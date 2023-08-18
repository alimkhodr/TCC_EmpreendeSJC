<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class produto
{

  /**
   * Identificador único da produto
   * @var integer
   */
  public $id;

  /**
   * Título da produto
   * @var string
   */
  public $nome;

  /**
   * Descrição da produto (pode conter html)
   * @var string
   */
  public $categoria;

  /**
   * Define se a produto ativa
   * @var string
   */
  public $preco;

  /**
   * Data de publicação da produto
   * @var string
   */
  public $data;

  /**
   * Método responsável por cadastrar uma nova produto no banco
   * @return boolean
   */
  public function cadastrar()
  {
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A produto NO BANCO
    $obDatabase = new Database('produtos');
    $this->id = $obDatabase->insert([

      'img'    => $this->img,
      'nome'    => $this->nome,
      'categoria' => $this->categoria,
      'preco'     => $this->preco,
      'data'      => $this->data
    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a produto no banco
   * @return boolean
   */
  public function atualizar()
  {
    return (new Database('produtos'))->update('id = ' . $this->id, [

      'img'    => $this->img,
      'nome'    => $this->nome,
      'categoria' => $this->categoria,
      'preco'     => $this->preco,
      'data'      => $this->data
    ]);
  }

  /**
   * Método responsável por excluir a produto do banco
   * @return boolean
   */
  public function excluir()
  {
    return (new Database('produtos'))->delete('id = ' . $this->id);
  }

  /**
   * Método responsável por obter as produtos do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getprodutos($where = null, $order = null, $limit = null)
  {
    return (new Database('produtos'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  /**
   * Método responsável por buscar uma produto com base em seu ID
   * @param  integer $id
   * @return produto
   */
  public static function getproduto($id)
  {
    return (new Database('produtos'))->select('id = ' . $id)
      ->fetchObject(self::class);
  }
}
