CREATE TABLE personal_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    dob DATE,
    gender ENUM('Male', 'Female', 'Other'),
    father_name VARCHAR(50),
    mother_name VARCHAR(50),
    phone VARCHAR(20),
    alternatenumber VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    subjects TEXT,
    blood_group ENUM('A+', 'B+', 'AB+', 'O-', 'O+')
);
