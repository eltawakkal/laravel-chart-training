<?php

namespace App\Charts;

use App\Models\ItemMarhalah;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DataMarhalahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $chart = $this->chart->donutChart();

        $data = [];
        $labels = [];

        $itemMarhalahs = ItemMarhalah::all();

        foreach ($itemMarhalahs as $item) {
            $labels[] = $item->name;
            $data[] = User::where('marhalah', $item->id)->count();
        }

        $chart->setTitle('Data Berdasarkan Marhalah');
        $chart->setSubtitle('Data Update Per 2023');
        $chart->addData($data);
        $chart->setLabels($labels);

        return $chart;
    }
}
