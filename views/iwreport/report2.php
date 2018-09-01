<?php

use yii\helpers\Html;
use dosamigos\highcharts\HighCharts;
use dosamigos\datepicker\DatePicker;

use app\models\Iwreport;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IwreportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Iclick Weekly Reports';
?>

<style>
    
    #tableIclick{
        width: 100%;
    }

    #tableHeader th{
        text-align: center;
        background-color: AliceBlue;
    }
    
    #labelJemaat{
        background-color: aquamarine;
    }

    #labelVolunteers{
        background-color: aquamarine;
    }

    #labelStreaming{
        background-color: aquamarine;
    }

    table, th, td {
        border: 1px solid black; 
    }
    
    th {
        height: 25px;
    }

    td {
        text-align: center;
    }
    

</style>

<div class="container">
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-success']) ?>
    <p></p>
    <div class="table-responsive">
        <table id="tableIclick">
          
            <!-- Header -->
            <tr id="tableHeader">
                <th rowspan="2">ITEM</th>
                <th colspan="4">UMUM 1</th> 
                <th colspan="4">UMUM 2</th>
                <th colspan="4">UMUM 3</th>
                <th colspan="4">UMUM 4</th>
                <th rowspan="2">Grand Total</th>
            </tr>

            <tr id="tableHeader">
                <th colspan="2">Jemaat</th>
                <th>Volunteer</th>
                <th>Streaming</th> 
                <th colspan="2">Jemaat</th>
                <th>Volunteer</th>
                <th>Streaming</th>
                <th colspan="2">Jemaat</th>
                <th>Volunteer</th>
                <th>Streaming</th>
                <th colspan="2">Jemaat</th>
                <th>Volunteer</th>
                <th>Streaming</th>
            </tr>

            <!-- Jemaat Label -->
            <tr><th colspan="18" id="labelJemaat">Jemaat:</th></tr>
                <tr>
                    <th>Pria</th>
                    <td>629</td>
                    <td>41%</td>
                    <th></th>
                    <th></th>
                    <td>1006</td>
                    <td>40%</td>
                    <th></th>
                    <th></th>
                    <td>767</td>
                    <td>44%</td>
                    <th></th>
                    <th></th>
                    <td>430</td>
                    <td>49%</td>
                    <th></th>
                    <th></th>
                    <td>2832</td>
                </tr>
                <tr>
                    <th>Wanita</th>
                    <td>904</td>
                    <td>59%</td>
                    <th></th>
                    <th></th>
                    <td>1480</td>
                    <td>60%</td>
                    <th></th>
                    <th></th>
                    <td>967</td>
                    <td>56%</td>
                    <th></th>
                    <th></th>
                    <td>453</td>
                    <td>51%</td>
                    <th></th>
                    <th></th>
                    <td>3804</td>
                </tr>

            <!-- Volunteer Label -->
            <tr><th colspan="18" id="labelVolunteers">Volunteers:</th></tr>
                <tr>
                    <th>Usher</th>
                    
                    <th colspan="2"></th>
                    <td>63</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>65</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>60</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>42</td>
                    <th></th>
                    
                    <td>230</td>
                </tr>
                <tr>
                    <th>SPro</th>
                    
                    <th colspan="2"></th>
                    <td>15</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>15</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>13</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>13</td>
                    <th></th>
                    
                    <td>56</td>
                </tr>
                <tr>
                    <th>PAW</th>
                    
                    <th colspan="2"></th>
                    <td>16</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>20</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>19</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>19</td>
                    <th></th>
                    
                    <td>74</td>
                </tr>
                <tr>
                    <th>Multimedia</th>
                    
                    <th colspan="2"></th>
                    <td>15</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>15</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>14</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>11</td>
                    <th></th>
                    
                    <td>55</td>
                </tr>
                <tr>
                    <th>Intepreter</th>
                    
                    <th colspan="2"></th>
                    <td>4</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>3</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>5</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>4</td>
                    <th></th>
                    
                    <td>16</td>
                </tr>
                <tr>
                    <th>IHUB</th>
                    
                    <th colspan="2"></th>
                    <td>13</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>15</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>19</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>11</td>
                    <th></th>
                    
                    <td>58</td>
                </tr>
                <tr>
                    <th>Prayer</th>
                    
                    <th colspan="2"></th>
                    <td>18</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>18</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>15</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>8</td>
                    <th></th>
                    
                    <td>59</td>
                </tr>
                

            <!--  Streaming Label -->
            <tr><th colspan="18" id="labelStreaming">Streaming:</th></tr>
                <tr>
                    <th>Indonesia</th>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>1429</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>1320</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>1250</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>1079</td>
                    
                    <td>5141</td>
                </tr>
                <tr>
                    <th>English</th>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>27</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>60</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>46</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>44</td>

                    <td>177</td>
                </tr>
                <tr>
                    <th>Chinese</th>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>0</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>0</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>35</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>0</td>
                    
                    <td>35</td>
                </tr>

            <!--  Total per Item Label -->
            <tr><th colspan="18">Total per item:</th></tr>
                <tr>
                    <th>Jemaat</th>
                    <td colspan="2">1533</td>
                    <th></th>
                    <th></th>
                    
                    <td colspan="2">2486</td>
                    <th></th>
                    <th></th>
                    
                    <td colspan="2">1734</td>
                    <th></th>
                    <th></th>
                    
                    <td colspan="2">883</td>
                    <th></th>
                    <th></th>
                    
                    <td>6636</td>
                </tr>
                <tr>
                    <th>Volunteer</th>
                    <th colspan="2"></th>
                    <td>144</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>151</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>145</td>
                    <th></th>
                    
                    <th colspan="2"></th>
                    <td>108</td>
                    <th></th>
                    
                    <td>548</td>
                </tr>
                <tr>
                    <th>Streaming</th>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>1519</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>1380</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>1331</td>
                    
                    <th colspan="2"></th>
                    <th></th>
                    <td>1123</td>
                    
                    <td>5353</td>
                </tr>

            <!--  Total Kehadiran Label -->
                <tr>
                    <th>Total Kehadiran</th>
                    <td colspan="3">1677</td>
                    <th></th>
                    <td colspan="3">2637</td>
                    <th></th>
                    <td colspan="3">1879</td>
                    <th></th>
                    <td colspan="3">991</td>
                    <th></th>
                    <td>7184</td>
                </tr>

            <!-- Grand Total Label -->
                <tr>
                    <th>Total Kehadiran</th>
                    <td colspan="3">1677</td>
                    <td>1519</td>
                    <td colspan="3">2637</td>
                    <td>1380</td>
                    <td colspan="3">1879</td>
                    <td>1331</td>
                    <td colspan="3">991</td>
                    <td>1123</td>
                    <td>12537</td>
                </tr>
        
        </table>
    </div>
</div>

