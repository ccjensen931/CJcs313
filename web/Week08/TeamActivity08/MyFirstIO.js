let fs = require('fs');

let buffer = fs.readFileSync(process.argv[2]);
let numNewLines = buffer.toString().split('\n').length - 1;

console.log(numNewLines);