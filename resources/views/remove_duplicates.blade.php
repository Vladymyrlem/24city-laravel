<!DOCTYPE html>
<html>
<head>
    <title>Remove Duplicate Images</title>
</head>
<body>
<h2>Remove Duplicate Images</h2>
<form method="POST" action="{{ url('/remove-duplicates') }}">
    @csrf
    <label for="folderPath">Enter Folder Path:</label>
    <input type="text" id="folderPath" name="folderPath" required>
    <label for="imageType">Enter Image Type (e.g., jpg, png):</label>
    <input type="text" id="imageType" name="imageType" required>
    <input type="submit" value="Remove Duplicates">
</form>
</body>
</html>
