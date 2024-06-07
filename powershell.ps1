# Define variables
$watchPath = "F:\DEVELOPER\testing"
$remoteUser = "phnk96925bbc"
$remoteHost = "118.139.179.166"
$remoteBasePath = "/public_html/components/charts/gauge/"
$privateKeyPath = "C:\Users\user\.ssh\id_rsa"  # Replace <YourUsername> with your actual username

# Function to handle file changes
function OnChanged {
    param (
        [System.IO.FileSystemEventArgs]$event
    )

    $localFile = $event.FullPath
    $remotePath = $remoteBasePath + [System.IO.Path]::GetFileName($localFile)

    Write-Host "File changed: $localFile. Uploading to $remotePath..."
    $scpCommand = "scp -i `"$privateKeyPath`" `"$localFile`" `${remoteUser}@${remoteHost}:$remotePath`""
    try {
        Invoke-Expression $scpCommand
        Write-Host "Upload successful: $localFile"
    }
    catch {
        Write-Host "Upload failed: $localFile"
    }
}

# Set up file watcher
$watcher = New-Object System.IO.FileSystemWatcher
$watcher.Path = $watchPath
$watcher.Filter = "*.*"
$watcher.NotifyFilter = [System.IO.NotifyFilters]'FileName, LastWrite'

# Register event handlers
Register-ObjectEvent $watcher 'Changed' -Action {
    OnChanged $event.SourceEventArgs
}

# Start watching
$watcher.EnableRaisingEvents = $true

# Keep script running
Write-Host "Watching for changes in $watchPath. Press [Enter] to exit."
[Console]::ReadLine()


