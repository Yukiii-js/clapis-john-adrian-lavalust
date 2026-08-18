<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Home</title>
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
            max-width: 900px;
            margin: 3rem auto;
            padding: 0 1.5rem;
        }
        .hero {
            background: linear-gradient(135deg, #0284c7, #2563eb);
            color: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 2rem;
        }
        .hero h2 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .hero p {
            color: #e0f2fe;
            margin-bottom: 1.5rem;
        }
        .btn {
            display: inline-block;
            background-color: #ffffff;
            color: #0284c7;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            transition: transform 0.2s, background-color 0.2s;
        }
        .btn:hover {
            background-color: #f8fafc;
            transform: translateY(-2px);
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-top: 4px solid #0284c7;
        }
        .card h3 {
            margin-bottom: 0.5rem;
            color: #1e293b;
        }
        .card p {
            color: #64748b;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

    <header>
        <h1>Student Home Page</h1>
        <nav>
            <a href="<?= site_url('student'); ?>" class="active">Home</a>
            <a href="<?= site_url('student/profile'); ?>">Student Profile</a>
        </nav>
    </header>

    <div class="container">
        <section class="hero">
            <h2>Welcome to Student Information System</h2>
            <p>Access your profile details, check class information, and manage your academic record.</p>
            
        </section>

        
    </div>

</body>
</html>