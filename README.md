# Online Exam Portal

## Table of Contents
- [Project Description](#project-description)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)
- [Screenshots](#screenshots)

## Project Description
The Online Exam Portal is a web application designed to facilitate online examinations. It supports two types of questions: text-based and image-based. Admins can set up exams with timers, add questions, and view the results of all students. Students can select and start any available exam, view their results upon completion, and review their past exams.

## Features
- **Admin**
  - Add exams with a timer
  - Add text-based and image-based questions
  - View results of all students

- **Student**
  - Select and start any exam
  - Timer functionality for exams
  - View results after exam completion (correct and wrong answers)
  - View history of past exams

## Technologies Used
- PHP
- JavaScript
- HTML
- CSS
- MySQL
- Bootstrap

## Installation
To set up this project on your local system, follow these steps:

1. **Clone the repository**
    ```bash
    git clone https://github.com/rohit-kumar-india/online-exam-portal.git
    cd online-exam-portal
    ```

2. **Set up the database**
    - Create a MySQL database.
    - Import the `online_exam_portal.sql` file located in the `sql` directory into your database.
        or
    - Import the SQL file provided in the `database` folder.
      ```sql
      mysql -u yourusername -p yourpassword yourdatabase < database/online_exam_portal.sql
      ```

3. **Configure the database connection**
    - Open `connection.php` and update the database credentials.
      ```php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'online_exam_portal';
      ```

4. **Start the server**
    - If using XAMPP, place the project folder in the `htdocs` directory.
    - Start Apache and MySQL from the XAMPP control panel.
    - Access the application in your browser at `http://localhost/online-exam-portal`.

## Usage
1. **Admin Login**
    - Use the admin credentials to log in.
    - Add exams and questions from the admin panel.
    - View the results of students.

2. **Student Login**
    - Register as a new student or log in with existing credentials.
    - Select an exam and start it.
    - Complete the exam within the given time.
    - View the results upon completion.
    - Review past exams and results.

## Contributing
Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a pull request.

Please ensure your code follows the project's coding standards and includes appropriate tests.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact
If you have any questions or need further assistance, please contact:

- **Name:** Rohit Kumar
- **Email:** rohit.rk2146@gmail.com
- **GitHub:** [rohit-kumar-india](https://github.com/rohit-kumar-india)


## Screenshots

Thank you for using the Online Exam Portal!
