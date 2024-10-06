INSERT INTO candidate (id, first_name, last_name, gender, date_of_birth, mobile_no, email, experience, image, cv_file, user_comment, user_password, package)
VALUES
('C001', 'John', 'Doe', 'male', '1990-05-15', '1234567890', 'john.doe@example.com', 5, '../images/user_placeholder.jpg', 'cv_john_doe.pdf', 'Looking for opportunities in software development.', 'password123', 'none'),
('C002', 'Jane', 'Smith', 'female', '1992-08-20', '0987654321', 'jane.smith@example.com', 3, '../images/user_placeholder.jpg', 'cv_jane_smith.pdf', 'Seeking challenging roles in marketing.', 'password456', 'none'),
('C003', 'Alex', 'Johnson', 'other', '1988-02-10', '5551234567', 'alex.johnson@example.com', 7, '../images/user_placeholder.jpg', 'cv_alex_johnson.pdf', 'Open to freelance projects.', 'password789', 'none'),
('C004', 'Emily', 'Davis', 'female', '1995-11-30', '4445556666', 'emily.davis@example.com', 2, '../images/user_placeholder.jpg', 'cv_emily_davis.pdf', 'Eager to start my career in finance.', 'password321', 'none'),
('C005', 'Michael', 'Brown', 'male', '1991-04-25', '3334445555', 'michael.brown@example.com', 4, '../images/user_placeholder.jpg', 'cv_michael_brown.pdf', 'Passionate about data analysis.', 'password654', 'none'),
('C006', 'Sarah', 'Wilson', 'female', '1994-09-15', '2223334444', 'sarah.wilson@example.com', 1, '../images/user_placeholder.jpg', 'cv_sarah_wilson.pdf', 'Looking for entry-level positions in HR.', 'password987', 'none');

INSERT INTO recruiter (id, user_name, mobile_no, company, email, add_message, image, user_password, package)
VALUES
('R001', 'Alice Green', '1233211234', 'Tech Innovations', 'alice.green@techinnovations.com', 'We are looking for talented software engineers.', '../images/user_placeholder.jpg', 'recruiterpass1', 'none'),
('R002', 'Bob White', '3211233210', 'Marketing Masters', 'bob.white@marketingmasters.com', 'Join our team of creative marketers!', '../images/user_placeholder.jpg', 'recruiterpass2', 'none'),
('R003', 'Charlie Black', '4564564567', 'Finance Corp', 'charlie.black@financecorp.com', 'Seeking experienced financial analysts.', '../images/user_placeholder.jpg', 'recruiterpass3', 'none'),
('R004', 'Diana Grey', '7897897890', 'Health Solutions', 'diana.grey@healthsolutions.com', 'We need dedicated healthcare professionals.', '../images/user_placeholder.jpg', 'recruiterpass4', 'none'),
('R005', 'Ethan Blue', '6546546543', 'EduTech', 'ethan.blue@edutech.com', 'Looking for innovative educators.', '../images/user_placeholder.jpg', 'recruiterpass5', 'none'),
('R006', 'Fiona Red', '3214569870', 'Creative Agency', 'fiona.red@creativeagency.com', 'Join our dynamic creative team!', '../images/user_placeholder.jpg', 'recruiterpass6', 'none');

INSERT INTO packages (id, name, monthly_rate, features)
VALUES 
('PKG01', 'Starter', 20.00, '2 Advertisements, One Advertisement will pin on the page, 24/7 service'),
('PKG02', 'Premium', 35.00, '5 Advertisements, Three Advertisements will pin on the page, 24/7 service, Priority for Recruitments');


