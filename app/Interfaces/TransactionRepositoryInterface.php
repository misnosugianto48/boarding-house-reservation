<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
  public function getTransactionDataFromSession();

  public function createTransactionDataToSession($data);
}
