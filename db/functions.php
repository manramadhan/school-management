    <?php
    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'school_management');

    // Fungsi untuk mengelola siswa
    function getAllStudents($conn) {
        $sql = "SELECT students.*, classes.class_name 
                FROM students 
                LEFT JOIN classes ON students.class_id = classes.id";
        return $conn->query($sql);
    }


    function getStudentById($conn, $id) {
        $sql = "SELECT * FROM students WHERE id = $id";
        return $conn->query($sql)->fetch_assoc();
    }

    // Fungsi untuk mengelola siswa
    function addStudent($conn, $name, $age, $class_id, $address, $phone) {
        // Escape input untuk menghindari SQL injection
        $name = $conn->real_escape_string($name);
        $age = (int)$age; // Pastikan ini adalah integer
        $class_id = (int)$class_id; // Pastikan ini adalah integer
        $address = $conn->real_escape_string($address);
        $phone = $conn->real_escape_string($phone);

        $sql = "INSERT INTO students (name, age, class_id, address, phone) VALUES ('$name', $age, $class_id, '$address', '$phone')";
        if ($conn->query($sql) === TRUE) {
            return true; // Berhasil menambah siswa
        } else {
            return false; // Gagal menambah siswa
        }
    }

    function updateStudent($conn, $id, $name, $email) {
        $sql = "UPDATE students SET name='$name', email='$email' WHERE id=$id";
        return $conn->query($sql);
    }

    function deleteStudent($conn, $id) {
        $sql = "DELETE FROM students WHERE id=$id";
        return $conn->query($sql);
    }
    function getAllStudentsWithClasses($conn) {
        $sql = "SELECT s.*, c.class_name 
                FROM students s 
                LEFT JOIN classes c ON s.class_id = c.id";
        return $conn->query($sql);
    }

    // Fungsi untuk mengelola guru
    function getAllTeachers($conn) {
        $result = $conn->query("SELECT * FROM teachers");
        return $result;
    }



    function getTeacherById($conn, $id) {
        $sql = "SELECT * FROM teachers WHERE id = $id";
        return $conn->query($sql)->fetch_assoc();
    }

    function addTeacher($conn, $name, $subject) {
        // Escape input untuk menghindari SQL injection
        $name = $conn->real_escape_string($name);
        $subject = $conn->real_escape_string($subject);

        // Pastikan nama dan subjek tidak kosong
        if (empty($name) || empty($subject)) {
            return "Nama dan subjek tidak boleh kosong.";
        }

        $sql = "INSERT INTO teachers (name, subject) VALUES ('$name', '$subject')";
        
        if ($conn->query($sql) === TRUE) {
            return true; // Berhasil menambah guru
        } else {
            return "Error: " . $conn->error; // Kembalikan error jika gagal
        }
    }



    function updateTeacher($conn, $id, $name, $subject) {
        $sql = "UPDATE teachers SET name='$name', subject='$subject' WHERE id=$id";
        return $conn->query($sql);
    }

    function deleteTeacher($conn, $id) {
        $sql = "DELETE FROM teachers WHERE id=$id";
        return $conn->query($sql);
    }

    // Fungsi untuk mengelola kelas
    function getAllClasses($conn) {
        $sql = "SELECT * FROM classes";
        return $conn->query($sql);
    }

    function getClassById($conn, $id) {
        $sql = "SELECT * FROM classes WHERE id = $id";
        return $conn->query($sql)->fetch_assoc();
    }

    function addClass($conn, $class_name) {
        $sql = "INSERT INTO classes (class_name) VALUES ('$class_name')";
        return $conn->query($sql);
    }

    function updateClass($conn, $id, $class_name) {
        $sql = "UPDATE classes SET class_name='$class_name' WHERE id=$id";
        return $conn->query($sql);
    }

    function deleteClass($conn, $id) {
        $sql = "DELETE FROM classes WHERE id=$id";
        return $conn->query($sql);
    }

    // Fungsi untuk mengelola kehadiran
    function getAllAttendances($conn) {
        $sql = "SELECT a.id, s.name AS student_name, c.class_name, a.date, a.status 
                FROM attendances a 
                JOIN students s ON a.student_id = s.id 
                JOIN classes c ON a.class_id = c.id";
        $result = $conn->query($sql);
        
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        return $result;
    }


    function getAttendanceById($conn, $id) {
        $sql = "SELECT * FROM attendances WHERE id = $id";
        return $conn->query($sql)->fetch_assoc();
    }

    function addAttendance($conn, $student_id, $class_id, $date, $status) {
        $stmt = $conn->prepare("INSERT INTO attendances (student_id, class_id, date, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $student_id, $class_id, $date, $status); // Pastikan tipe datanya sesuai
        return $stmt->execute();
    }


    function updateAttendance($conn, $id, $student_id, $class_id, $date, $status) {
        $sql = "UPDATE attendances 
                SET student_id=$student_id, class_id=$class_id, date='$date', status='$status' 
                WHERE id=$id";
        return $conn->query($sql);
    }

    function deleteAttendance($conn, $id) {
        $sql = "DELETE FROM attendances WHERE id=$id";
        return $conn->query($sql);
    }

    // Fungsi untuk mengelola mata pelajaran
    function getAllSubjects($conn) {
        $sql = "SELECT * FROM subjects";
        return $conn->query($sql);
    }

    function getSubjectById($conn, $id) {
        $sql = "SELECT * FROM subjects WHERE id = $id";
        return $conn->query($sql)->fetch_assoc();
    }

    function addSubject($conn, $subject_name) {
        $sql = "INSERT INTO subjects (subject_name) VALUES ('$subject_name')";
        return $conn->query($sql);
    }

    function updateSubject($conn, $id, $subject_name) {
        $sql = "UPDATE subjects SET subject_name='$subject_name' WHERE id=$id";
        return $conn->query($sql);
    }

    function deleteSubject($conn, $id) {
        $sql = "DELETE FROM subjects WHERE id=$id";
        return $conn->query($sql);
    }


    // Login register
    function registerUser($conn, $username, $email, $password) {
        // Hash password sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah username atau email sudah terdaftar
        $sqlCheck = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $resultCheck = $conn->query($sqlCheck);

        if ($resultCheck->num_rows > 0) {
            return "Username atau email sudah terdaftar!";
        } else {
            // Masukkan data ke database
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
            if ($conn->query($sql)) {
                return true;
            } else {
                return "Error: " . $conn->error;
            }
        }
    }

    function loginUser($conn, $usernameOrEmail, $password) {
        // Siapkan query untuk memeriksa apakah username atau email ada di database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) {
            return "User not found";
        }
    
        $user = $result->fetch_assoc();
    
        // Periksa password
        if (password_verify($password, $user['password'])) {
            // Set session atau lakukan tindakan lain setelah login berhasil
            $_SESSION['user_id'] = $user['id']; // Simpan ID pengguna di sesi
            return true;
        } else {
            return "Invalid password";
        }
    }
    
