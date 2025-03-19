<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerInformationStoreRequest;
use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function booking(Request $request, $slug)
    {
        $this->transactionRepository->saveTransactionDataToSession($request->all());

        return redirect()->route('booking.information', $slug);
    }

    public function information($slug)
    {
        $transaction = $this->transactionRepository->getTranscationDataFromSession();

        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room_id']);

        return view('pages.booking.information', compact('transaction', 'boardingHouse', 'room'));
    }

    public function saveInformation(CustomerInformationStoreRequest $request, $slug)
    {


        $data = $request->validated();
        $data['_token'] = $request->input('_token'); // Tambahkan token CSRF
        // dd($data);

        $this->transactionRepository->saveTransactionDataToSession($data);

        // dd($request->session()->all());

        // dd($this->transactionRepository->getTranscationDataFromSession());
        return redirect()->route('booking.checkout', $slug);
    }

    public function checkout($slug)
    {
        $transaction = $this->transactionRepository->getTranscationDataFromSession();

        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room_id']);

        return view('pages.booking.checkout', compact('transaction', 'boardingHouse', 'room'));
    }


    public function payment(Request $request)
    {

        $this->transactionRepository->saveTransactionDataToSession($request->all());
        $transaction = $this->transactionRepository->saveTransaction($this->transactionRepository->getTranscationDataFromSession());

        dd($transaction);
    }

    public function check()
    {
        return view('pages.booking');
    }
}
