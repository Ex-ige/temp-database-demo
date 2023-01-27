<?php
?>

<html>
	<body>
		<h1> Manual for Attendance Logging System </h1>
		<br>
		<h2> Step 1. Web App</h2>
		<h3>&emsp;Creating Account </h3>
		<p style="color: red;">&emsp;*The Admin will be the one to register an account for the teacher.</p>
		<ol style="padding-left:60px;">
			<li>Log in to Admin Account.</li>
			<li>Select "Register Teacher".</li>
            <li>Fill out all entries.</li>
            <li>Click Register.</li>
		</ol>

        <h3>&emsp;Uploading Class List </h3>
        <ol style="padding-left:60px;">
            <li>Once account is created, Log in to said account.</li>
            <li>Click “Upload Class List”</li>
            <li>Upload class list.</li>
            <li>Fill out entries to configure attendance taking.</li>
            <li>Submit</li>
        </ol>

        <h2> Step 2. Portable Device</h2>
        <h3>&emsp;Syncing </h3>
        <ol style="padding-left:60px;">
            <li>Turn on Portable Device’s (2) Switches.</li>
            <li>Allow Device to boot and connect to network.</li>
        </ol>

        <h3>&emsp;Registering ID </h3>
        <h4>&emsp;&emsp;Register Teacher</h4>
        <ol style="padding-left:80px;">
            <li>Open the application on the device (if not open).</li>
            <li>Click “Register Teacher”.</li>
            <li>Select Registered Teacher Account (registered by admin from Web App).</li>
            <li>Tap ID beside the LCD screen (Top side of device).</li>
        </ol>

        <h4>&emsp;&emsp;Register Student</h4>
        <ol style="padding-left:80px;">
            <li>Open the application on the device (if not open).</li>
            <li>Select “Attendance Taking” or "School Event".</li>
            <li>Tap ID next to LCD Screen.</li>
            <li>Select Registered Class List.</li>
            <li>Click “Register Students”.</li>
            <li>Select Student Name and Click Scan.</li>
            <li>Scan ID next to LCD Screen.</li>
            <li>Repeat processes 6-7 until all students have scanned.</li>
            <li>Click “Done” or “Create Attendance Log”.</li>
        </ol>

        <h3>&emsp;Attendance Taking </h3>
        <p style="color: red">&emsp;*Students must register their IDs first to be identified in the attendance log</p>
        <h4>&emsp;&emsp;Substitute or School Event</h4>
        <ol style="padding-left:80px;">
            <li>Click “Substitute” from the app.</li>
            <li>Tap ID to identify user.</li>
            <li>Select Registered Teacher Account (registered by admin from Web App).</li>
            <li>Select Class List to take attendance</li>
            <li>Let Students tap ID beside LCD Screen</li>
            <li>Select "Done" or wait until class schedule ends</li>
        </ol>

        <h4>&emsp;&emsp;Assigned Class</h4>
        <ol style="padding-left:80px;">
            <li>Click “Attendance Taking” from the app.</li>
            <li>Tap ID to identify user.</li>
            <li>Select Class List to take attendance.</li>
            <li>Select "Take Attendance"</li>
            <li>Let Students tap ID beside LCD Screen</li>
            <li>Select "Done" or wait until class schedule ends</li>
        </ol>

        <h2> Step 3. Web App</h2>
        <h3>&emsp;Attendance Monitoring </h3>
        <ol style="padding-left:60px;">
            <li>Log in to Web App.</li>
            <li>Select "Attendance Monitoring".</li>
            <li>Select Class List to view data.</li>
        </ol>
        <h4>&emsp;&emsp;Filtering</h4>
        <ul style="padding-left:80px;">
            <li>Can filter through start date and end date to view attendance logs in between said dates</li>
            <li>Can filter through only one student's attendance logs by clicking their name.</li>
        </ul>
        <h4>&emsp;&emsp;Export</h4>
        <ul style="padding-left:80px;">
            <li>Can download the complete or filtered attendance logs by clicking the top right button.</li>
            <li>Offers downloadable CSV or PDF formats and send through registered email of account.</li>
        </ul>
    
        <h3>&emsp;Clearing Database</h3>
        <p style="color: red">&emsp;*Only Admin can clear database of existing data.</p>
        <ol style="padding-left:60px;">
            <li>Log in to Admin Account.</li>
            <li>Select "Delete Tables".</li>
            <li>Confirm.</li>
        </ol>
	</body>
</html>
