<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{

  public function getAllBoardingHouses($search = null, $city = null, $category = null)
  {
    $query = BoardingHouse::query();

    if ($search) {
      $query->where('name', 'like', '%' . $search . '%');
    }

    if ($city) {
      $query->whereHas('city', function (Builder $query) use ($city) {
        $query->where('slug', $city);
      });
    }

    if ($category) {
      $query->whereHas('category', function (Builder $query) use ($category) {
        $query->where('slug', $category);
      });
    }

    return $query->get();
  }

  public function getPopularBoardingHouses($limit = 5)
  {
    return BoardingHouse::withCount('transactions')->orderBy('transactions_count', 'desc')->limit($limit)->get();
  }

  public function getBoardingHouseByCitySlug($slug)
  {
    return BoardingHouse::with('city')->whereHas('city', function (Builder $query) use ($slug) {
      $query->where('slug', $slug);
    })->get();
  }

  public function getBoardingHouseByCategorySlug($slug)
  {
    /*
    Keuntungan
      *  Eager Loading: Mengurangi jumlah query tambahan saat mengambil data relasi.
      *  whereHas: Memastikan hanya data dengan relasi tertentu yang diambil.
      *  Reusable: Mudah digunakan kembali dengan kondisi yang berbeda
    */

    return BoardingHouse::with('category')->whereHas('category', function (Builder $query) use ($slug) {
      $query->where('slug', $slug);
    })->get();
  }

  public function getBoardingHouseBySlug($slug)
  {
    return BoardingHouse::with('city', 'category')->where('slug', $slug)->first();
  }

  public function getBoardingHouseRoomById($id)
  {
    return Room::find($id);
  }
}
