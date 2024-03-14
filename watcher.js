const chokidar = require('chokidar');
const fs = require('fs');
const http = require('http');

const watcher = chokidar.watch('.', { ignored: /node_modules|\.git/, persistent: true });

watcher.on('change', (path) => {
    console.log(`File ${path} has been changed`);
    if (path.endsWith('.html')) {
        updateHTML();
    }
});

function updateHTML() {
    fs.readFile('nombre_de_tu_archivo.html', 'utf8', (err, data) => {
        if (err) {
            console.error(err);
            return;
        }
        const htmlContent = data.toString();
        const options = {
            hostname: 'localhost',
            port: 3000, // Cambia el puerto según sea necesario
            path: '/update',
            method: 'POST',
            headers: {
                'Content-Type': 'text/html',
                'Content-Length': htmlContent.length
            }
        };
        const req = http.request(options, (res) => {
            console.log(`statusCode: ${res.statusCode}`);
            res.on('data', (d) => const chokidar = require('chokidar');
const fs = require('fs');
const http = require('http');

const watcher = chokidar.watch('.', { ignored: /node_modules|\.git/, persistent: true });

watcher.on('change', (path) => {
    console.log(`File ${path} has been changed`);
    if (path.endsWith('.html')) {
        updateHTML();
    }
});

function updateHTML() {
    fs.readFile('nombre_de_tu_archivo.html', 'utf8', (err, data) => {
        if (err) {
            console.error(err);
            return;
        }
        const htmlContent = data.toString();
        const options = {
            hostname: 'localhost',
            port: 3000, // Cambia el puerto según sea necesario
            path: '/update',
            method: 'POST',
            headers: {
                'Content-Type': 'text/html',
                'Content-Length': htmlContent.length
            }
        };
        const req = http.request(options, (res) => {
            console.log(`statusCode: ${res.statusCode}`);
            res.on('data', (d) => {
                process.stdout.write(d);
            });
        });
        req.on('error', (error) => {
            console.error(error);
        });
        req.write(htmlContent);
        req.end();
    });
}
{
                process.stdout.write(d);
            });
        });
        req.on('error', (error) => {
            console.error(error);
        });
        req.write(htmlContent);
        req.end();
    });
}
