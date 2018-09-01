<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'MEETING MINUTES';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="row">
	    <div class="col-lg-3">
	    <?= Html::img('@web/Logo.png') ?>
		</div>
	    <div class="col-lg-9">
	    <h1 style="text-decoration: underline;"><?= Html::encode($this->title) ?></h1>
		<h3>RESEARCH AND DEV TEAM</h3>
		</div>
	</div>
	
	<hr>

    <!-- Meeting Information -->	
    <h3>Meeting Information</h3>
    <div class="col-lg-6">
	    <table>
	    	<tr>
	    		<th>Day, Date</th>
	    		<td>: Sunday, 20 November 2016</td>
	    	</tr>
	    	<tr>
	    		<th>Time</th>
	    		<td>: 22.00-23.00</td>
	    	</tr>
			<tr>
	    		<th>Location</th>
	    		<td>: Sate Ayam Ponorogo</td>
	    	</tr>
	    	<tr>
	    		<th>Meeting Type</th>
	    		<td>: Suddenly</td>
	    	</tr>
		</table>
	</div>
	    <div class="col-lg-6">
	    <table>
	    	<tr>
	    		<th>Called By</th>
	    		<td>: Ng Chu En</td>
	    	</tr>
	    	<tr>
	    		<th>Facilitator</th>
	    		<td>: Ng Chu En</td>
	    	</tr>
			<tr>
	    		<th>Note Taker</th>
	    		<td>: Ng Chu En</td>
	    	</tr>
	    	<tr>
	    		<th>Time Keeper</th>
	    		<td>: Ng Chu En</td>
	    	</tr>
		</table>
	</div>

	<!-- Attendees & Absent -->
    <div class="row">
    	<div class="col-lg-6">
    			<h4>Attendees</h4>
	    		<ol>
	    			<li>A</li>
	    			<li>B</li>
	    			<li>C</li>
	    			<li>D</li>
	    			<li>E</li>
	    			<li>F</li>
	    			<li>G</li>
	    			<li>H</li>
	    			<li>I</li>
	    			<li>J</li>
	    		</ol>
    	</div>
    	<div class="col-lg-6">
    		<h4>Absent</h4>
    		<ol>
    			<li>K</li>
    			<li>L</li>
    			<li>M</li>
    			<li>N</li>
    			<li>O</li>
    		</ol>
    	</div>
    </div>
    
    <hr>

	<!-- Meeting Agenda -->
	<h3>Meeting Agenda</h3>
	<table style="width:100%">
	  <tr>
	    <th>[CHECK]</th>
	    <th>PIC</th> 
	    <th>Due Date</th>
	  </tr>
	  <tr>
	    <td>Data Foto</td>
	    <td>Agung</td> 
	    <td>Soon</td>
	  </tr>
	  <tr>
	    <td>Panduan Operator</td>
	    <td>Agung</td> 
	    <td>21 November 2016</td>
	  </tr>
	</table>
	<br>
	<table style="width:100%">
	  <tr>
	    <th>[PLAN]</th>
	    <th>PIC</th> 
	    <th>Due Date</th>
	  </tr>
	  <tr>
	    <td>Data Foto</td>
	    <td>Agung</td> 
	    <td>Soon</td>
	  </tr>
	  <tr>
	    <td>Panduan Operator</td>
	    <td>Agung</td> 
	    <td>21 November 2016</td>
	  </tr>
	</table>
	<br>
	<table style="width:100%">
	  <tr>
	    <th>[DO & ACT]</th>
	    <th>PIC</th> 
	    <th>Due Date</th>
	  </tr>
	  <tr>
	    <td>Data Foto</td>
	    <td>Agung</td> 
	    <td>Soon</td>
	  </tr>
	  <tr>
	    <td>Panduan Operator</td>
	    <td>Agung</td> 
	    <td>21 November 2016</td>
	  </tr>
	</table>

	<!-- Meeting Schedule -->
	<h3>Meeting Schedule</h3>
	<p>Day, Date : Thursday, 24 November 2016</p>
	<p>Time : 18.00 - 19.00 PM</p>
	<p>Location : GMS</p>
</div>
