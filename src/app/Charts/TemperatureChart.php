<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Http\Controllers\ApiController;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class TemperatureChart extends BaseChart
{
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'temperature_chart';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'temperature_chart';



    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    public ?array $middlewares = ['auth'];



    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $temperatures = ApiController::getTemperatures();

        foreach($temperatures as $temperature){
            $labels[] = date('H:i:s', strtotime($temperature->created_at));
            $data[] = $temperature->value;
        }

        return Chartisan::build()
            ->labels($labels)
            ->dataset('Temperature °C', $data);
    }
}