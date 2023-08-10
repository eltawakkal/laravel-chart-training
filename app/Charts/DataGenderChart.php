<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DataGenderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Data Anggota Per Gender')
            ->setSubtitle('Data Per 2023.')
            ->addData([
                User::where('gender', 'Laki-laki')->count(),
                User::where('gender', 'Perempuan')->count(),
                User::where('gender', 'Lainnya')->count(),
            ])
            ->setColors(['#ff0000', '#ff00fb', '#61d7ff'])
            ->setLabels(['Laki-laki', 'Perempuan', 'Lainnya']);
    }
}
