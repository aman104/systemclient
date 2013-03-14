<div class="page-header">
  <h2>Płatności <small>dokonaj doładowanie konta</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('@user'); ?>">Profil</a> <span class="divider">/</span></li>
  <li class="active">Płatności</li>
</ul>

<?php include_partial('user/menu', array('active' => 'payment')); ?>

<div class="span9">



	<h4 class="t_center">Dokonaj doładowania konta</h4>

	<br />

	<h4 class="t_center"><small>Podaj ilość punktów:</small></h4>

	<form action="<?php echo url_for('@payment'); ?>" method="get">
		<input type="text" name="points" id="points-input" />
		<br />
		<div id="points-info">
			
		</div>
		<input type="submit" id="points-submit" value="Doładuj konto" class="btn btn-primary" />
	</form>

	<script>

		$('#points-input').on('keyup', function() {
			var val = parseInt($(this).val(), 10);
			if(val > 0)
			{
				if(val <= 1000)
				{
					var p = 0.030;
				}
				else if(val <= 5000)
				{
					var p = 0.025;	
				}
				else if(val < 10000)
				{
					var p = 0.020;
				}
				else
				{
					var p = 0.015;
				}

				price = (val * p);
				price = price.toFixed(2);

				var text = 'Ilość punktów: '+val+' <br />Kwota doładowania: <strong>'+price+' zł</strong> = '+ val +' x '+p+' zł';
				$('#points-info').html(text);	
			}
			else
			{
				$('#points-info').html('');	
			}
			
		});

	</script>

	<br />

	<h4 class="t_center">Cennik</h4>

	<table class="table table-bordered table-striped">
		<tr>
			<th class="t_center">Liczba adresów e-mail <br />(punktów)</th>
			<th class="t_center">Kwota za adres e-mail <br />(punkt)</th>
		</tr>
		<tr>
			<td class="t_center">do 1000</td>
			<td class="t_center">0,030 zł</td>
		</tr>
		<tr>
			<td class="t_center">1001 - 5000</td>
			<td class="t_center">0,025 zł</td>
		</tr>
		<tr>
			<td class="t_center">5001 - 10000</td>
			<td class="t_center">0,020 zł</td>
		</tr>
		<tr>
			<td class="t_center"> > 10000</td>
			<td class="t_center">0,015 zł</td>
		</tr>
	</table>

	

</div>

<div style="clear: both"></div>

</div>