// import database
const db = require("../config/database");

// membuat class Model Student
class Student {
  /**
   * Membuat method static all.
   */
  static all() {
    // return Promise sebagai solusi Asynchronous
    return new Promise((resolve, reject) => {
      const sql = "SELECT * from students";
      /**
       * Melakukan query menggunakan method query.
       * Menerima 2 params: query dan callback
       */
      db.query(sql, (err, results) => {
        resolve(results);
      });
    });
  }

  /**
   * TODO 1: Buat fungsi untuk insert data.
   * Method menerima parameter data yang akan diinsert.
   * Method mengembalikan data student yang baru diinsert.
   */
  static create(data) {
    return new Promise((resolve, reject) => {
      const sql = `INSERT INTO students (nama, nim, email, jurusan) VALUES ("${data.nama}", "${data.nim}", "${data.email}", "${data.jurusan}")`;
      const sql2 = "SELECT * FROM students ORDER BY id DESC LIMIT 1";

      db.query(sql, (err, results) => {
        if (err) resolve(err);
        db.query(sql2, function (err, result) {
          if (err) resolve(err);
          resolve(result);
        });
      });
    });
  }

  static update(id, nama) {
    return new Promise((resolve, reject) => {
      const sql = `UPDATE students SET nama = "${nama}" WHERE id = "${id}"`;
      const sql2 = `SELECT * FROM students WHERE id = "${id}" ORDER BY id DESC LIMIT 1`;

      db.query(sql, (err, results) => {
        if (err) resolve(err);
        db.query(sql2, function (err, result) {
          if (err) resolve(err);
          resolve(result);
        });
      });
    });
  }

  static destroy(id) {
    return new Promise((resolve, reject) => {
      const sql = `DELETE from students WHERE id = "${id}"`;

      db.query(sql, (err, results) => {
        if (err) resolve(err);
        resolve("Dah dihapus");
      });
    });
  }
}

// export class Student
module.exports = Student;
