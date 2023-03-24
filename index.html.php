<!DOCTYPE html>
	<html>
	<head>
	<title>Helpdesksaker</title>
	</head>
	<body>
	    <div>
	        <h1>Legg til ny sak</h1>
	        <form method="POST" action="addCase.php">
	            <label>Beskrivelse:</label><input type="text" name="beskrivelse">
	            <br>
	            <label>Status:</label><input type="text" name="tilstand">
	            <br>
	            <label>Bruker-ID:</label><input type="number" name="brukerID">
	            <br>
	            <label>Tekniker-ID:</label><input type="number" name="teknikerID">
	            <br>
	            <input type="submit" name="add" value="Registrer">
	        </form>
	    </div>
		<p>
			hei
		</p>
	    <br>
	    <div>
	        <h1>Oversikt over saker</h1>
	        <table border="1">
	            <thead>
	                <th>Saks-ID</th>
	                <th>Beskrivelse</th>
	                <th>Status</th>
	                <th>Bruker-ID</th>
	                <th>Bruker-Fornavn</th>
	                <th>Bruker-Etternavn</th>
	                <th>Tekniker-ID</th>
	                <th>Tekniker-fornavn</th>
	                <th>Tekniker-etternavn</th>
	                <th></th>
	            </thead>
	            <tbody>
	                <?php
	                    include('conn.php');
	                    $query=mysqli_query($conn,"SELECT sak.saksID AS saksID,
	                    sak.beskrivelse AS beskrivelse,
	                    sak.tilstand AS tilstand,
	                    sak.brukerID AS brukerID,
	                    bruker.fornavn AS brukerFornavn,
	                    bruker.etternavn AS brukerEtternavn,
	                    sak.teknikerID AS teknikerID,
	                    tekniker.fornavn AS teknikerFornavn,
	                    tekniker.etternavn AS teknikerEtternavn
	                FROM sak
	                    INNER JOIN bruker ON sak.brukerID = bruker.brukerID
	                    INNER JOIN tekniker ON sak.teknikerID = tekniker.teknikerID;");
	                    while($row=mysqli_fetch_array($query)){
	                        ?>
	                        <tr>
	                            <td><?php echo $row['saksID']; ?></td>
	                            <td><?php echo $row['beskrivelse']; ?></td>
	                            <td><?php echo $row['tilstand']; ?></td>
	                            <td><?php echo $row['brukerID']; ?></td>
	                            <td><?php echo $row['brukerFornavn']; ?></td>
	                            <td><?php echo $row['brukerEtternavn']; ?></td>
	                            <td><?php echo $row['teknikerID']; ?></td>
	                            <td><?php echo $row['teknikerFornavn']; ?></td>
	                            <td><?php echo $row['teknikerEtternavn']; ?></td>
	                            <td>
	                                <a href="editCase.php?id=<?php echo $row['saksID']; ?>">Edit</a>
	                                <a href="deleteCase.php?id=<?php echo $row['saksID']; ?>">Delete</a>
	                            </td>
	                        </tr>
	                        <?php
	                    }
	                ?>
	            </tbody>
	        </table>
	    </div>

        <div>
	        <h1>Legg til ny bruker</h1>
	        <form method="POST" action="addBruker.php">
	            <label>Fornavn:</label><input type="text" name="fornavn">
	            <br>
	            <label>Etternavn:</label><input type="text" name="etternavn">
	            <br>
	            <label>Telefonnummer:</label><input type="number" name="telefonnummer">
	            <br>
	            <label>E-post:</label><input type="text" name="epost">
	            <br>
	            <input type="submit" name="add" value="Registrer">
	        </form>
	    </div>
        <div>
    <h1>Oversikt over brukere</h1>
    <table border="1">
            <thead>
                <th>Bruker-ID</th>
                <th>Fornavn</th>
                <th>Etternavn</th>
                <th>Telefonnummer</th>
                <th>E-post</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    include('conn.php');
                    $query=mysqli_query($conn,"SELECT * FROM bruker;");
                    while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $row['brukerID']; ?></td>
                            <td><?php echo $row['fornavn']; ?></td>
                            <td><?php echo $row['etternavn']; ?></td>
                            <td><?php echo $row['telefonnummer']; ?></td>
                            <td><?php echo $row['epost']; ?></td>
                            <td>
                                <a href="editBruker.php?id=<?php echo $row['brukerID']; ?>">Edit</a>
                                <a href="deleteBruker.php?id=<?php echo $row['brukerID']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>

    </div>

    <div>
        <h1>Legg til ny tekniker</h1>
        <form method="POST" action="addTekniker.php">
            <label>Fornavn:</label><input type="text" name="fornavn">
            <br>
            <label>Etternavn:</label><input type="text" name="etternavn">
            <br>
            <label>Telefonnummer:</label><input type="number" name="telefonnummer">
            <br>
            <label>E-post:</label><input type="text" name="epost">
            <br>
            <input type="submit" name="add" value="Registrer">
        </form>
    </div>
    <div>
<h1>Oversikt over teknikere</h1>
<table border="1">
        <thead>
            <th>Tekniker-ID</th>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Telefonnummer</th>
            <th>E-post</th>
            <th></th>
        </thead>
        <tbody>
            <?php
                include('conn.php');
                $query=mysqli_query($conn,"SELECT * FROM tekniker;");
                while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $row['teknikerID']; ?></td>
                        <td><?php echo $row['fornavn']; ?></td>
                        <td><?php echo $row['etternavn']; ?></td>
                        <td><?php echo $row['telefonnummer']; ?></td>
                        <td><?php echo $row['epost']; ?></td>
                        <td>
                            <a href="editTekniker.php?id=<?php echo $row['teknikerID']; ?>">Edit</a>
                            <a href="deleteTekniker.php?id=<?php echo $row['teknikerID']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>

</div>





	</body>
	</html>
