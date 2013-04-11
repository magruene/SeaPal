<!DOCTYPE html>
<html lang="en" class="fuelux">
<?php include("header.php")?>
<body>
	<div class="row-fluid">
		<div class="span6 offset3 ">

			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Saved changes successfully!
			</div>
			<div id="MyWizard" class="wizard">
				<ul class="steps">
					<li data-target="#step1" class="active"><span
						class="badge badge-info">1</span>Step 1<span class="chevron"></span></li>
					<li data-target="#step2"><span class="badge">2</span>Step 2<span
						class="chevron"></span></li>
					<li data-target="#step3"><span class="badge">3</span>Step 3<span
						class="chevron"></span></li>
					<li data-target="#step4"><span class="badge">4</span>Step 4<span
						class="chevron"></span></li>
					<li data-target="#step5"><span class="badge">5</span>Step 5<span
						class="chevron"></span></li>
				</ul>
				<div class="actions">
					<button class="btn btn-mini btn-prev">
						<i class="icon-arrow-left"></i>Prev
					</button>
					<button class="btn btn-mini btn-next" data-last="Finish">
						Next<i class="icon-arrow-right"></i>
					</button>
				</div>
			</div>
			<form method="post">
				<div class="step-content">
					<div class="step-pane active" id="step1">
						<div class="well">
							<div class="row-fluid ">
								<div class="span12  "></div>
							</div>
							<div class="row-fluid ">
								<div class="span2  ">
									<label class="">Wind strength</label>
								</div>
								<div class="span1  ">
									<input name="wind_strength" type="text" class="input-small">
								</div>
							</div>
							<div class="row-fluid ">
								<div class="span2  ">
									<label class="">Wind direction</label>
								</div>
								<div class="span1  ">
									<select name="wind_direction">
										<option value="North">North</option>
										<option value="East">East</option>
										<option value="West">West</option>
										<option value="South">South</option>
										<option value="North-East">North-East</option>
										<option value="North-West">North-West</option>
										<option value="South-East">South-East</option>
										<option value="South-West">South-West</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="step-pane" id="step2">
						<div class="row-fluid ">
							<div class="span12  "></div>
						</div>
						<div class="row-fluid ">
							<div class="span2">
								<label class="">Air pressure</label>
							</div>
							<div class="span1  ">
								<input name="air_pressure" type="text" class="input-small">
							</div>
						</div>
						<div class="row-fluid ">
							<div class="span2 ">
								<label class="">Temparature</label>
							</div>
							<div class="span2  ">
								<input name="air_temparature" type="text" class="input-small">
							</div>
							<div class="span1  ">
								<label class="">Unit</label>
							</div>
							<div class="span1  ">
								<select name="temparature_unit">
									<option value="C">Celcius</option>
									<option value="F">Fahrenheit</option>
								</select>
							</div>
						</div>
					</div>
					<div class="step-pane" id="step3">
						<div class="row-fluid ">
							<div class="span12  "></div>
						</div>
						<div class="row-fluid ">
							<div class="span2 ">
								<label class="">Clouds</label>
							</div>
							<div class="span1  ">
								<select name="clouds" id="clouds"><option value="n">No</option>
									<option value="y">Yes</option></select>
							</div>
						</div>
						<div class="row-fluid ">
							<div class="span2 ">
								<label class="">Rain</label>
							</div>
							<div class="span1  ">
								<select name="rain" id="rain"><option value="n">No</option>
									<option value="y">Yes</option></select>
							</div>
						</div>
					</div>
					<div class="step-pane" id="step4">
						<div class="row-fluid ">
							<div class="span12  "></div>
						</div>
						<div class="row-fluid ">
							<div class="span2 ">
								<label class="">Wave height</label>
							</div>
							<div class="span1  ">
								<input name="wave_height" type="text" class="input-small">
							</div>
						</div>
						<div class="row-fluid ">
							<div class="span2 ">
								<label class="">Wave direction</label>
							</div>
							<div class="span1  ">
								<select name="wave_direction">
									<option value="North">North</option>
									<option value="East">East</option>
									<option value="West">West</option>
									<option value="South">South</option>
									<option value="North-East">North-East</option>
									<option value="North-West">North-West</option>
									<option value="South-East">South-East</option>
									<option value="South-West">South-West</option>
								</select>
							</div>
						</div>
					</div>
					<div class="step-pane" id="step5">
						<div class="row-fluid ">
							<div class="span12  "></div>
						</div>
						<div class="row-fluid ">
							<div class="span2 ">
								<label class="">Date and time</label>
							</div>
							<div class="span1  ">
								<input type="text" class="input-normal" name="date"
									id="datepicker" />
							</div>
						</div>
						<div class="row-fluid ">
							<button class="btn btn-success  ">Save</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>

<?php
$hit_count = @file_get_contents('count.txt'); 
echo $hit_count; 
$hit_count++; 
@file_put_contents('count.txt', $hit_count); 
?>