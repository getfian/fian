<?php
if (!empty($_GET['download'])) {
    file_put_contents('fian.zip', file_get_contents('https://github.com/getfian/mirror/archive/refs/heads/main.zip'));
    echo 'downloaded';
}
if (!empty($_GET['unzip'])) {
    shell_exec('unzip fian.zip');
    echo 'unzipped';
}
if (!empty($_GET['move'])) {
    unlink('fian.zip');
    shell_exec('mv mirror-main/. .
mv mirror-main/* .
rm -r mirror-main');
    echo 'moved';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Flarum in a Nutshell</title>
    <style>
        * {
            font-family: 'system-ui', 'Arial', 'sans-serif';
            text-align: center;
        }
        hr {
            border: 1px solid black;
        }
        button {
            width: 50%;
            min-width: 150px;
            transition: 0.25s;
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            background: #006CFF;
            color: white;
            border-radius: 5px;
        }
        button:hover {
            width: 75%;
            background: #005EDD;
        }
        button:active {
            width: 45%;
            background: #0051C0;
        }
    </style>
</head>

<body>
    <h1>Flarum in a Nutshell</h1>
    <h2>v2022.7.21</h2>
    <h3>for Flarum 1.4</h3>
    <p>Install Flarum without Composer! Great for shared hosting!</p>
    <p><b>Important note:</b> Once you start the installation process, DO NOT STOP it. This will break the installation. If you stop the installation, delete <i>all</i> files, reupload the FIAN installer, and start again.</p>
    <p><b>Important note:</b> Some steps may take longer than others, please be patient and do not close the tab. Thank you.</p>
    <p><b>Speed of download will vary based on your internet connection.</b></p>
    <p><i>Downloading from mirror: FIAN Mirror (GitHub, .zip).</i></p>
    <hr>
    <div id="fian" style="display:none;">
        <p><b>Step <span id="step">0</span>/5: <span id="task">Waiting to for user to start FIAN.</span></b></p>
        <button id="install" onclick="install()">Install</button>
        <progress hidden id="progress"></progress>
    </div>
    <div id="noscript">
        <h3>Enable JavaScript to use FIAN!</h3>
    </div>
    <script>
        document.getElementById('noscript').style.display = 'none';
        document.getElementById('fian').style.display = 'block';

        function install() {
            document.getElementById('step').innerHTML = '1';
            document.getElementById('task').innerHTML = 'Preparing to install Flarum';
            document.getElementById('install').style.display = 'none';
            setTimeout(function() {
                document.getElementById('step').innerHTML = '2';
                document.getElementById('task').innerHTML = 'Downloading Flarum 1.4 from FIAN mirror...';
                document.getElementById('progress').style.display = 'inline';


                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        setTimeout(function() {
                            document.getElementById('step').innerHTML = '3';
                            document.getElementById('task').innerHTML = 'Unpackaging packages related to FIAN mirror of Flarum 1.4';
                            document.getElementById('progress').style.display = 'inline';


                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    setTimeout(function() {
                                        document.getElementById('step').innerHTML = '4';
                                        document.getElementById('task').innerHTML = 'Configuring Server...';
                                        setTimeout(function() {
                                            document.getElementById('step').innerHTML = '5';
                                            document.getElementById('task').innerHTML = 'Moving Files...';
                                            var xhr = new XMLHttpRequest();
                                            xhr.onreadystatechange = function() {
                                                if (xhr.readyState == 4 && xhr.status == 200) {
                                                    window.location.reload();
                                                }
                                            }
                                            xhr.open('GET', '?move=true&dt=' + Date.now());
                                            xhr.send();
                                        }, 2515);
                                    }, 2515);
                                }
                            }
                            xhr.open('GET', '?unzip=true&dt=' + Date.now());
                            xhr.send();

                        }, 3241);
                    }
                }
                xhr.open('GET', '?download=true&dt=' + Date.now());
                xhr.send();


            }, 2603);
        }

    </script>
</body>

</html>
