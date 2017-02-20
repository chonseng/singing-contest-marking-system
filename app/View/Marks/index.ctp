
	<!-- <?php var_dump($marks);?>  -->

<style>
/*	.radio-toolbar input[type="radio"] {
	    display:none;
	}
	input[type="radio"] + label {
		display: block;
		width: 50%;
		float: left;
	  	margin: 0;
	  	margin: 10px 0;
	}
	.radio-toolbar label {
		padding: 18px;
	  	font-size: 16px;
	  	background: #333;
	  	border: 1px solid black;
	  	color: #ddd;
	}

	.radio-toolbar input[type="radio"]:checked + label {
	    background-color: #43ac6a;
	    border-color: #3c9a5f;
	    color: white;
	}

	.radio li {
		border: 1px solid black;
		margin: 0;
		padding: 0;
		margin: 10px 0;
		list-style: none;
	}*/
</style>

<div class="navbar ">
		
	  <nav class="white darken-1 ">
	    <div class="nav-wrapper">
	    		<div class="container">
			      <div class="col s12">
			        <a href="#!" class="brand-logo purple-text text-darken-2"><i class="mdi-social-person"></i><p><?=$user["User"]["name"] ?></p></a>
			        <ul class="right side-nav purple-text text-darken-2">
			          <!-- <li><i class="mdi-social-person"></i><p><?=$user["User"]["name"] ?></p></li> -->
			          <li class="purple darken-1"><a href="<?php $this->Path->myroot(); ?>marks/logout"><i class="mdi-action-lock-open white-text text-darken-2"></i></a></li>
			        </ul>
			      </div>
			    </div>
	    </div>
	  </nav>
</div>
<div class="container">
<!-- 
<div class="header">
	<div class="row">	
		<div class="large-8 medium-8 small-6 columns">
			<h1>培正中學歌唱比賽</h1>
		</div>
		<div class="large-4 medium-4 small-6 columns">
			<a href="<?php $this->Path->myroot(); ?>marks/logout" class="button logout small">登出<br><?=$user["User"]["name"] ?></a>
		</div>
	</div>
</div> -->
        	<?php echo $this->Session->flash(); ?>


	<div class="row">
			
	</div>
	<div class="row">
		<form action="<?php $this->Path->myroot(); ?>marks/add" method="post" id="marking-form" data-abide>
			<div class="box">
		
			<div class="card white lighten-5">
		    <div class="card-content black-text">
		      <!-- <span class="card-title black-text">評分</span> -->
					<div class="input">
						<label>參賽者編號</label>
						<input type="number" name="Mark[singer_id]" id="singer_id" required>
					</div>
					<div class="radio-toolbar">
						<input type="radio" name="Mark[type]" value="0" id="radio0" checked>
						<label for="radio0">獨唱</label>
						<input type="radio" name="Mark[type]" value="1" id="radio1">
						<label for="radio1">合唱</label>
					</div>
					<center>
						<div id="loading" class="preloader-wrapper small active">
						    <div class="spinner-layer spinner-blue">
						      <div class="circle-clipper left">
						        <div class="circle"></div>
						      </div><div class="gap-patch">
						        <div class="circle"></div>
						      </div><div class="circle-clipper right">
						        <div class="circle"></div>
						      </div>
						    </div>

						    <div class="spinner-layer spinner-red">
						      <div class="circle-clipper left">
						        <div class="circle"></div>
						      </div><div class="gap-patch">
						        <div class="circle"></div>
						      </div><div class="circle-clipper right">
						        <div class="circle"></div>
						      </div>
						    </div>

						    <div class="spinner-layer spinner-yellow">
						      <div class="circle-clipper left">
						        <div class="circle"></div>
						      </div><div class="gap-patch">
						        <div class="circle"></div>
						      </div><div class="circle-clipper right">
						        <div class="circle"></div>
						      </div>
						    </div>

						    <div class="spinner-layer spinner-green">
						      <div class="circle-clipper left">
						        <div class="circle"></div>
						      </div><div class="gap-patch">
						        <div class="circle"></div>
						      </div><div class="circle-clipper right">
						        <div class="circle"></div>
						      </div>
						    </div>
						  </div>
					</center>
					<blockquote id="reminder">請先輸入參賽者編號</blockquote>
					<ul class="collection" id="marking_list">
			     <li class="collection-item">
							<label>節奏 (1-25)</label>
							<div class="row">
							  <div class="small-10 medium-11 columns">
							    <div id="skill_slider" class="range-slider radius" data-slider data-options="display_selector: #sliderOutput1; start: 1; end: 25;">
							      <span class="range-slider-handle" role="slider" tabindex="0"></span>
							      <span class="range-slider-active-segment"></span>
							      <input type="hidden" name="Mark[skill]">
							    </div>
							  </div>
							  <div class="small-2 medium-1 columns">
							    <span id="sliderOutput1"></span>
							  </div>
							</div>
			     </li>
			     <li class="collection-item">
							<label>音準和歌唱技巧 (1-25)</label>
							<div class="row">
							  <div class="small-10 medium-11 columns">
							    <div id="interpretation_slider" class="range-slider radius" data-slider data-options="display_selector: #sliderOutput2; start: 1; end: 25;">
							      <span class="range-slider-handle" role="slider" tabindex="0"></span>
							      <span class="range-slider-active-segment"></span>
							      <input type="hidden" name="Mark[interpretation]">
							    </div>
							  </div>
							  <div class="small-2 medium-1 columns">
							    <span id="sliderOutput2"></span>
							  </div>
							</div>

			     </li>
			     <li class="collection-item">
							<label>發音、咬字 (1-20)</label>
							<div class="row">
							  <div class="small-10 medium-11 columns">
							    <div id="style_slider" class="range-slider radius" data-slider data-options="display_selector: #sliderOutput3; start: 1; end: 20;">
							      <span class="range-slider-handle" role="slider" tabindex="0"></span>
							      <span class="range-slider-active-segment"></span>
							      <input type="hidden" name="Mark[style]">
							    </div>
							  </div>
							  <div class="small-2 medium-1 columns">
							    <span id="sliderOutput3"></span>
							  </div>
							</div>

			     </li>
			     <li class="collection-item">
							<label>感情(20%)+台風(10%) (1-30)</label>
							<div class="row">
							  <div class="small-10 medium-11 columns">
							    <div id="creativity_slider"  class="range-slider radius" data-slider data-options="display_selector: #sliderOutput4; start: 1; end: 30;">
							      <span class="range-slider-handle" role="slider" tabindex="0"></span>
							      <span class="range-slider-active-segment"></span>
							      <input type="hidden" name="Mark[creativity]">
							    </div>
							  </div>
							  <div class="small-2 medium-1 columns">
							    <span id="sliderOutput4"></span>
							  </div>
							</div>

			     </li>
			   </ul>
		    </div>
		  </div>
				
			<button id="submit_score" type="submit" class="btn-large waves-effect waves-light purple darken-1">Submit<i class="mdi-content-send right"></i></button>
		</form>

	</div>

</div>

<script>
$(document).ready(function(){
	$("#loading").hide();
	$("#marking_list").hide();
	function initSlider() {
		$("#skill_slider").foundation('slider', 'set_value', 1);
		$("#interpretation_slider").foundation('slider', 'set_value', 1);
		$("#style_slider").foundation('slider', 'set_value', 1);
		$("#creativity_slider").foundation('slider', 'set_value', 1);
	}

	initSlider();

		function singerChanged() {
			var singer_id = $("#singer_id").val();
			var type = $("input[name='Mark[type]']:checked").val();
			console.log(type);
			if (singer_id!="") {
				$("#loading").show();
				$("#marking_list").show();
				$("#reminder").hide();
				$.getJSON( "<?php echo str_replace("//","/", $this->webroot); ?>marks/getMarks.json?type="+type+"&singer_id="+singer_id, function( data ) {
					// console.log(data=="");
					if (data!="") {
						var skill = data["skill"];
						var interpretation = data["interpretation"];
						var style = data["style"];
						var creativity = data["creativity"];
						console.log(skill);
						$("#skill_slider").foundation('slider', 'set_value', skill);
						$("#interpretation_slider").foundation('slider', 'set_value', interpretation);
						$("#style_slider").foundation('slider', 'set_value', style);
						$("#creativity_slider").foundation('slider', 'set_value', creativity);
					}
					else {
						initSlider();
					}

				 // 	var myhtml = "";
				 // 	$.each( data, function( key, val ) {
				 // 		myhtml += "<option value='" + key + "'>" + val["name"] + " - $"+ val["price"]+ "</option>";
				 // 	});
				 // 	if (myhtml == "") myhtml = "<option value='0'>-</option>";
					// console.log(myhtml);
					// $("#book").html(myhtml);


				}).done(function(){
					$("#loading").hide();
					$("#marking_list").show();
					console.log("loaded");
				});
			}
			else {
				$("#marking_list").hide();
				$("#reminder").show();
				initSlider();
			}
		}
		singerChanged();

		$("#singer_id").keyup(singerChanged);
		$("input[name='Mark[type]']").change(singerChanged);
})
</script>