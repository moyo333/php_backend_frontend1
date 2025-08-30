 -- Learners table
CREATE TABLE IF NOT EXISTS learners (
    learner_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    grade INT NOT NULL
);

-- Tours table (added grade_level for grade-specific tours)
CREATE TABLE IF NOT EXISTS tours (
    tour_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    cost DECIMAL(10,2) NOT NULL,
    grade_level INT NOT NULL
);

-- Registrations table
CREATE TABLE IF NOT EXISTS registrations (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    learner_id INT NOT NULL,
    tour_id INT NOT NULL,
    FOREIGN KEY (learner_id) REFERENCES learners(learner_id) ON DELETE CASCADE,
    FOREIGN KEY (tour_id) REFERENCES tours(tour_id) ON DELETE CASCADE,
    UNIQUE KEY unique_registration (learner_id, tour_id) -- Prevent duplicate registrations
);

-- Sample data for learners (at least 5 rows)
INSERT INTO learners (name, surname, grade) VALUES
('John', 'Doe', 8),
('Jane', 'Smith', 8),
('Alice', 'Johnson', 9),
('Bob', 'Williams', 9),
('Charlie', 'Brown', 10),
('David', 'Miller', 10);

-- Sample data for tours (at least 5 rows, grade-specific)
INSERT INTO tours (title, description, start_date, end_date, cost, grade_level) VALUES
('Grade 8 Tour 1', 'Touring Mpumalanga', '2024-10-01', '2024-10-05', 1500.00, 8),
('Grade 8 Tour 2', 'Beach Adventure', '2024-11-01', '2024-11-03', 1200.00, 8),
('Grade 9 Tour 1', 'Historical Sites Visit', '2024-10-15', '2024-10-18', 1800.00, 9),
('Grade 10 Tour 1', 'Science Museum Trip', '2024-11-10', '2024-11-12', 2000.00, 10),
('Grade 10 Tour 2', 'Mountain Hiking', '2024-12-01', '2024-12-04', 2200.00, 10),
('Grade 11 Tour 1', 'Cultural Exchange', '2024-10-20', '2024-10-23', 2500.00, 11);

-- Sample data for registrations (at least 5, ensuring grade match)
INSERT INTO registrations (learner_id, tour_id) VALUES
(1, 1), -- John (grade 8) to Grade 8 Tour 1
(2, 1), -- Jane (grade 8) to Grade 8 Tour 1
(3, 3), -- Alice (grade 9) to Grade 9 Tour 1
(4, 3), -- Bob (grade 9) to Grade 9 Tour 1
(5, 4), -- Charlie (grade 10) to Grade 10 Tour 1
(6, 5); -- David (grade 10) to Grade 10 Tour 2