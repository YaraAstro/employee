-- create job seekers table
CREATE TABLE candidate (
    id VARCHAR(5) PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    date_of_birth DATE NOT NULL,
    mobile_no VARCHAR(15),
    email VARCHAR(100) NOT NULL UNIQUE,
    experience INT,
    image VARCHAR(255),
    cv_file VARCHAR(255), 
    package VARCHAR(100),
    user_comment TEXT,
    user_password VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- create hiring agents tables
CREATE TABLE recruiter (
    id VARCHAR(5) PRIMARY KEY,
    user_name VARCHAR(150) NOT NULL,
    mobile_no VARCHAR(15),
    company VARCHAR(255),
    email VARCHAR(100) NOT NULL UNIQUE,
    add_message TEXT,
    image VARCHAR(255),
    package VARCHAR(100),
    user_password VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE packages (
    id VARCHAR(5) PRIMARY KEY,
    name VARCHAR(50),
    monthly_rate DECIMAL(10, 2),
    features TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);