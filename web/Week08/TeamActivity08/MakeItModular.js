let myModules = require('./MakeItModular2');

myModules(process.argv[2], process.argv[3], printFiles);

function printFiles(error, files)
{
    if (error) {
        console.log(error);
    } else {
        files.forEach(function (file) {
            console.log(file);
        });
    }
}