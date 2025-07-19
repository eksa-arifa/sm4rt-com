<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ReportRepository;
use App\Services\CategoryService;
use App\Services\ReportService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct()
    {
        $reportRepository = new ReportRepository();

        $this->reportService = new ReportService($reportRepository);
    }

    public function index(Request $request){
        $search = $request->search;
        $reports = $this->reportService->getAllReport($search);

        return view("pages.reports", compact("reports", "search"));
    }

    public function getById($id){
        $report = $this->reportService->getById($id);

        return view("pages.detail-report", compact("report"));
    }

    public function delete($id){
        if($this->reportService->delete($id)){
            return redirect()->back()->with("success", "Berhasil menghapus data");
        }else{
            return redirect()->back()->with("error", "Gagal menghapus data");
        }
    }

    public function createView(){
        $categoryRepository = new CategoryRepository();
        $categoryService = new CategoryService($categoryRepository);

        $categories = $categoryService->getAll();

        return view("pages.create-report", compact("categories"));
    }

    public function createReport(ReportRequest $request){
        $validate = $request->validated();


        DB::beginTransaction();
        try{

            $this->reportService->create($validate);

            DB::commit();

            return redirect("/dashboard");

        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with("error", "Gagal membuat laporan");
        }
    }
}
