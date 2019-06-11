let fs = require('fs');

let fileExtension = "." + process.argv[3];

fs.readdir(process.argv[2], function filterDirectoryFiles(err, files) {
    if (err) {
        return console.log(err);
    }
    files.forEach(function (file) {
        if (file.endsWith(fileExtension))
            console.log(file);
    });
});