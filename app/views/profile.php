<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f4f6f9;
            color: #333;
            line-height: 1.6;
        }
        header {
            background-color: #1e293b;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            color: #ffffff;
            font-size: 1.25rem;
        }
        nav a {
            color: #cbd5e1;
            text-decoration: none;
            margin-left: 1.5rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        nav a:hover, nav a.active {
            color: #38bdf8;
        }
        .container {
            max-width: 600px;
            margin: 3rem auto;
            padding: 0 1.5rem;
        }
        .card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #0284c7;
            margin-bottom: 1.5rem;
            border-bottom: none;
        }
        p {
            font-size: 1.05rem;
            padding: 0.5rem 0;
            border-bottom: 1px dashed #f1f5f9;
        }
        strong {
            color: #475569;
        }
    </style>
</head>
<body>

    <header>
        <h1>Student Profile Page</h1>
        <nav>
            <a href="<?= site_url('student'); ?>">Home</a>
            <a href="<?= site_url('student/profile'); ?>" class="active">Student Profile</a>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <h1>Student Information</h1>
            <p><strong>Student ID:</strong> <?= $student['student_id']; ?></p>
            <p><strong>Name:</strong> <?= $student['name']; ?></p>
            <p><strong>Course:</strong> <?= $student['course']; ?></p>
            <p><strong>Year Level:</strong> <?= $student['year']; ?></p>
            <p><strong>Section:</strong> <?= $student['section']; ?></p>
            <p><strong>Email:</strong> <?= $student['email']; ?></p>
        </div>
    </div>

</body>
</html>