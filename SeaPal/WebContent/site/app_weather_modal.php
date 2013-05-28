	<?php 
	$con	=	mysql_connect("localhost","root","root");
	mysql_select_db("webtech2013",	$con);
	$result	=	mysql_query("SELECT	*	FROM	weatherdata");
	$row	=	mysql_fetch_array($result);
	?>
	<div class="row-fluid">
		<div class="span12 ">
			<div id="MyWizard" class="wizard">
				<ul class="steps">
					<li data-target="#step1" class="active"><span
						class="badge badge-info">1</span>Step 1<span class="chevron"></span>
					</li>
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
			<form method="post" action="saveData.php">
				<div class="step-content">
					<div class="step-pane active" id="step1">
						<div class="progress progress-striped active">
							<div class="bar" style="width: 20%;"></div>
						</div>
						<div class="well">
							<div class="row-fluid ">
								<div class="span12  "></div>
							</div>
							<div class="row-fluid ">
								<div class="span2  ">
									<label class="">Wind strength</label>
								</div>
								<div class="span1  ">
									<input name="wind_strength"
										onkeypress="return isNumberKey(event);"
										value="<?php echo htmlentities($row['WindStrength']);?>"
										type="text" class="input-small">
								</div>
							</div>
							<div class="row-fluid ">
								<div class="span2  ">
									<label class="">Wind direction</label>
								</div>
								<div class="span1  ">
									<select name="wind_direction">
										<option value="North"
										<?php echo htmlentities($row['WindDirection']) == 'North' ? ' selected="selected"' : '';?>>North</option>
										<option value="East"
										<?php echo htmlentities($row['WindDirection']) == 'East' ? ' selected="selected"' : '';?>>East</option>
										<option value="West"
										<?php echo htmlentities($row['WindDirection']) == 'West' ? ' selected="selected"' : '';?>>West</option>
										<option value="South"
										<?php echo htmlentities($row['WindDirection']) == 'South' ? ' selected="selected"' : '';?>>South</option>
										<option value="North-East"
										<?php echo htmlentities($row['WindDirection']) == 'North-East' ? ' selected="selected"' : '';?>>North-East</option>
										<option value="North-West"
										<?php echo htmlentities($row['WindDirection']) == 'North-West' ? ' selected="selected"' : '';?>>North-West</option>
										<option value="South-East"
										<?php echo htmlentities($row['WindDirection']) == 'South-East' ? ' selected="selected"' : '';?>>South-East</option>
										<option value="South-West"
										<?php echo htmlentities($row['WindDirection']) == 'South-West' ? ' selected="selected"' : '';?>>South-West</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="step-pane" id="step2">
						<div class="progress progress-striped active">
							<div class="bar" style="width: 40%;"></div>
						</div>
						<div class="well">
							<div class="row-fluid ">
								<div class="span12  "></div>
							</div>
							<div class="row-fluid ">
								<div class="span2">
									<label class="">Air pressure</label>
								</div>
								<div class="span1  ">
									<input name="air_pressure"
										onkeypress="return isNumberKey(event);"
										value="<?php echo htmlentities($row['AirPressure']);?>"
										type="text" class="input-small">
								</div>
							</div>
							<div class="row-fluid ">
								<div class="span2 ">
									<label class="">Temparature</label>
								</div>
								<div class="span2  ">
									<input name="air_temparature"
										onkeypress="return isNumberKey(event);"
										value="<?php echo htmlentities($row['Temparature']);?>"
										type="text" class="input-small">
								</div>
								<div class="span1  ">
									<label class="">Unit</label>
								</div>
								<div class="span1  ">
									<select name="temparature_unit">
										<option value="C"
										<?php echo htmlentities($row['Unit']) == 'C' ? ' selected="selected"' : '';?>>
											Celcius</option>
										<option value="F"
										<?php echo htmlentities($row['Unit']) == 'F' ? ' selected="selected"' : '';?>>
											Fahrenheit</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="step-pane" id="step3">
						<div class="progress progress-striped active">
							<div class="bar" style="width: 60%;"></div>
						</div>
						<div class="well">
							<div class="row-fluid ">
								<div class="span12  "></div>
							</div>
							<div class="row-fluid ">
								<div class="span2 ">
									<label class="">Clouds</label>
								</div>
								<div class="span1  ">
									<select name="clouds" id="clouds"><option value="n"
									<?php echo htmlentities($row['Clouds']) == 'n' ? ' selected="selected"' : '';?>>
											No</option>
										<option value="y"
										
										<option value="n"
										<?php echo htmlentities($row['Clouds']) == 'y' ? ' selected="selected"' : '';?>>
											Yes</option>
									</select>
								</div>
							</div>
							<div class="row-fluid ">
								<div class="span2 ">
									<label class="">Rain</label>
								</div>
								<div class="span1  ">
									<select name="rain" id="rain"><option value="n"
										
										<option value="n"
										<?php echo htmlentities($row['Rain']) == 'n' ? ' selected="selected"' : '';?>>
											No</option>
										<option value="y"
										
										<option value="n"
										<?php echo htmlentities($row['Rain']) == 'y' ? ' selected="selected"' : '';?>>
											Yes</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="step-pane" id="step4">
						<div class="progress progress-striped active">
							<div class="bar" style="width: 80%;"></div>
						</div>
						<div class="well">
							<div class="row-fluid ">
								<div class="span12  "></div>
							</div>
							<div class="row-fluid ">
								<div class="span2 ">
									<label class="">Wave height</label>
								</div>
								<div class="span1  ">
									<input name="wave_height"
										onkeypress="return isNumberKey(event);"
										value="<?php echo htmlentities($row['WaveHeight']);?>"
										type="text" class="input-small">
								</div>
							</div>
							<div class="row-fluid ">
								<div class="span2 ">
									<label class="">Wave direction</label>
								</div>
								<div class="span1  ">
									<select name="wave_direction">
										<option value="North"
										<?php echo htmlentities($row['WaveDirection']) == 'North' ? ' selected="selected"' : '';?>>
											North</option>
										<option value="East"
										<?php echo htmlentities($row['WaveDirection']) == 'East' ? ' selected="selected"' : '';?>>
											East</option>
										<option value="West"
										<?php echo htmlentities($row['WaveDirection']) == 'West' ? ' selected="selected"' : '';?>>
											West</option>
										<option value="South"
										<?php echo htmlentities($row['WaveDirection']) == 'South' ? ' selected="selected"' : '';?>>
											South</option>
										<option value="North-East"
										<?php echo htmlentities($row['WaveDirection']) == 'North-East' ? ' selected="selected"' : '';?>>
											North-East</option>
										<option value="North-West"
										<?php echo htmlentities($row['WaveDirection']) == 'North-West' ? ' selected="selected"' : '';?>>
											North-West</option>
										<option value="South-East"
										<?php echo htmlentities($row['WaveDirection']) == 'South-East' ? ' selected="selected"' : '';?>>
											South-East</option>
										<option value="South-West"
										<?php echo htmlentities($row['WaveDirection']) == 'South-West' ? ' selected="selected"' : '';?>>
											South-West</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="step-pane" id="step5">
						<div class="progress progress-striped active">
							<div class="bar" style="width: 100%;"></div>
						</div>
						<div class="well">
							<div class="row-fluid ">
								<div class="span12  "></div>
							</div>
							<div class="row-fluid ">
								<div class="span2 ">
									<label class="">Date and time</label>
								</div>
								<div class="span1  ">
									<input type="text"
										value="<?php echo htmlentities($row['DateTime']);?>"
										class="input-normal" name="date" id="datepicker" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<script>
	$(function() {
		$('#datepicker').datetimepicker({
			dateFormat: 'yy-mm-dd',
		    timeFormat: 'hh:mm:ss'
	});
	});
</script>
<script>
$(function(){
$('#sl1').slider({
  formater: function(value) {
    return 'Current value: '+value;
  }
});
});
</script>
<script type="text/javascript">
function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
};
</script>