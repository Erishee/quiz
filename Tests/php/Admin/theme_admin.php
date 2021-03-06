<?php session_start();



?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css"  href="../../css/theme_admin.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
</head>
<body>




<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Admin SuperQ!</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#">Accueil</a></li>
            <li class="active" ><a href="theme_admin.php">Les thématiques</a></li>
            <li><a href="question_admin.php">Les questions</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout_admin.php"><span class="glyphicon glyphicon-log-out"></span> Déconnection</a></li>
        </ul>
    </div>
</nav>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Gestion <b>thématiques</b></h2>

					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>
					</div>
                </div>


            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>ID</th>
                        <th>Nom</th>
						<th>Libellé</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>

                        <?php   $mu = new mysqli('localhost','root','root','BDD_Projet');
                                $sql = 'SELECT * FROM theme';
                                $res = $mu->query($sql) or die($mu->error);


                        ?>

                        <?php $row = $res->fetch_assoc();?>

                        <td><?php echo $row['id_Theme']?></td>
                        <td><?php echo $row['Nom_theme']?></td>
						<td><?php echo $row['Libelle_theme']?></td>

                        <?php ?>

                        <td><span class="label label-success">Active</span></td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                </tbody>

	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
            <?php require_once 'action_theme.php'?>
			<div class="modal-content">
				<form method="post" action="action_theme.php">
					<div class="modal-header">
						<h4 class="modal-title">Ajouter une thématique</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nom</label>
							<input type="text" class="form-control" name="Nom_theme" required>
						</div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="Status_theme" id="Status">
                                <option>0</option>
                                <option>1</option>
                            </select>
                        </div>
						<div class="form-group">
							<label>Libellé</label>
							<textarea class="form-control" name="Libelle_theme" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
						<input type="submit" class="btn btn-success" name="submit" value="Ajouter">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Editer</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" id="Status">
                                <option>0 (Inactive) </option>
                                <option>1 (Active) </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Libellé</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div>
                            <script src="/path/to/js/fileinput.js"></script>
                            <script src="/path/to/js/locales/fr.js"></script>

                            <label class="control-label">Sélectionnez une image :</label>
                            <div class="file-loading">
                                <input id="input-fr" name="inputfr[]" type="file" multiple>
                            </div>
                            <script>
                                $("#input-fr").fileinput({
                                    language: "fr",
                                    uploadUrl: "/file-upload-batch/2",
                                    allowedFileExtensions: ["jpg", "png", "gif"]
                                });
                            </script>
                        </div>
                    </div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
						<input type="submit" class="btn btn-info" value="Valider">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Supprimer</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Êtes-vous sûr(e) de vouloir supprimer ?</p>
						<p class="text-warning"><small>Cette action est définitive.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
						<input type="submit" class="btn btn-danger" value="Supprimer">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>                                		                            