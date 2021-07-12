
    <script>

//put these lines in a seperate file
const mysql = require('mysql2');

const connection = mysql.createPool({
    host: "localhost",
    user: "root",
    password: "root",
    database: "quanlybanhang"
    // here you can set connection limits and so on
});

module.exports = connection;

//put these on destination page
const connection = require('../util/connection');

async function getAll() {
    const sql = "SELECT * FROM products";
    const [rows] = await connection.promise().query(sql);
    return rows;
} 
exports.getAll = getAll;
      

    </script>