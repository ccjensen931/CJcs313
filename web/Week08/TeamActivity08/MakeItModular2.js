module.exports = function (directory, extension, callback) {
    let fs = require('fs');

    fs.readdir(directory, function filterDirectoryFiles(err, files) {
        if (err) {
            return callback(err);
        }

        extension = "." + extension;
        let filteredFiles = [];

        files.forEach(function (file) {
            if (file.endsWith(extension))
                filteredFiles.push(file);
        });

        callback(null, filteredFiles);
    });
};