let fs = require('fs');

fs.readFile(process.argv[2], function callback(err, data) {
    let content = data;
    let numNewLines = content.toString().split('\n').length - 1;
    console.log(numNewLines);
});