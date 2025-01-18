<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
  public function getTransactionDataFromSession()
  {
    return session()->get('transaction');
  }

  public function createTransactionDataToSession($data)
  {
    $transaction = session()->get('transaction', []);

    /* 
    *mengubah data yang ada di session menjadi array
    * kemudian menggabungkan data yang ada di session dengan data yang baru
    * jika ada data yang sama maka data yang baru akan menimpa data yang lama
    * jika tidak ada data yang sama maka data yang baru akan ditambahkan
    */
    foreach ($data as $key => $value) {
      $transaction[$key] = $value;
    }

    session()->put('transaction', $transaction);
  }
}
