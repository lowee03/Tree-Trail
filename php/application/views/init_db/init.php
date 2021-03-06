<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8">
	<title>DataBase Initialization</title>
	<style type="text/css">
	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		background-color: white;
		border: 1px solid #ccc;
		padding: 1px 5px;
		color: #888;
	}

	.container {
		float: left;
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
		width: 100%;
	}

	.inner-container {
		float: left;
		margin: 0px 10px 10px;
	}

	.left {
		width: 70%;
	}

	.right {
		width: 20%;
	}

	.right > p {
		text-align: right;
	}

	p {
		margin: 12px 15px 12px 15px;
	}

	ul.tabbed {
		margin-left: 15px;
		border-left: 2px dotted #D0D0D0;
		list-style: none;
	}

	.red-text {
		color: #ab4526;
	}

	/* "Borrowed" from bootstrap v3.3.2 */
	.btn {
		display:inline-block;
		padding:6px 12px;
		margin-bottom:0;
		font-size:14px;
		font-weight:400;
		line-height:1.42857143;
		text-align:center;
		white-space:nowrap;
		vertical-align:middle;
		-ms-touch-action:manipulation;
		touch-action:manipulation;
		cursor:pointer;
		-webkit-user-select:none;
		-moz-user-select:none;
		-ms-user-select:none;
		user-select:none;
		background-image:none;
		border:1px solid transparent;
		color:#fff;
		background-color:#d9534f;
		border-color:#d43f3a;
		text-decoration: none;
	}

	.btn:focus,.btn:hover{
		color:#fff;
		background-color:#c9302c;
		border-color:#ac2925
	}

	.ul-align {
		margin-right: 15px;
		list-style: none;
		text-align: right;
	}

	span.ok:after {
		color: green;
		content: "Ok";
	}

	span.notok:after {
		color: #ab2925;
		content: "Not Ok";
	}

	.footer {
		border-top: 1px solid #D0D0D0;
	}
	</style>
</head>
<body>
	<div class="container">
		<h1>DataBase Initialization</h1>
		<div class="inner-container left">
			<p>Steps</p>
			<p>
				modify_db<br>
				<code><?= $modify_db["query"] ?></code>
			</p>
			<p>
				drop_tables<br>
				<code><?= $drop_tables["query"] ?></code>
			</p>
			<ul class="tabbed"><li>Tables:<br>
			<?php
				$tables = array_keys($drop_tables["result"]);
				foreach($tables as $table):
					echo "<code>".$table."</code><br>";
				endforeach;
			?>
			</li></ul>
			<p>
				create_tables<br>
				<code><?= $create_tables["query"] ?></code>
			</p>
			<ul class="tabbed"><li>Tables:<br>
			<?php
				$tables = array_keys($create_tables["result"]);
				foreach($tables as $table):
					echo "<code>".$table."</code><br>";
				endforeach;
			?>
			</li></ul>
		</div>
		<div class="inner-container right">
			<p>Results</p>
			<p>
				&nbsp;<br>
				<span class="<?= $modify_db["result"] ?>"></span>
			</p>
			<p>
				&nbsp;<br>
				<span class="<?= $drop_tables["final_result"] ?>"></span>
			</p>
			<ul class="ul-align">
				<li>&nbsp;<br>
				<?php
					$tables = array_keys($drop_tables["result"]);
					foreach($tables as $table):
						echo "<span class='".$drop_tables["result"][$table]."'></span><br>";
					endforeach;
				?>
			</li></ul>
			<p>
				&nbsp;<br>
				<span class="<?= $create_tables["final_result"] ?>"></span>
			</p>
			<ul class="ul-align">
				<li>&nbsp;<br>
				<?php
					$tables = array_keys($create_tables["result"]);
					foreach($tables as $table):
						echo "<span class='".$create_tables["result"][$table]."'></span><br>";
					endforeach;
				?>
			</li></ul>
		</div>
	</div>
	<p><a class="btn" href="init_db">Re-check Database</a></p>
</body>
</html>