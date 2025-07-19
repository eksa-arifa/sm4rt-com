<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository{
    protected Report $report;


    public function __construct()
    {
        $report = new Report();

        $this->report = $report;
    }

    public function getAll($search = ""){
        return $this->report->where("description", "LIKE", "%$search%")->paginate(10);
    }

    public function getById($id){
        return $this->report->find($id);
    }

    public function delete($id){
        $report = $this->report->find($id);

        return $report->delete();
    }

    public function create($reportData){
        return $this->report->create($reportData);
    }
}