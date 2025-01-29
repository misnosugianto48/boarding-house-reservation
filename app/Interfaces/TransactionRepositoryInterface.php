<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
  public function getTranscationDataFromSession();

  public function saveTransactionDataToSession($data);
}
