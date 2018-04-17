<?php
namespace App\Controller\Component;
 
use Cake\Controller\Component;
 
class DateComponent extends Component
{
    public function today($day)
    {
        return date('Y-m-d', strtotime($day));
    }
}