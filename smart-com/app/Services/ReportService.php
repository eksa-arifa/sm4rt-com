<?php

namespace App\Services;

use App\Repositories\ReportRepository;
use Illuminate\Support\Facades\Auth;

class ReportService {
    protected ReportRepository $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function getAllReport($search = "") {
        return $this->reportRepository->getAll($search);
    }

    public function getById($id){
        return $this->reportRepository->getById($id);
    }

    public function delete($id){
        return $this->reportRepository->delete($id);
    }

    public function create($reportData){
        $photo = $reportData->file("photo");
        $path = $photo->store("photo", "public");

        if(!$path){
            return false;
        }

        return $this->reportRepository->create([
            "description" => $reportData->description,
            "location" => $reportData->location,
            "photo" => $path,
            "status" => "terkirim",
            "user_id" => Auth::user()->id,
            "category_id" => $reportData->category
        ]);
    }
}