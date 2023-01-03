// import Model Student
const Student = require("../models/Student");

class StudentController {
  // menambahkan keyword async
  async index(req, res) {
    // memanggil method static all dengan async await.
    const students = await Student.all();

    if (students.length > 0) {
      const data = {
        message: "Menampilkkan semua students",
        data: students,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Students is empty",
      }
      res.status(200).json(data);
    }
  }

  async store(req, res) {
    /**
     * TODO 2: memanggil method create.
     * Method create mengembalikan data yang baru diinsert.
     * Mengembalikan response dalam bentuk json.
     */
    // code here
    const { nama, nim, email, jurusan } = req.body;
    if (!nama || !nim || !email || !jurusan) {
      const data = {
        message: "Semua data harus dikirim",
      };
      return res.status(422).json(data);
    }

    const student = await Student.create(req.body);
    const data = {
      message: "Menambahkan data student",
      data: student,
    };
    res.status(201).json(data);
  }

  async update(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      const student = await Student.update(id, req.body);
      const data = {
        message: `Mengedit data student`,
        data: student,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      };
      res.status(404).json(data);
    }

  }

  async destroy(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      await Student.destroy(id);
      const data = {
        message: `Menghapus data student`,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      };
      res.status(404).json(data);
    }
  }

  async show(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      const data = {
        message: `Menampilkan detail student`,
        data: student,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      };
      res.status(404).json(data);
    }
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
